<?php

namespace App\Http\Requests;

use App\Rules\EnsureWorkspaceBelongsToInviter;
use Illuminate\Foundation\Http\FormRequest;

class InvitationStoreRequest extends FormRequest
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
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:invitations,email'],
            'mobile' => ['required'],
            'workspace_id' => [
                'required',
                'integer',
                'exists:workspaces,id',
                new EnsureWorkspaceBelongsToInviter(),
            ],
        ];
    }
}
