<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->authorize('user-list');
        $users = User::paginate(6);
        return view('admin.users.index', compact(['users']))->with("i", (\request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('user-create');

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()//Request $request, User $user
    {
        $this->authorize('user-create');
        $data = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $user = User::create($data);
//        auth()->login($user);
        return redirect(route('users.index'))->with('success', 'User: '.$user->name.' Account Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('user-list');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('user-edit');
        $roles = Role::all();
        $userRoles = $user->roles()->pluck('name');
        return view('admin.users.edit', compact(['user', 'roles', 'userRoles']));
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
        $this->authorize('user-edit');
//        ddd($request);
        $request->validate([
            'name' => 'required|String|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'roles_id' => 'required',
            'password' => (isset($request->password) && !is_null($request->password) ?
                ['sometimes',
                    'comfirmed',
                    'required',
                    Password::min(6)
//                        ->letters()
                        ->mixedCase()
                        ->numbers()
//                        ->symbols()
//                        ->uncompromised(),
                ] : [null])
        ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->syncRoles($request->roles_id);
        if ($request->password != '') {
            $user->password = $request->request;
        }

        $user->save();
//        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        return redirect(route('users.index'))->with('success', 'User: '.$user->name.'\'s Details is up to Date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('user-delete');
        $user->delete();
        return redirect(route('users.index'))->with('success','User Has Successfully Deleted');
    }

    public function handle(Login $event)
    {
        $event->user->last_login =date('Y-m-d H:i:s');
        $event->user->save();
    }
}
