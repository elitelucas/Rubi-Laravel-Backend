<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkspaceStoreRequest extends FormRequest
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
            'customer_user_id' => ['required', 'integer', 'exists:users,id'],
            'user_subscription_id' => ['required', 'integer', 'exists:user_subscriptions,id'],
            'nickname' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'active' => ['required', 'boolean']
        ];
    }
}
