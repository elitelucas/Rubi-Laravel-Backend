<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
        return collect((new StoreUserRequest())->rules())
            ->merge([
                "superadmin_id" => ["required", "integer", "exists:users,id"],
                "business_name" => ["required", "string", "max:255"],
                "domain" => ["required", "string", "max:255"],
                "platform_id" => ["required", "integer"],
                "client_product_package_id" => ["required", "integer"],
            ])
            ->toArray();
    }
}
