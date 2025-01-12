<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserResidentRegisterRequest;
use App\Repository\UserResidentRepository;

class UserResidentController extends Controller
{
    public function __construct(private readonly UserResidentRepository $residentRepository)
    {
    }

    public function createResident(UserResidentRegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $userResident = $this->residentRepository->create($request->validated());
        return response()->json([
            'message' => 'Resident created successfully',
            'userResident' => $userResident
        ]);
    }

}
