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
                    Aire::input('label', __('validation.attributes.label'))
                    ->addClass($errors->has('label') ? 'is-invalid' : null)
                }}
            </div>

        </div>

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
                            if( isset($role) ) {
                                $perFound = $role->hasPermissionTo($perm->name);
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