<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            [
                'col_name' => 'изабелловый',
            ],
            [
                'col_name' => 'серый',
            ],
            [
                'col_name' => 'гнедой',
            ],
            [
                'col_name' => 'вороной',
            ],
            [
                'col_name' => 'буланый',
            ],
            [
                'col_name' => 'соловый',
            ],
            [
                'col_name' => 'рыжий',
            ],

        ]);
    }
}
