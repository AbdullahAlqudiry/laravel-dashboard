<x-layouts.app :title="__('trans.Roles Create Page Title')">

    {{ Aire::open()->route('dashboard.system.roles.store') }}

        @include('dashboard.system.roles.form')

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