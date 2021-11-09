<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vacancies')->insert([
            'title' => Str::random(10)
        ]);
        DB::table('vacancies')->insert([
            'title' => Str::random(10)
        ]);
        DB::table('vacancies')->insert([
            'title' => Str::random(10)
        ]);
    }
}
