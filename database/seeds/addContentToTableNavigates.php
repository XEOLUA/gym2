<?php

use App\Navigation;
use Illuminate\Database\Seeder;

class addContentToTableNavigates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'block_id' => '1',
                    'title'   => 'Головна',
                    'link'    => '',
                    'order'   => 1,
                ],
                [
                    'block_id' => '1',
                    'title'   => 'Уроки',
                    'link'    => 'lessons',
                    'order'   => 2,
                ],
                [
                    'block_id' => '1',
                    'title'   => 'Про нас',
                    'link'    => 'about',
                    'order'   => 3,
                ],
                [
                    'block_id' => '1',
                    'title'   => 'Зворотній зв\'язок',
                    'link'    => 'callback',
                    'order'   => 4,
                ],
            ];

        foreach ($data as $item){
            Navigation::insert([
                'block_id' => $item['block_id'],
                'title' => $item['title'],
                'link' => $item['link'],
                'order' => $item['order'],
            ]);
        }
    }
}
