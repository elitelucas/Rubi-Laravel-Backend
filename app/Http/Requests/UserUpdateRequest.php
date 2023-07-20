<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserUpdateRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'password' => ['sometimes', 'string', 'max:255', 'confirmed'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'preferred_language_id' => ['required', 'integer', 'exists:languages,id'],
            'date_of_birth' => ['required', 'date'],
            'ip_address' => ['required', 'ip']
        ];
    }
}
