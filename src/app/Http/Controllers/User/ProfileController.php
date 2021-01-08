<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UserUpdateInformationRequest;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.profile.index');
    }

    /**
     * @param \App\Http\Requests\User\Profile\UpdateUserInformationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserUpdateInformationRequest $request)
    {
        $request->merge([
            'password' => $request->password === null ? $request->user()->password : Hash::make($request->password)
        ]);

        $request->user()->update($request->only('name', 'email', 'password'));

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Updated Successfully')]);
        return redirect()->route('user.profile.index');
    }
}
