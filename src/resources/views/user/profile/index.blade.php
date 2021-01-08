<x-layouts.app :title="__('trans.Profile Page Title')">

    {{ Aire::open()->route('user.profile.store') }}

    <div class="card">

        <div class="card-header">
            <div class="float-left">
                <h5>{{ __('trans.User Profile Update Basic Info') }}</h5>
            </div>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::input('name', __('validation.attributes.name'))
                        ->defaultValue(auth()->user()->name)
                        ->addClass($errors->has('name') ? 'is-invalid' : null)
                    }}
                </div>
                
                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::email('email', __('validation.attributes.email'))
                        ->defaultValue(auth()->user()->email)
                        ->addClass($errors->has('email') ? 'is-invalid' : null)
                    }}          
                </div>
            
            </div>

        </div>
    </div>
    
    <div class="card">
            
        <div class="card-header">
            <div class="float-left">
                <h5>{{ __('trans.User Profile Update Password') }}</h5>
            </div>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::password('password', __('validation.attributes.password'))
                        ->setAttribute('autocomplete', 'new-password')
                        ->addClass($errors->has('password') ? 'is-invalid' : null)
                    }}
                </div>
                
                
                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::password('password_confirmation', __('validation.attributes.password_confirmation'))
                        ->setAttribute('autocomplete', 'new-password')
                        ->addClass($errors->has('password_confirmation') ? 'is-invalid' : null)
                    }}          
                </div>

                <div class="col-12 col-sm-6">
                    {{ 
                        Aire::password('current_password', __('validation.attributes.current_password'))
                        ->setAttribute('autocomplete', 'new-password')
                        ->addClass($errors->has('current_password') ? 'is-invalid' : null)
                    }}          
                </div>
            
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-footer text-right">
            {{
                Aire::button()
                ->labelHtml(__('trans.Save Button'))
                ->addClass('btn-primary')
            }}
        </div>
    </div>
    
    {{ Aire::close() }}

</x-layouts.app>