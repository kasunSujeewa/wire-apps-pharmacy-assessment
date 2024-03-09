<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AuthenticationController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $service) {
        $this->authService = $service;
    }

    public function register(RegisterRequest $request)
    {
   
        $response = $this->authService->register($request->only(['username','password','name','role']));
        return $this->sendResponse($response);
    }

    public function login(LoginRequest $request)
    {
   
        $response = $this->authService->login($request->validated());
        return $this->sendResponse($response);
    }


}
