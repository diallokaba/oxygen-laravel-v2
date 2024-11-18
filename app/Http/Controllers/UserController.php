<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(UserRequest $request){
        $user = $this->userService->createUser($request->validated());
        return response()->json([$user], 201);
    }
}
