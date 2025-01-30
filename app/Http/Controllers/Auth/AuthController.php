<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\NotExistEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthVerifyEmailRequest;
use App\Notifications\sendOtpNotification;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    function __construct(private readonly AuthService $authService)
    {
    }

    public function verifyEmail(AuthVerifyEmailRequest $request): JsonResponse
    {
        if ($this->authService->checkEmailExist($request->email) === true) {

            $this->authService->createOtp($request->email);

            /** @var AuthService $user */
            $user = $this->authService->findUserByEmail($request->email);

            Notification::send($user, new sendOtpNotification($user->otp_code));

            return response()->json([
                'message' => 'your OTP Code has been sent to your email.',
                'code' => $user->otp_code
            ]);
        } else {
            throw new NotExistEmail();
        }
    }

    public function confirmEmail(Request $request): JsonResponse
    {
        $data = $request->only('email', 'otp_code');
        return $this->authService->loginByEmail($data);
    }

    public function login(Request $request): JsonResponse
    {
        $data = $request->only('mobile', 'password');
        return $this->authService->login($data);
    }
}
