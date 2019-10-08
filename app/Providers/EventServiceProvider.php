<?php

namespace App\Providers;

use App\Events\DeleteNested;
use App\Listeners\DeleteNestedRelationship;
use App\Listeners\SendPasswordResetEmail;
use App\Listeners\UserUpdateEmail;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Prettus\Repository\Events\RepositoryEntityUpdated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PasswordReset::class => [
            SendPasswordResetEmail::class,
        ],
        DeleteNested::class => [
            DeleteNestedRelationship::class
        ],
        RepositoryEntityUpdated::class => [
            UserUpdateEmail::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
