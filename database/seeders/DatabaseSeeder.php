<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(TenantSeeder::class);
        
        $this->call(LevelsSeeder::class);
        
        $this->call(RolesAndPermissionsSeeder::class);
        
        $this->call(UserTableSeeder::class);
        
        $this->call(ChallangeSeeder::class);
        
        $this->call(QuestionSeeder::class);
    }
}
