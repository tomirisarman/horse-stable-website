<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'cat_name' => 'кобылы',
            ],
            [
                'cat_name' => 'жеребцы',
            ],
            [
                'cat_name' => 'в тренинге',
            ],
            [
                'cat_name' => 'молодняк',
            ],
            [
                'cat_name' => 'подсосные',
            ],
        ]);
    }
}
