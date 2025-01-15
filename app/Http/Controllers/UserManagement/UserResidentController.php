<?php

namespace App\Http\Controllers\UserManagement;

use App\Exceptions\NotFoundUser;
use App\Exceptions\NotMatchProvinceCity;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserResidentRegisterRequest;
use App\Models\City;
use App\Models\User;
use App\Repository\UserManagement\UserResidentRepository;

class UserResidentController extends Controller
{
    public function __construct(private readonly UserResidentRepository $residentRepository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function createResident(UserResidentRegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $checkUser = User::query()
            ->where('id', $request->user_id)
            ->exists();

        throw_if(!$checkUser, new NotFoundUser());

        if ($request->filled(['city_id', 'province_id'])) {
            $checkProvinceCity = City::query()
                ->where('id', $request->city_id)
                ->where('province_id', $request->province_id)
                ->exists();

            throw_if(!$checkProvinceCity, new NotMatchProvinceCity());
        }

        $userResident = $this->residentRepository->create($request->validated());

        return response()->json([
            'message' => 'Resident created successfully',
            'userResident' => $userResident
        ]);
    }

}
