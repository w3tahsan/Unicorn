<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    function role_manager(){
        $roles = Role::all();
        $persmissions = Permission::all();
        $users = User::all();
        return view('admin.role.index', [
            'persmissions'=>$persmissions,
            'roles'=>$roles,
            'users'=>$users,
        ]);
    }

    function add_permission(Request $request){
        Permission::create(['name' => $request->permission_name]);
        return back();
    }
    function add_role(Request $request){
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        return back();
    }

    function assign_role(Request $request){
        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);
        return back();
    }

    function edit_permision($user_id){
        $persmissions = Permission::all();
        $user_info  = User::find($user_id);
        return view('admin.role.edit', [
            'persmissions'=>$persmissions,
            'user_info'=>$user_info,
        ]);
    }

    function update_permission(Request $request){
        $user = User::find($request->user_id);
        $user->syncPermissions($request->permission);
        return back();
    }
    function remove_role($user_id){
        $user = User::find($user_id);
        $user->roles()->detach();
        return back();
    }
    function edit_permission($role_id){
        $role = Role::find($role_id);
        $persmissions = Permission::all();
        return view('admin.role.editpermission', [
            'role'=>$role,
            'persmissions'=>$persmissions,
        ]);
    }
    function update_role_permission(Request $request){
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permission);
        return back();
    }
}
