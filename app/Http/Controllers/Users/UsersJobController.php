<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\NotFoundUser;
use App\Exceptions\NotMatchProvinceCity;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserJobRegisterRequest;
use App\Models\City;
use App\Models\User;
use App\Repository\Users\UserJobRepository;
use Illuminate\Http\JsonResponse;

class UsersJobController extends Controller
{

    public function __construct(private readonly UserJobRepository $userJobRepository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function createJob(UserJobRegisterRequest $request): JsonResponse
    {
        $checkUser = User::query()
            ->where('id', $request->user_id)
            ->exists();

        throw_if(!$checkUser, new NotFoundUser());

        if ($request->filled(['province_id', 'city_id'])) {
            $checkProvinceCity = City::query()
                ->where('id', $request->city_id)
                ->where('province_id', $request->province_id)
                ->exists();

            throw_if(!$checkProvinceCity, new NotMatchProvinceCity());
        }

        $userJob = $this->userJobRepository->create($request->validated());

        return response()->json([
            'message' => 'User Job created successfully',
            'userJob' => $userJob
        ]);

    }

}
