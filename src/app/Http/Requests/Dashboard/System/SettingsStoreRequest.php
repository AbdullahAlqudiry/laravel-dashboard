<?php

namespace App\Http\Requests\Dashboard\System;

use Illuminate\Foundation\Http\FormRequest;

class SettingsStoreRequest extends FormRequest
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
            'app_name' => ['required', 'string', 'max:255'],
            'app_version' => ['required', 'string', 'max:255'],
            'app_description' => ['nullable', 'string', 'max:1500'],
            'app_timezone' => ['required', 'string', 'max:255'],
        ];
    }
}
