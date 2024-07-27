<?php

namespace App\Interfaces;

interface RegistrationServiceInterface
{
    public function register(array $data): void;
}