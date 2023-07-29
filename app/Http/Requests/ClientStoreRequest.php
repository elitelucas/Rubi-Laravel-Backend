<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class ClientStoreRequest extends FormRequest
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
        $rules = [
            "superadmin_id" => ["required", "integer", "exists:users,id"],
            "domain" => ["required", "string", "max:255"],
            "platform_id" => ["required", "integer"],
            "client_product_package_id" => ["required", "integer"],
        ];

        return array_merge(
            $rules,
            (new UserStoreRequest())->rules(),
            (new AddressUserStoreRequest())->rules(),
        );
    }
}
