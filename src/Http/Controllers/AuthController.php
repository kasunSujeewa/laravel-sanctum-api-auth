<?php

namespace Coolcode\AuthApi\Http\Controllers;

use Coolcode\AuthApi\Constants\Constant;
use Coolcode\AuthApi\Http\Requests\UserLoginRequest;
use Coolcode\AuthApi\Http\Requests\UserRegistrationRequest;
use Coolcode\AuthApi\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class AuthController extends BaseController

{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(UserRegistrationRequest $request) : JsonResponse
    {

        $token = $this->authService->register($request->validated());

        return Response::apiSuccess($token,Constant::REGISTERED_SUCCESS_MESSAGE,JsonResponse::HTTP_CREATED);
    }

    public function login(UserLoginRequest $request) : JsonResponse
    {

        $token = $this->authService->login($request->validated());

        return  Response::apiSuccess($token,Constant::LOGGED_SUCCESS_MESSAGE);
    } 

    public function logout(Request $request)
    {
        $request->user('sanctum')->currentAccessToken()->delete();

        return  Response::apiSuccess([],Constant::LOGOUT_SUCCESS_MESSAGE);
    }
}
