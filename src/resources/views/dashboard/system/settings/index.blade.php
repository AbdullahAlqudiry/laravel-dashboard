<x-layouts.app :title="__('trans.Settings Page Title')">

    {{ Aire::open()->route('dashboard.system.settings.store') }}

        @include('dashboard.system.settings.form')
    
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