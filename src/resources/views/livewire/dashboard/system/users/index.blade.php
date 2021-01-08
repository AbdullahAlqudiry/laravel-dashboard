<div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="float-left">
                        <h5>{{ __('trans.Users Page Title') }}</h5>
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
                                        <th>{{ __('validation.attributes.email') }}</th>
                                        <th>{{ __('validation.attributes.role_id') }}</th>
                                        <th>{{ __('validation.attributes.is_active') }}</th>
                                        <th>{{ __('trans.Member Since') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="{{ $user->is_active == false ? 'table-danger' : '' }}">
                                            <th>{{ $user->id }}</th>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <td>{!! $user->role_labels !!}</td>
                                            <td>{!! $user->readable_is_active !!}</td>
                                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('dashboard.system.users.edit', $user) }}" class="btn btn-warning"><i class="mdi mdi-pencil d-block"></i></a>
                                                </div>

                                                @can('dashboard.system.users.destroy')
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button wire:click.client="destroyConfirm({{ $user }})" class="btn btn-danger"><i class="mdi mdi-delete d-block"></i></button>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>                                        
                                    @endforeach

                                    @if(!$users->count())
                                        <tr>
                                            <td class="text-center" colspan="7">{{ __('trans.Empty Data') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <div class="card-footer">
                    {!! $users->links('components.pagination.livewire') !!}
                </div>

            </div>
        </div>
    </div>

    @include('livewire.destroy-confirm-js')
</div>
