<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function GuzzleHttp\Promise\all;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(6);
        $this->authorize('role-list');
        return view('admin.roles.index', compact(['roles']))->with('i', (\request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
//        $this->authorize('role-create');
        return view('admin.roles.create');
    }

    public function store()
    {
        $this->authorize('role-create');
        $role = Role::create(request()->validate(['name' => 'required|max:255']));
        return redirect(route('roles.index'))->with('success', 'New Role ' . $role->name . ' Has Been Created');
    }

    public function show(Role $role)
    {
        $this->authorize('role-list');
        return view('admin.roles.show',compact('role'));
    }

    public function edit(Role $role)
    {
        $this->authorize('role-edit');
        $allPermissions = Permission::all();

        return view('admin.roles.edit',compact(['role', 'allPermissions']));
    }

    public function update(Request $request, Role  $role)
    {
        $this->authorize('role-edit');
        $request->validate(['name'=>'required|String|max:255']);

        $role->name = $request->name;
        $role->syncPermissions($request->permissions);

        $role->save();

        return redirect(route('roles.index'))->with('success', 'Role: '. $role->name. ' is Updated.');
    }

    public function destroy(Role $role)
    {
        $this->authorize('role-delete');
        $role->delete();
        return redirect(route('roles.index'))->with('success', 'Role: '. $role->name. ' Has Successfully Deleted!');
    }
}
