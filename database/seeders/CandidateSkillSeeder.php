<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidate_skill')->insert([
            'candidate_id' => 1,
            'skill_id' => 1
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 1,
            'skill_id' => 2
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 1,
            'skill_id' => 4
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 1,
            'skill_id' => 6
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 2,
            'skill_id' => 4
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 2,
            'skill_id' => 5
        ]);
        DB::table('candidate_skill')->insert([
            'candidate_id' => 2,
            'skill_id' => 6
        ]);
    }
}
