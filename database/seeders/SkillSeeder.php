<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Skill::create([
            'name' => 'RUBY'
        ]);
        Skill::create([
            'name' => 'PYTHON'
        ]);
        Skill::create([
            'name' => 'PHP'
        ]);
        Skill::create([
            'name' => 'HTML'
        ]);
        Skill::create([
            'name' => 'JavaScript'
        ]);
        Skill::create([
            'name' => 'CSS3'
        ]);
        Skill::create([
            'name' => 'Git'
        ]);
    }
}
