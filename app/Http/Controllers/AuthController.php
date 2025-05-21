<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(ApiRegisterRequest $request)
    {
        $result = $this->authService->register($request->validated());

        return response()->json([
            'user' => $result['user'],
            'access_token' => $result['token'],
            'token_type' => 'bearer',
        ], 201);
    }

    public function login(ApiLoginRequest $request)
    {
        $token = $this->authService->login($request->validated());

        if (!$token) {
            return response()->json(['error' => 'email or password is incorrect.'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json(['message' => 'Successfully logged out.'], 200);
    }
}
