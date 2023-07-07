<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstame' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'role' => 'required|string'.new Enum(RoleEnum::class),
            'country_id' => 'required|integer',
            'phone_country_code' => 'required|integer',
            'created_by_user_id' => 'required|integer',
            '2fa_verified' => 'required|boolean',
        ];
    }
}
