<?php

use Illuminate\Database\Seeder;
use App\Comment;

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
        $comment = new Comment();
        $comment->name = $faker->name;
        $comment->comment = $faker->text;
        $comment->level = 0;
        $comment->save();

        $reply = new Comment();
        $reply->name = $faker->name;
        $reply->comment = $faker->text;
        $reply->level = 1;
        $reply->comment_id = $comment->id;
        $reply->save();

        $reply2 = new Comment();
        $reply2->name = $faker->name;
        $reply2->comment = $faker->text;
        $reply2->level = 2;
        $reply2->comment_id = $reply->id;
        $reply2->save();
    }
}
