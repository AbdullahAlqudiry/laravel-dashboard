<x-layouts.app :title="__('trans.Roles Edit Page Title')">

    {{ Aire::open()->route('dashboard.system.roles.update', $role)->bind($role) }}

        @include('dashboard.system.roles.form')

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