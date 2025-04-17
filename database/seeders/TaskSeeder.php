<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tag;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Get random existing user
        $user = User::inRandomOrder()->first();

        // Get random existing tag
        $tag = Tag::inRandomOrder()->first();

        DB::table('tasks')->insert([
            'title' => 'Team Meeting',
            'task_date' => now()->toDateString(),
            'task_time' => now()->addHours(2)->format('H:i:s'),
            'task_location' => 'Virginia',
            'tag_id' => $tag->id,
            'username' => $user->username,
        ]);

    }
}
