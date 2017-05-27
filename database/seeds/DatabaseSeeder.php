<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'name' => str_random(10),
            'comment' => 'This is my comment : '. str_random(10),
            'level' => 0,
        ]);
    }
}
