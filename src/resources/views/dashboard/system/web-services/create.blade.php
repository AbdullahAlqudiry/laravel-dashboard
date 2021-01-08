<x-layouts.app :title="__('trans.Web Services Page Title')">

    {{ Aire::open()->route('dashboard.system.web-services.store') }}
    
        @include('dashboard.system.web-services.form')
    
        <div class="card">
            <div class="card-footer text-right">
                {{
                    Aire::button()
                    ->labelHtml(__('trans.Create Button'))
                    ->addClass('btn-primary')
                }}
            </div>
        </div>

    {{ Aire::close() }}

</x-layouts.app>