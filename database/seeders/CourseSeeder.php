<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('courses')->insert(
            [
                [
                    'title' => 'Kitesurfen Privéles 2,5 uur',
                    'max_persons' => 1,
                    'description' => 'Leer kitesurfen',
                    'price' => 100,
                    'price_include' => 'inclusief alle materialen',
                    'day_parts' => 1,
                ],
                [
                    'title' => 'Losse Duo Kiteles 3,5 uur',
                    'max_persons' => 2,
                    'description' => 'Leer samen kitesurfen',
                    'price' => 135,
                    'price_include' => 'per persoon inclusief alle materialen',
                    'day_parts' => 1,
                ],
                [
                    'title' => 'Kitesurf Duo lespakket 3 lessen 10,5 uur',
                    'max_persons' => 2,
                    'description' => 'Leer samen kitesurfen',
                    'price' => 375,
                    'price_include' => 'per persoon inclusief alle materialen',
                    'day_parts' => 1,
                ],
                [
                    'title' => 'Kitesurf Duo lespakket 5 lessen 17,5 uur',
                    'max_persons' => 2,
                    'description' => 'Leer samen kitesurfen',
                    'price' => 675,
                    'price_include' => 'per persoon inclusief materialen',
                    'day_parts' => 5,
                ],
            ]
        );
    }
}
