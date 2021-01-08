<?php

namespace App\Http\Controllers\Dashboard\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\System\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.system.users.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $roles = Role::pluck('label', 'id')->toArray();
        return view('dashboard.system.users.edit', compact('user', 'roles'));
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncRoles($request->role_ids);

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Updated Successfully')]);

        return redirect()->route('dashboard.system.users.index');
    }
}
