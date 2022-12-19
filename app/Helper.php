<?php

namespace App;

use App\Models\User;

class Helper {
    public static function user(): User|null
    {
        /** @var User $user */
        $user = auth()->user();

        return $user;
    }
}