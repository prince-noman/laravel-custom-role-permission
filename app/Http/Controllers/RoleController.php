<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        
        return view('roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'permissions' => 'array|nullable'
        ]);
    
        $role = Role::create([
            'name' => $request->name
        ]);

        // Assign permissions if provided
        if($request->has('permissions')){
            $role->permissions()->sync($request->permissions);
        }

        return redirect()->route('roles.index');

    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|min:3',
            'permissions' => 'array|nullable', 
        ]);

        $role->update([
            'name' => $request->name
        ]);

        
        // Sync permissions with the selected ones
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
