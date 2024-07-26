<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthenticationServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected AuthenticationServiceInterface $authenticationService;

    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if ($this->authenticationService->login($request->validated())) {
            return redirect()->route('login')->with('success', 'Sveiki sugrįžę!');
        }

        return redirect()->route('login')->with('failure', 'Neteisingi prisijungimo duomenys.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Lauksime sugrįžtant!');
    }

}