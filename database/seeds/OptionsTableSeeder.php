<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $options = [
            ['text' => 'Did a great job'],
            ['text' => 'Made customer(s) happy'],
            ['text' => 'Had a great idea'],
            ['text' => 'Are great to work with'],
            ['text' => 'Dealt with the stress'],
            ['text' => 'Were a great team player'],
            ['text' => 'Went above and beyond'],
        ];

        DB::table('options')->insert($options);
    }
}
