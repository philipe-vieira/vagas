<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_vacancy')->insert([
            'vacancy_id' => 1,
            'skill_id' => 1
        ]);
        DB::table('skill_vacancy')->insert([
            'vacancy_id' => 1,
            'skill_id' => 2
        ]);
        DB::table('skill_vacancy')->insert([
            'vacancy_id' => 2,
            'skill_id' => 1
        ]);
    }
}
