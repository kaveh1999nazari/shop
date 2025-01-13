<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\UserEducation;
use App\Models\UserJob;
use App\Models\UserResident;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserDetails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $user = $event->user;

        UserResident::query()->create(['user_id' => $user->id]);
        UserEducation::query()->create(['user_id' => $user->id]);
        UserJob::query()->create(['user_id' => $user->id]);
    }
}
