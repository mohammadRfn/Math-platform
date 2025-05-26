<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tenants')->insert([
            [
                'name' => 'Tenant 1',
                'domain' => 'tenant1.example.com',
                'email' => 'tenant1@example.com',
            ],
            [
                'name' => 'Tenant 2',
                'domain' => 'tenant2.example.com',
                'email' => 'tenant2@example.com',
            ],
            [
                'name' => 'Tenant 3',
                'domain' => 'tenant3.example.com',
                'email' => 'tenant3@example.com',
            ],
        ]);
    }
}
