<?php

namespace App\Http\Livewire\Dashboard\System\WebServices;

use App\Http\Livewire\BaseComponent;
use Livewire\WithPagination;
use App\Models\WebService;

class Index extends BaseComponent
{
    use WithPagination;

    public $search = '';

    public function mount()
    {
        $this->authorize('dashboard.system.web-services.show');
    }

    public function render()
    {
        $webServices = WebService::search($this->search)->orderBy('id', 'DESC')->paginate();

        return view('livewire.dashboard.system.web-services.index', compact(
            'webServices'
        ));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroyConfirm(WebService $webService)
    {
        $this->authorize('dashboard.system.web-services.destroy');
        $this->dispatchBrowserEvent('destroy-confirm', ['row' => $webService]);
        return response()->json('success', 200);
    }

    public function destroy(WebService $webService)
    {
        $this->authorize('dashboard.system.web-services.destroy');

        $webService->delete();

        $this->dispatchBrowserEvent('toastr-alert', ['type' => 'success',  'message' => __('trans.Deleted Successfully')]);
        return response()->json('success', 200);
    }
}
