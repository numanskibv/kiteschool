<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmails.com',
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'status' => 'active',
                ],
                [
                    'name' => 'Instructor',
                    'email' => 'instructor@gmails.com',
                    'password' => bcrypt('password'),
                    'role' => 'instructor',
                    'status' => 'active',
                ],
                [
                    'name' => 'Customer',
                    'email' => 'customer@gmails.com',
                    'password' => bcrypt('password'),
                    'role' => 'client',
                    'status' => 'inactive',
                ]
            ]
        );
    }
}
