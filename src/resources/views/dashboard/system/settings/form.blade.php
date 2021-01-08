<div class="card">
            
    <div class="card-header">
        <div class="float-left">
            <h5>{{ __('trans.Settings Page Title') }}</h5>
        </div>
    </div>
    
    <div class="card-body">

        <div class="row">

            {{ 
                Aire::input('app_name', __('validation.attributes.app_name'))
                ->defaultValue(setting('app.name', config('app.name')))
                ->required()
                ->groupClass('col-12 col-sm-6')
            }}
            
            {{ 
                Aire::input('app_version', __('validation.attributes.app_version'))
                ->defaultValue(setting('app.version', config('system.app_version')))
                ->required()
                ->groupClass('col-12 col-sm-6')
            }}

            {{ 
                Aire::textarea('app_description', __('validation.attributes.app_description'))
                ->defaultValue(setting('app.description'))
                ->groupClass('col-12 col-sm-6')
            }}

            {{
                Aire::timezoneSelect('app_timezone', __('validation.attributes.app_timezone'))
                    ->required()
                    ->groupClass('col-12 col-sm-6')
                    ->defaultValue(setting('app.timezone'))
            }}

        </div>

    </div>

</div>
