<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEducationRegisterRequest;
use App\Repository\UserEducationRepository;
use Illuminate\Http\JsonResponse;

class UserEducationController extends Controller
{
    public function __construct(private readonly UserEducationRepository $userEducationRepository)
    {
    }

    public function createEducation(UserEducationRegisterRequest $request): JsonResponse
    {
        $userEducation = $this->userEducationRepository->createEducation($request->validated());

        return response()->json([
           'message' => 'userEducation created successfully',
            'userEducation' => $userEducation
        ]);
    }

}
