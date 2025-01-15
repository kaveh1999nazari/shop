<?php

namespace App\Http\Controllers\Authentication;

use App\Exceptions\NotExistEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthVerifyEmailRequest;
use App\Notifications\sendOtpNotification;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AuthenticationController extends Controller
{
    function __construct(private readonly AuthService $authService)
    {
    }

    /**
     * @throws NotExistEmail
     */
    public function verifyEmail(AuthVerifyEmailRequest $request): JsonResponse
    {
        if ($this->authService->checkEmailExist($request->email) === true) {

            $this->authService->createOtp($request->email);

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

    public function login(AuthLoginRequest $request): JsonResponse
    {
        return $this->authService->loginByEmail($request->validated());
    }

//    public function login(Request $request)
//    {
//        $data = $request->only('mobile', 'password');
//        return $this->authService->login($data);
//    }
}
