<?php

namespace App\Services;

use App\Interfaces\RegistrationServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService implements RegistrationServiceInterface
{
    public function register(array $data): void
    {
        User::create(
        [
            'username' => $data['username'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),
        ]);
    }
}