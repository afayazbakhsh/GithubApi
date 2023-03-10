<?php

namespace App\Providers;

use App\Events\Github\UserProfileCreated;
use App\Listeners\Github\SendEmail;
use App\Models\GithubProfile;
use App\Models\Token;
use App\Observers\GithubProfileObserver;
use App\Observers\TokenObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserProfileCreated::class => [

            SendEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Token::observe(TokenObserver::class);
        GithubProfile::observe(GithubProfileObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
