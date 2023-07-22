<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'version' => ['required', 'string'],
            'admin_contact' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'readme_url' => ['required', 'string'],
            'long_description' => ['required', 'string'],
            'icon' => ['required', 'string'],            
        ];
    }
}
