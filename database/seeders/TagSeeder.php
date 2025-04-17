<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            'Urgent',
            'Important',
            'Work',
            'Personal',
            'Low Priority',
        ];

        foreach ($tags as $index => $name) {
            DB::table('tags')->insert([
                'tag_name' => $name,
                'tag_id' => $index + 1, // Manually incrementing tag_id
            ]);
        }
    }
}
