<?php

namespace App\Http\Controllers\Dashboard\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\System\RoleStoreRequest;
use App\Http\Requests\Dashboard\System\RoleUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.system.roles.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $permissions = Permission::webGuard()->get();
        return view('dashboard.system.roles.create', compact('permissions'));
    }

    /**
     * @param \App\Http\Requests\RoleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $request->merge(['guard_name' => 'web']);
        $role = Role::create($request->only([
            'name',
            'label',
            'guard_name'
        ]));

        // sync permissions
        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Created Successfully')]);

        return redirect()->route('dashboard.system.roles.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Role $role)
    {
        $permissions = Permission::webGuard()->get();
        return view('dashboard.system.roles.edit', compact('role', 'permissions'));
    }

    /**
     * @param \App\Http\Requests\RoleUpdateRequest $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $request->merge(['guard_name' => 'web']);
        $role->update($request->all());

        // sync permissions
        $permissions = $request->get('permissions', []);
        $role->syncPermissions($permissions);

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Updated Successfully')]);

        return redirect()->route('dashboard.system.roles.index');
    }
}
