<?php

namespace App\Http\Livewire\Dashboard\System\Users;

use App\Http\Livewire\BaseComponent;
use Livewire\WithPagination;
use App\Models\User;

class Index extends BaseComponent
{
    use WithPagination;

    public $search = '';

    public function mount()
    {
        $this->authorize('dashboard.system.users.show');
    }

    public function render()
    {
        $users = User::search($this->search)->orderBy('id', 'DESC')->paginate();

        return view('livewire.dashboard.system.users.index', compact(
            'users'
        ));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroyConfirm(User $user)
    {
        $this->authorize('dashboard.system.users.destroy');
        $this->dispatchBrowserEvent('destroy-confirm', ['row' => $user]);
        return response()->json('success', 200);
    }

    public function destroy(User $user)
    {
        $this->authorize('dashboard.system.users.destroy');

        if ($user->hasRole('admin')) {
            $this->dispatchBrowserEvent('toastr-alert', ['type' => 'error',  'message' => __('trans.Can\'t Be Deleted')]);
            return response()->json('error', 422);
        }

        $user->delete();

        $this->dispatchBrowserEvent('toastr-alert', ['type' => 'success',  'message' => __('trans.Deleted Successfully')]);
        return response()->json('success', 200);
    }
}
