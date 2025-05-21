<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            ['name' => 'Beginner', 'min_score' => 0],
            ['name' => 'Intermediate', 'min_score' => 100],
            ['name' => 'Advanced', 'min_score' => 200],
        ]);
    }
}
