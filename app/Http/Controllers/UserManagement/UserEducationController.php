<?php

namespace App\Http\Controllers\UserManagement;

use App\Exceptions\NotFoundDegree;
use App\Exceptions\NotFoundUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEducationRegisterRequest;
use App\Models\Degree;
use App\Models\User;
use App\Repository\UserEducationRepository;
use Illuminate\Http\JsonResponse;

class UserEducationController extends Controller
{
    public function __construct(private readonly UserEducationRepository $userEducationRepository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function createEducation(UserEducationRegisterRequest $request): JsonResponse
    {
        $checkUser = User::query()->where('id', $request->user_id)->exists();
        throw_if(!$checkUser, new NotFoundUser());

        if($request->filled(['degree_id'])) {
            $checkDegree = Degree::query()->where('id', $request->degree_id)->exists();
            throw_if(!$checkDegree, new NotFoundDegree());
        }

        $userEducation = $this->userEducationRepository->create($request->validated());

        return response()->json([
            'message' => 'userEducation created successfully',
            'userEducation' => $userEducation
        ]);
    }

}
