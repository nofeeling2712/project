<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        App\Model\Item::class => Itempolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Gate::define('create-item', function ($user, $channel) {
        return $user->hasRole('Create');

    });
        Gate::define('update-item', function ($user, $item) {
        return $user->hasRole('Edit');
    });
        Gate::define('delete-item', function ($user, $item) {
        return $user->hasRole('Delete');
    });
    }
}
