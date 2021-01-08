<div wire:poll.30s>

    <div class="row">
        <div class="col-12">
            
            <div class="alert alert-warning fade show" role="alert">
                <i class="mdi mdi-alert-outline mr-2"></i>
                {{ __('trans.Statistics Page Updated every') }}: {{ now()->format('h:i:s A') }}
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">{{ __('trans.Users Page Title') }}</p>
                            <h4 class="mb-0">{{ $this->statistics['users'] }}</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fa fa-users font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">{{ __('trans.Roles Page Title') }}</p>
                            <h4 class="mb-0">{{ $this->statistics['roles'] }}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fa fa-list font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Web Services</p>
                            <h4 class="mb-0">{{ $this->statistics['web-services'] }}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fa fa-list font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>