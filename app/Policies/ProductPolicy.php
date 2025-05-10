<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

class ProductPolicy
{
    public function is_Admin(User $user): bool
    {
        return $user->role === UserRole::Admin;
    } 
}
