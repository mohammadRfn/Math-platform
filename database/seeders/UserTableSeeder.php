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
        DB::statement('PRAGMA foreign_keys=ON');

        // اطمینان از وجود رکوردهای جدول levels
        $level = DB::table('levels')->first();  // فرض می‌کنیم رکوردی در جدول levels داریم

        // ساخت کاربر ادمین
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
        ]);
        $admin->assignRole('admin');  // اختصاص نقش ادمین به کاربر

        // ساخت کاربر چالش‌کار
        $challangeUser = User::create([
            'name' => 'Challange User',
            'email' => 'challangeuser@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
            'level_id' => $level ? $level->id : null,  // اختصاص level_id به کاربر
        ]);
        $challangeUser->assignRole('challange_user');  // اختصاص نقش چالش‌کار به کاربر

        // ساخت کاربر عادی
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
            'level_id' => $level ? $level->id : null,  // اختصاص level_id به کاربر
        ]);
        $user->assignRole('user');  // اختصاص نقش کاربر عادی به کاربر
    }
}
