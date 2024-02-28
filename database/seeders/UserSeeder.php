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
                    'name' => 'Terence Olijslager',
                    'email' => 'terence@windkracht12.nl',
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'status' => 'active',
                ],
                [
                    'name' => 'Duco Veenstra',
                    'email' => 'duco@windkracht12.nl',
                    'password' => bcrypt('password'),
                    'role' => 'instructor',
                    'status' => 'active',
                ],
                [
                    'name' => 'Waldemar van Dongen',
                    'email' => 'waldermar@windkracht12.nl',
                    'password' => bcrypt('password'),
                    'role' => 'instructor',
                    'status' => 'active',
                ],
                [
                    'name' => 'Ruud Terlingen',
                    'email' => 'instructor@gmails.com',
                    'password' => bcrypt('password'),
                    'role' => 'instructor',
                    'status' => 'active',
                ],
                [
                    'name' => 'Saskia Brink',
                    'email' => 'saskia@windkracht12.nl ',
                    'password' => bcrypt('password'),
                    'role' => 'instructor',
                    'status' => 'active',
                ],
                [
                    'name' => 'Bernie Vredestein',
                    'email' => 'bernie@windkracht12.nl',
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
