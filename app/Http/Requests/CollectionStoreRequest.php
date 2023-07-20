<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'managed_by' => ['required', 'integer', 'exists:users,id'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
            'icon' => ['required', 'string'],
        ];
    }
}
