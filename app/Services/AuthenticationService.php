<?php

namespace App\Services;

use App\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthenticationService implements AuthenticationServiceInterface
{
    public function login(array $data): bool
    {
        return Auth::attempt(['email' => $data['loginemail'], 'password' => $data['loginpassword']]);
    }
}