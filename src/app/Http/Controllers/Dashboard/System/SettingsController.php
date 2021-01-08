<?php

namespace App\Http\Controllers\Dashboard\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\System\SettingsStoreRequest;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.system.settings.index');
    }

    /**
     * @param \App\Http\Requests\SettingsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingsStoreRequest $request)
    {
        setting([
            'app.name' => $request->app_name,
            'app.version' => $request->app_version,
            'app.description' => $request->app_description,
            'app.timezone' => $request->app_timezone,
        ])->save();

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Updated Successfully')]);
        return redirect()->route('dashboard.system.settings.index');
    }
}
