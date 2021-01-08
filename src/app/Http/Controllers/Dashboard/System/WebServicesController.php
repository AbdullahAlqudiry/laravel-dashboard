<?php

namespace App\Http\Controllers\Dashboard\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\System\WebServiceStoreRequest;
use App\Http\Requests\Dashboard\System\WebServiceUpdateRequest;
use App\Models\Permission;
use App\Models\WebService;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class WebServicesController extends Controller
{
    use Authorizable;

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.system.web-services.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $permissions = Permission::webServiceGuard()->get();
        return view('dashboard.system.web-services.create', compact('permissions'));
    }

    /**
     * @param \App\Http\Requests\WebServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebServiceStoreRequest $request)
    {
        $webService = Webservice::create($request->validated());

        // sync permissions
        $permissions = $request->get('permissions', []);
        $webService->syncPermissions($permissions);

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Created Successfully')]);

        return redirect()->route('dashboard.system.web-services.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WebService $webService
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WebService $webService)
    {
        $permissions = Permission::webServiceGuard()->get();
        return view('dashboard.system.web-services.edit', compact('webService', 'permissions'));
    }

    /**
     * @param \App\Http\Requests\WebServiceUpdateRequest $request
     * @param \App\Models\WebService $webService
     * @return \Illuminate\Http\Response
     */
    public function update(WebServiceUpdateRequest $request, WebService $webService)
    {
        $webService->update($request->validated());

        // sync permissions
        $permissions = $request->get('permissions', []);
        $webService->syncPermissions($permissions);

        $request->session()->flash('toastr-alert', ['type' => 'success',  'message' => __('trans.Updated Successfully')]);

        return redirect()->route('dashboard.system.web-services.index');
    }
}
