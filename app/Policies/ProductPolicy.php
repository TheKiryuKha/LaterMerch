<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

final class ProductPolicy
{
    public function is_Admin(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }
}
