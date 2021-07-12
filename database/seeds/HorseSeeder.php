<?php

use Illuminate\Database\Seeder;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horses = [
            [
                'name' => 'Алпан',
                'cat_id' => 2,
                'col_id' => 1,
                'year' => 2014,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/alpan.jfif")),
            ],
            [
                'name' => 'Тохтамыш',
                'cat_id' => 2,
                'col_id' => 2,
                'year' => 2017,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/tohtamysh.jpg")),
            ],
            [
                'name' => 'Шерхан',
                'cat_id' => 2,
                'col_id' => 3,
                'year' => 2017,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/sherkhan.jpg")),
            ],
            [
                'name' => 'Олимпиада',
                'cat_id' => 1,
                'col_id' => 4,
                'year' => 2017,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/olympic.jfif")),
            ],
            [
                'name' => 'Клятва',
                'cat_id' => 1,
                'col_id' => 5,
                'year' => 2017,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/klyatva.jfif")),
            ],
            [
                'name' => 'Бахига',
                'cat_id' => 1,
                'col_id' => 6,
                'year' => 2017,
                'height' => 160,
                'length' => 175,
                'chest' => 95,
                'l_id' => 1,
                'img' => file_get_contents( public_path("assets/images/bahiga.jfif")),
            ],

        ];

        DB::table('horses')->insert($horses);
    }
}
