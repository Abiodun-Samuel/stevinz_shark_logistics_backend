<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(AuthRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'name' => "{$data['first_name']} {$data['last_name']}",
                'email' => $data['email'],
                'avatar' => $data['avatar'],
                'password' => Hash::make($data['password']),
            ]);

            $adminEmail = env('ADMIN_EMAIL');
            $user->email === $adminEmail ? $user->assignRole(UserRole::SUPERADMIN->value) : $user->assignRole(UserRole::USER->value);

            return $this->successResponse($user, 'User register successfully.', 201);
        } catch (\Exception $ex) {
            $errorMessage = $ex->getMessage();
            return $this->errorResponse([], $errorMessage, 500);
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();
            $user = Auth::user();

            $authKey = json_encode([$user?->name ?? $user?->first_name, $user->email]);
            $token = $user->createToken($authKey)->plainTextToken;

            $data = ['user' => new UserResource($user), 'token' => $token];
            return $this->successResponse($data, 'Login was successful.', 200);
        } catch (\Exception $ex) {
            return $this->errorResponse([], $ex->getMessage(), 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse(NULL, 'Logged out successfully', 200);
    }
}
