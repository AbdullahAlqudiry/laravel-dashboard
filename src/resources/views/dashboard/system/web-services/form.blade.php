<div class="card">
            
    <div class="card-header">
        <div class="float-left">
            <h5>{{ __('trans.Basic Information') }}</h5>
        </div>
    </div>
    
    <div class="card-body">

        <div class="row">

            <div class="col-12 col-sm-6">
                {{ 
                    Aire::input('name', __('validation.attributes.name'))
                    ->addClass($errors->has('name') ? 'is-invalid' : null)
                }}
            </div>
            
            <div class="col-12 col-sm-6">
                {{
                    Aire::select([true => __('trans.Active'), false => __('trans.Disabled')], 'is_active', __('validation.attributes.is_active'))
                    ->addClass($errors->has('is_active') ? 'is-invalid' : null)
                }}
            </div>
        
        </div>

        @if(isset($webService))
            <div class="row">

                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::input('api_token', 'API TOKEN')->disabled()
                    }}
                </div>
            
            </div>
        @endif

    </div>

</div>


<div class="card">

    <div class="card-header">
        <div class="float-left">
            <h5>{{ __('trans.Permissions') }}</h5>
        </div>
    </div>
    
    <div class="card-body">
    
        <div class="row">
            @foreach($permissions->groupBy('group_key') as $group => $groupPermissions)

                <div class="col-md-3">
                    <u>{{ __('trans.Roles List.' . $group) }}</u>
                    <br /><br />

                    @foreach($groupPermissions as $perm)

                        @php 
                            $perFound = false;
                            if( isset($webService) ) {
                                $perFound = $webService->hasPermissionTo($perm->name);
                            }
                        @endphp

                        <div class="checkbox">
                            <label>
                                {!!
                                    Aire::checkbox('permissions[]')
                                    ->label($perm->label)
                                    ->checked($perFound)
                                    ->value($perm->id)
                                    ->groupClass('mbm20')
                                !!}
                            </label>
                        </div>

                    @endforeach
                </div>
                    
            @endforeach
        </div>

    </div>

</div>