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

//            foreach($groupsItems as $key => $group) {
//                if($key==0)
//                $menu->add($items[$key]->title, ['url' => $group->link])->nickname('m' . $group->id)->id($group->id);
//                foreach ($group as $v) {
//                    $menu->get("m" . $v->parent_id)->add($v->title . " order=" . $v->order . " id=" . $v->id,
//                        ['url' => $v->link])->nickname('m' . $v->id)->id($v->id);
//                }
//            }

//           $items = Menu::where('block_id',0)->where('active',1)->get()->sortBy(['order'])->keyBy('id');



//            foreach ($items as $item) {
//                if ($item->parent_id==0) {
//                    $menu->add($item->title, ['url' => $item->link])->nickname('m'.$item->id)->id($item->id);
//                    $items->forget($item->id);
//                }
//            }
//            $items = $items->sortBy(['parent_id','order']);
//            while(!$items->isEmpty()){
//                $items = $items->sortBy(['parent_id', 'order']);
//                foreach ($items as $item) {
//                    if($menu->get("m".$item->parent_id))  {
//                        $menu->get("m".$item->parent_id)->add($item->title." order=".$item->order." id=".$item->id,
//                            ['url' => $item->link])->nickname('m'.$item->id)->id($item->id);
//                        $items->forget($item->id);
//                    }
//                }
//
//            }
        });

//        \Menu::make('menu1', function ($menu) {
//
//            $items = Menu::where('block_id',1)->get()->sortBy('order');
//
////            dd($items);
//
//            foreach ($items as $item) {
//
//                if(is_null($item->parent_id) || $item->parent_id==0){
//                    $menu->add($item->title,$item->link)->nickname('m'.$item->id);
//                }
//                else{
//                    $parent = 'm'.$item->parent_id;
//                    $menu->get($parent)->add($item->title,$item->link)->nickname('m'.$item->id);
//                }
//            }}
//
//        );

        return $next($request);
    }

}
