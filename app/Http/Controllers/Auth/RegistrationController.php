<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\RegistrationServiceInterface;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    public function __construct(protected RegistrationServiceInterface $registrationService)
    {
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->registrationService->register($request->validated());

        return redirect()->route('login')->with('success', 'Sėkmingai užsiregistravote!');
    }
}