<?php

namespace App\Http\Livewire\Dashboard\System\Roles;

use App\Http\Livewire\BaseComponent;
use Livewire\WithPagination;
use App\Models\Role;

class Index extends BaseComponent
{
    use WithPagination;

    public $search = '';

    public function mount()
    {
        $this->authorize('dashboard.system.roles.show');
    }

    public function render()
    {
        $roles = Role::search($this->search)->orderBy('id', 'DESC')->paginate();

        return view('livewire.dashboard.system.roles.index', compact(
            'roles'
        ));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroyConfirm(Role $role)
    {
        $this->authorize('dashboard.system.roles.destroy');
        $this->dispatchBrowserEvent('destroy-confirm', ['row' => $role]);
        return response()->json('success', 200);
    }

    public function destroy(Role $role)
    {
        $this->authorize('dashboard.system.roles.destroy');

        if ($role->name == 'admin') {
            $this->dispatchBrowserEvent('toastr-alert', ['type' => 'error',  'message' => __('trans.Can\'t Be Deleted')]);
            return response()->json('error', 422);
        }

        $role->delete();

        $this->dispatchBrowserEvent('toastr-alert', ['type' => 'success',  'message' => __('trans.Deleted Successfully')]);
        return response()->json('success', 200);
    }
}
