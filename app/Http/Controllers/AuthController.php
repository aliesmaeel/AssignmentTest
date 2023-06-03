<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\CustomerService;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service=$service;
    }

    public function login(LoginRequest $request)
    {

        return $this->handleResponse($this->service->login($request,$request->all()),'successfully login');
    }


    public function register(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        return $this->handleResponse($this->service->register($request), 'User successfully registered!');
    }

}
