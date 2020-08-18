<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('MyNavBar', function ($menu) {

            $items = Menu::where('block_id',0)->get();

            foreach ($items as $item) {

                if(is_null($item->parent_id)){
                    $menu->add($item->title, ['url' => $item->link])->nickname('m'.$item->id);
                }
                else{
                    $parent = 'm'.$item->parent_id;
                    $menu->get($parent)->add($item->title,['url' => $item->link])->nickname('m'.$item->id);
                }
        }}

        );

        \Menu::make('menu1', function ($menu) {

            $items = Menu::where('block_id',1)->get();

//            dd($items);

            foreach ($items as $item) {

                if(is_null($item->parent_id)){
                    $menu->add($item->title,$item->link)->nickname('m'.$item->id);
                }
                else{
                    $parent = 'm'.$item->parent_id;
                    $menu->get($parent)->add($item->title,$item->link)->nickname('m'.$item->id);
                }
            }}

        );

        return $next($request);
    }
}
