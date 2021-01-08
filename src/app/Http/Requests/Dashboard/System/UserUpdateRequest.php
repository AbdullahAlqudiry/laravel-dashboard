<?php

namespace App\Http\Requests\Dashboard\System;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($this->user->id)],
            'role_ids' => ['required', 'array'],
            'role_ids.*' => ['required', 'integer', 'exists:roles,id'],
            'is_active' => ['required', 'boolean'],
        ];
    }
}
