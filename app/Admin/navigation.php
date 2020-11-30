<?php

use App\News;
use SleepingOwl\Admin\Navigation\Page;

//AdminNavigation::addPage('test');

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
//    [
//        'title' => 'Dashboard',
//        'icon'  => 'fas fa-tachometer-alt',
//        'url'   => route('admin.dashboard'),
//    ],
//
//    [
//        'title' => 'Information',
//        'icon'  => 'fas fa-info-circle',
//        'url'   => route('admin.information'),
//    ],

   //  Examples
    [
        'title' => 'Новини',
        'pages' => [

            (new Page(\App\News::class))
                ->setPriority(100)
                ->setIcon('far fa-newspaper')
                ->setUrl('/admin/news'),
            (new Page(\App\Newstype::class))
                ->setPriority(100)
                ->setIcon('fas fa-newspaper')
                ->setUrl('/admin/newstypes'),
        ],
    ],
     [
        'title' => 'Контент',
        'pages' => [

            (new Page(\App\Menu::class))
                ->setPriority(100)
                ->setIcon('fas fa-list')
                ->setUrl('/admin/menus'),
            (new Page(\App\Page::class))
                ->setPriority(100)
                ->setIcon('fas fa-file-alt')
                ->setUrl('/admin/pages'),
            (new Page(\App\Slider::class))
                ->setPriority(100)
                ->setIcon('fas fa-running')
                ->setUrl('/admin/sliders'),
            (new Page(\App\HistoryYear::class))
                ->setPriority(100)
                ->setIcon('fas fa-history')
                ->setUrl('/admin/history_years'),
            (new Page(\App\Bell::class))
                ->setPriority(100)
                ->setIcon('far fa-bell')
                ->setUrl('/admin/bells'),
        ],
     ],
    [
        'title' => 'Вчителі',
        'pages' => [

            (new Page(\App\Teacher::class))
                ->setPriority(100)
                ->setIcon('fas fa-chalkboard-teacher')
                ->setUrl('/admin/teachers'),
            (new Page(\App\Position::class))
                ->setPriority(100)
                ->setIcon('fas fa-id-card-alt')
                ->setUrl('/admin/positions'),
            (new Page(\App\Mo::class))
                ->setPriority(100)
                ->setIcon('fas fa-street-view')
                ->setUrl('/admin/mos'),
            (new Page(\App\Subject::class))
                ->setPriority(100)
                ->setIcon('fas fa-book-reader')
                ->setUrl('/admin/subjects'),
        ],
    ],
    [
        'title' => 'Учні',
        'pages' => [

            (new Page(\App\Pupil::class))
                ->setPriority(100)
                ->setIcon('fas fa-user-graduate')
                ->setUrl('/admin/pupils'),
            (new Page(\App\Classe::class))
                ->setPriority(100)
                ->setIcon('fas fa-users')
                ->setUrl('/admin/classes'),
            (new Page(\App\Socialgroup::class))
                ->setPriority(100)
                ->setIcon('fas fa-people-arrows')
                ->setUrl('/admin/socialgroups'),
        ],
    ],
    [
        'title' => 'Олімпіади та МАН',
        'pages' => [

            (new Page(\App\Olympstatistic::class))
                ->setPriority(100)
                ->setIcon('far fa-hand-peace')
                ->setUrl('/admin/olympstatistics'),
            (new Page(\App\Manstatistic::class))
                ->setPriority(100)
                ->setIcon('far fa-hand-peace')
                ->setUrl('/admin/manstatistics'),
        ],
    ],
    [
        'title' => 'Профілізація',
        'pages' => [

            (new Page(\App\Direction::class))
                ->setPriority(100)
                ->setIcon('fas fa-map-signs')
                ->setUrl('/admin/directions'),
            (new Page(\App\Circle::class))
                ->setPriority(100)
                ->setIcon('fas fa-user-friends')
                ->setUrl('/admin/circles'),
        ],
    ],
];
