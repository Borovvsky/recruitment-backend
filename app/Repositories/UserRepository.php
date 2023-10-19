<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{

    /**
     * @return int
     */
    public function getUserCount(): int
    {
        return User::query()->count();
    }
}
