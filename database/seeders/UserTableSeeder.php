<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // فعال کردن foreign key constraints در SQLite
        // DB::statement('PRAGMA foreign_keys=ON');

        $level = DB::table('levels')->first();  

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
        ]);
        $admin->assignRole('admin');  

        $challangeUser = User::create([
            'name' => 'Challange User',
            'email' => 'challangeuser@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
            'level_id' => $level ? $level->id : null,  
        ]);
        $challangeUser->assignRole('challange_user');  

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
            'level_id' => $level ? $level->id : null, 
        ]);
        $user->assignRole('user');  
    }
}
