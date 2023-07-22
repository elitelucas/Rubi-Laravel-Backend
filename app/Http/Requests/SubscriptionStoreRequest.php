<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionStoreRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'created_by_user_id' => ['required', 'integer', 'exists:users,id'],
            'affiliate_price_monthly' => ['required', 'numeric'],
            'retail_price_monthly' => ['required', 'numeric'],
            'affiliate_annual' => ['required', 'numeric'],
            'retail_annual' => ['required', 'numeric'],
            'workspaces' => ['required', 'integer'],
            'collaborators' => ['required', 'integer'],
            'words' => ['required', 'integer'],
            'credits' => ['required', 'integer'],
        ];
    }
}
