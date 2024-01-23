<?php

namespace App\Providers;

use App\Alatmedis;
use App\Tag;
use App\Item;
use App\Role;
use App\User;
use App\Category;
use App\Jadwal;
use App\Kunjungan;
use App\Policies\AlatmedisPolicy;
use App\Policies\TagPolicy;
use App\Policies\ItemPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\KunjunganPolicy;
use App\Policies\RekamPolicy;
use App\Policies\JadwalPolicy;
use App\Policies\UtangPolicy;
use App\Rekam;
use App\Utang;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Item::class => ItemPolicy::class,
        Role::class => RolePolicy::class,
        Tag::class => TagPolicy::class,
        Rekam::class => RekamPolicy::class,
        Kunjungan::class => KunjunganPolicy::class,
        Alatmedis::class => AlatmedisPolicy::class,
        Jadwal::class => JadwalPolicy::class,
        Utang::class => UtangPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-items', 'App\Policies\UserPolicy@manageItems');

        Gate::define('manage-users', 'App\Policies\UserPolicy@manageUsers');
    }
}
