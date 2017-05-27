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
        $faker = Faker\Factory::create();

        DB::table('comments')->insert([
            'name' => $faker->name,
            'comment' => $faker->text,
            'level' => 0,
        ]);
    }
}
