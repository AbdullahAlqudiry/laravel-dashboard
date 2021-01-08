<?php

namespace App\Http\Livewire\Dashboard\System\Statistics;

use App\Http\Livewire\BaseComponent;
use App\Models\Role;
use App\Models\User;
use App\Models\WebService;

class Index extends BaseComponent
{
    public $statistics = [
        'users' => 0,
        'roles' => 0,
        'web-services' => 0
    ];

    public function mount()
    {
        $this->authorize('dashboard.system.statistics.show');
    }

    public function render()
    {
        $this->statistics['users'] = User::count();
        $this->statistics['roles'] = Role::count();
        $this->statistics['web-services'] = WebService::count();

        return view('livewire.dashboard.system.statistics.index');
    }
}
