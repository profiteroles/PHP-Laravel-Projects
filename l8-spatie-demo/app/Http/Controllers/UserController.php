<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', [
            'only' => ['index', 'store']
        ]);
        $this->middleware(
            'permission:user-create', ['only' => ['create', 'store']]
        );

        $this->middleware('permission:user-list|user-edit|user-edit|user-delete', [
            'only' => ['edit', 'update']
        ]);

        $this->middleware(
            'permission:user-delete', ['only' => ['destroy', 'delete']]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required',
        ]);

        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);

        $user = User::create($inputs);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User: ' . $inputs->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();

        $userRoles = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact(['user', 'userRoles', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $userID = $user->id;
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => [
                'require',
                'email',
                'unique:users,email' . $userID,
            ],
            'password' => 'required|confirmed',
            'roles' => 'required',
        ]);

        $inputs = $request->all();
        if (!empty($inputs['password'])){
            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            $inputs = Arr::except($inputs,array('password'));
        }
        $user->update($inputs);
        DB::table('model_has_roles')->where('model_id')->delete();

        $user->assignRole($request->input(['roles']));

        return redirect()->route('users.index')->with('success','User: '.$user->name.' updated Successfully');
    }

    public function delete(User $user)
    {
        //TODO: Must display a delete confimrmation page
        return true;
}
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', $user->name. ' is deleted successfully');
    }
}
