<?php

namespace App\Providers;

use App\Direction;
use App\Menu;
use App\Navigation;
use App\Page;
use App\User;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        User::class => 'App\Http\Sections\Users',
        Menu::class => 'App\Http\Sections\Menus',
//        Navigation::class => 'App\Http\Sections\Navigation',
        Page::class => 'App\Http\Sections\Pages',
        Direction::class => 'App\Http\Sections\Directions',
    ];

    /**
     * Register sections.
     *
     * @param Admin $admin
     * @return void
     */
    public function boot(Admin $admin)
    {
        //

        parent::boot($admin);
    }
}
