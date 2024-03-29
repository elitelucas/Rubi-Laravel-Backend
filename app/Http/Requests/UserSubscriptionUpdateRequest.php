<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UserSubscriptionUpdateRequest extends FormRequest
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
        return Arr::except(
            array: Arr::collapse([
                (new UserSubscriptionStoreRequest())->rules(),
                ['active' => ['required', 'boolean']],
                ['primary' => ['required', 'boolean']],
            ]),
            keys: ['user_id', 'subscription_id']
        );
    }
}
