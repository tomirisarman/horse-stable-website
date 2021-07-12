<?php

use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lines')->insert([
            [
                'l_name' => 'Гелишикли',
            ],
            [
                'l_name' => 'Каплана',
            ],
            [
                'l_name' => 'Гундагара',
            ],
            [
                'l_name' => 'Перена',
            ],
            [
                'l_name' => 'Факирпельвана',
            ],
            [
                'l_name' => 'Карлавача',
            ],

        ]);
    }
}
