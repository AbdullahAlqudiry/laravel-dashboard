<x-layouts.app :title="__('trans.Users Edit Page Title')">

    {{ Aire::open()->route('dashboard.system.users.update', $user)->bind($user) }}

        @include('dashboard.system.users.form')
    
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