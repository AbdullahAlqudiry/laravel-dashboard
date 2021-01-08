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
                    Aire::input('email', __('validation.attributes.email'))
                    ->addClass($errors->has('email') ? 'is-invalid' : null)
                }}
            </div>

        </div>
            
        <div class="row">

            <div class="col-12 col-sm-6">
                {{
                    Aire::select($roles, 'role_ids[]', __('validation.attributes.role_id'))
                    ->addClass($errors->has('role_ids') ? 'is-invalid' : null)
                    ->setAttribute('multiple', 'multiple')
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
