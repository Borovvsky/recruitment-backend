<?php

namespace App\Services;

use App\Repositories\UserRepository;

readonly class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    /**
     * @return int
     */
    public function getUserCount(): int
    {
        return $this->userRepository->getUserCount();
    }
}

