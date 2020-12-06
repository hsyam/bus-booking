<?php

namespace App\Http\Controllers\Api;
use OpenApi\Annotations as OA;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @OA\Post (
     *     path="/api/auth/register",
     *     tags={"auth"},
     *    @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       type="object",
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="hassan@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
     *       @OA\Property(property="name", type="string", example="hassan"),
     *    ),
     * ),
     *
     *     @OA\Response(response="200", description="Display a listing of projects." , @OA\JsonContent()),
     *     @OA\Response(response="422", description="Invalid gavien data." , @OA\JsonContent())
     * )
     *
     * @param RegisterUserRequest $request
     * @param UserService $userService
     * @return response()
     */
    public function register(RegisterUserRequest $request , UserService $userService)
    {
        $user = $userService->registerUser($request->toArray());
        $accessToken = $userService->createToken($user);
        return response([ 'user' => $user, 'token' => $accessToken]);
    }


    /**
     * @OA\Post (
     *     path="/api/auth/login",
     *     tags={"auth"},
     *    @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       type="object",
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="hassan@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
     *    ),
     * ),
     *     @OA\Response(response="200", description="Display a listing of projects." , @OA\JsonContent()),
     *     @OA\Response(response="422", description="Invalid gavien data." , @OA\JsonContent())
     * )
     *
     * @param LoginUserRequest $request
     * @param UserService $userService
     * @return response()
     */
    public function login(LoginUserRequest $request , UserService $userService)
    {


        if (!auth()->attempt($request->toArray())) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = $userService->createToken(auth()->user());

        return response(['user' => auth()->user(), 'token' => $accessToken]);

    }
}
