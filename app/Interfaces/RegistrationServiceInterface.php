<?php

namespace App\Interfaces;

interface RegistrationServiceInterface
{
    public function registerUser(array $data): void;
}