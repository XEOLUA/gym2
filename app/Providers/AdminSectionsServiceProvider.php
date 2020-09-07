<?php

namespace App\Providers;

use App\Cabinet;
use App\Classe;
use App\Direction;
use App\Manstatistic;
use App\Menu;
use App\Mo;
use App\Olympstatistic;
use App\Page;
use App\Subject;
use App\Teacher;
use App\Teacherinmo;
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
        Mo::class => 'App\Http\Sections\Mos',
        Teacher::class => 'App\Http\Sections\Teachers',
        Classe::class => 'App\Http\Sections\Classes',
        Cabinet::class => 'App\Http\Sections\Cabinets',
        Subject::class => 'App\Http\Sections\Subjects',
        Olympstatistic::class => 'App\Http\Sections\Olympstatistics',
        Manstatistic::class => 'App\Http\Sections\Manstatistics',

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
