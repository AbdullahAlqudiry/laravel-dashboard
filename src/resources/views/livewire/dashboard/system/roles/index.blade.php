<div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="float-left">
                        <h5>{{ __('trans.Roles Page Title') }}</h5>
                    </div>
                    <div class="float-right">
                        @can('dashboard.system.roles.create')
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('dashboard.system.roles.create') }}" class="btn btn-success"><i class="mdi mdi-plus"></i></a>
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
                                        <th>{{ __('validation.attributes.label') }}</th>
                                        <th>{{ __('validation.attributes.name') }}</th>
                                        <th>{{ __('trans.Created At') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th>{{ $role->id }}</th>
                                            <th>{{ $role->label }}</th>
                                            <th>{{ $role->name }}</th>
                                            <td>{{ $role->created_at->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                @can('dashboard.system.roles.edit')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="{{ route('dashboard.system.roles.edit', $role) }}" class="btn btn-warning"><i class="mdi mdi-pencil d-block"></i></a>
                                                    </div>
                                                @endcan

                                                @can('dashboard.system.roles.destroy')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button wire:click.client="destroyConfirm({{ $role }})" class="btn btn-danger"><i class="mdi mdi-delete d-block"></i></button>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>                                        
                                    @endforeach

                                    @if(!$roles->count())
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
                    {!! $roles->links('components.pagination.livewire') !!}
                </div>

            </div>
        </div>
    </div> 


    @include('livewire.destroy-confirm-js')
</div>
