<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class BaseComponent extends Component
{
    public function authorize($roleOrPermission)
    {
        $user = auth()->user();

        if (is_null($user)) {
            abort(403);
        }

        if (!$user->can($roleOrPermission)) {
            abort(403);
        }
    }
}
