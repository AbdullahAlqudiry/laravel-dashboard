<div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="float-left">
                        <h5>{{ __('trans.Web Services Page Title') }}</h5>
                    </div>
                    <div class="float-right">
                        @can('dashboard.system.web-services.create')
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('dashboard.system.web-services.create') }}" class="btn btn-success"><i class="mdi mdi-plus"></i></a>
                            </div>
                        @endcan
                    </div>
                </div>

                <div class="card-body">

                    {{ 
                        Aire::input('search')
                        ->setAttribute('wire:model.debounce.500ms', 'search')
                        ->placeholder(__('trans.Search'))
                    }}
                    
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('validation.attributes.name') }}</th>
                                        <th>{{ __('validation.attributes.is_active') }}</th>
                                        <th>{{ __('trans.Created At') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($webServices as $webService)
                                        <tr class="{{ $webService->is_active == false ? 'table-danger' : '' }}">
                                            <th>{{ $webService->id }}</th>
                                            <th>{{ $webService->name }}</th>
                                            <td>{!! $webService->readable_is_active !!}</td>
                                            <td>{{ $webService->created_at->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('dashboard.system.web-services.edit', $webService) }}" class="btn btn-warning"><i class="mdi mdi-pencil d-block"></i></a>
                                                </div>

                                                @can('dashboard.system.web-services.destroy')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button wire:click.client="destroyConfirm({{ $webService }})" class="btn btn-danger"><i class="mdi mdi-delete d-block"></i></button>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>                                        
                                    @endforeach

                                    @if(!$webServices->count())
                                        <tr>
                                            <td class="text-center" colspan="5">{{ __('trans.Empty Data') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    {!! $webServices->links('components.pagination.livewire') !!}
                </div>

            </div>
        </div>
    </div>

    @include('livewire.destroy-confirm-js')
</div>
