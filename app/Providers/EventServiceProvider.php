<?php

namespace App\Providers;

use App\Events\CreateHeroCombat;
use App\Events\CreateHeroHack;
use App\Events\UpdateHeroCombat;
use App\Events\UpdateHeroHack;
use App\Listeners\NewHeroCombat;
use App\Listeners\NewHeroHack;
use App\Listeners\UpdateHeroCombatListener;
use App\Listeners\UpdateHeroHackListener;
use App\Models\HeroCombat;
use App\Observers\CombatObserve;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreateHeroHack::class => [
            NewHeroHack::class,
        ],
        CreateHeroCombat::class => [
            NewHeroCombat::class
        ],
        UpdateHeroCombat::class => [
           UpdateHeroCombatListener::class
        ],
        UpdateHeroHack::class => [
            UpdateHeroHackListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
