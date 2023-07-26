<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EnsureWorkspaceBelongsToInviter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validates if workspace belongs to current user
        // WARNING: request()->user is the user on the Route.. request()->user() is the logged user
        /** @var User $inviter */
        $inviter = request()->user;
        $inviterWorkspaceIds = $inviter->workspaces()->pluck('id');
        if ($inviterWorkspaceIds->doesntContain($value)) {
            $fail('This workspace does not belong to you.');
        }
    }
}
