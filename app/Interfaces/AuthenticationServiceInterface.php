<?php

namespace App\Interfaces;

interface AuthenticationServiceInterface
{
    public function login(array $data): bool;
}