<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     *
     * @param int $userId
     * @param User $currentUser
     * @return void
     */
    public function deleteUser(int $userId, User $currentUser)
    {
        $user = User::findOrFail($userId);

        if ($user->id === $currentUser->id) {
            throw new \Exception('You cannot delete your own account');
        }

        $user->delete();
    }
}
