<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Vacancy;

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
        Vacancy::create([
            'title' => 'Desenvolvedor '.Str::random(10)
        ]);
        Vacancy::create([
            'title' => 'Desenvolvedor '.Str::random(10)
        ]);
        Vacancy::create([
            'title' => 'Desenvolvedor '.Str::random(10)
        ]);
    }
}
