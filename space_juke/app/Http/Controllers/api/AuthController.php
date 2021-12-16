<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function authFailed(){
        return response('Auth is Invalid', 401);
    }

    public function register(Request $request) {

        $existUser= User::where('email', $request['email'])->first();

        if($existUser){
            return response(['message'=>'Seems like you already have an account with us!'], 401);
        }
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);


        $newUser = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        //Sign a role
        $role = Role::findByName('astronaut');
        $userPermissionList = [
            'edit-profile', 'add-playlist','show-playlist', 'edit-playlist','delete-playlist',
            'add-track','edit-track','delete-track', 'show-track', 'play-track',
        ];

        $permissions = Permission::all()->whereIn('name',$userPermissionList)->pluck('id','id');
        $role->syncPermissions($permissions);
        //Bcuz fucking thing doesn't return default values !!!aaaaaa!!!
        $user = User::where('email', $newUser->email)->first();
        //Create Token
        $token = $user->createToken($user->email)->plainTextToken;


        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    public function login(LoginRequest $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        if($user && !Hash::check($fields['password'], $user->password) ){
            return  response(['message'=>'Incorrect password'],401);

        }else if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid User'
            ], 401);
        }

        $token = $user->createToken($user->email)->plainTextToken;
        $user->last_login = now();
        $user->save();

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        $response = [
           'message' => 'User: '.auth()->user()->name.' Logged Out'
        ];

        return response($response,200);
    }
}
