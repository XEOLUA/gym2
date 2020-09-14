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

            $items = Menu::where('block_id',0)->get()->keyBy('id');
            $groupsItems = $items->sortBy('order')->groupBy('parent_id');
//dd($items);
            $node = [];
            foreach($groupsItems[null] as $i){
                $menu->add($i->title, ['url' => $i->link])->nickname('m' . $i->id)->id($i->id);
                $node[] = $i->id;
            }

//            dd($node);

            while(count($node)){
                foreach($node as $key => $i){
                    $children = $items->where('parent_id',$i)->sortBy('order');
                    unset($node[$key]);
                    foreach($children as $child){
                        $menu->get("m" . $child->parent_id)->add($child->title
//                            . " order=" . $child->order . " id=" . $child->id
                        ,['url' => $child->link])->nickname('m' . $child->id)->id($child->id);
                        $node[]=$child->id;
                    }
//                    dd($node);
                }
            }

        });

        \Menu::make('footer_block_0', function ($menu) {

            $parent_block = Menu::where('block_id',0)
                ->where('id',6)->get()[0];

            $items = Menu::where('block_id',0)
                ->where('active',1)
                ->where('parent_id',$parent_block->id)
                ->get()
                ->sortBy('order')
                ->keyBy('id')
            ;

            $menu->add($parent_block->title,$parent_block->link)->nickname('m'.$parent_block->id);

            foreach ($items as $item) {
                $parent = 'm'.$item->parent_id;
                $menu->get($parent)->add($item->title,$item->link)->nickname('m'.$item->id);
            }
        });

        \Menu::make('footer_block_1', function ($menu) {

            $parent_block = Menu::where('block_id',0)
                ->where('id',33)->get()[0];

            $items = Menu::where('block_id',0)
                ->where('active',1)
                ->where('parent_id',$parent_block->id)
                ->get()
                ->sortBy('order')
                ->keyBy('id')
            ;

            $menu->add($parent_block->title,$parent_block->link)->nickname('m'.$parent_block->id);

            foreach ($items as $item) {
                    $parent = 'm'.$item->parent_id;
                    $menu->get($parent)->add($item->title,$item->link)->nickname('m'.$item->id);
            }
        });


        \Menu::make('footer_block_2', function ($menu) {

            $parent_block = Menu::where('block_id',0)
                ->where('id',43)->get()[0];

            $items = Menu::where('block_id',0)
                ->where('active',1)
                ->where('parent_id',$parent_block->id)
                ->get()
                ->sortBy('order')
                ->keyBy('id')
            ;

            $menu->add($parent_block->title,$parent_block->link)->nickname('m'.$parent_block->id);

            foreach ($items as $item) {
                $parent = 'm'.$item->parent_id;
                $menu->get($parent)->add($item->title,$item->link)->nickname('m'.$item->id);
            }
        });

        return $next($request);
    }

}
