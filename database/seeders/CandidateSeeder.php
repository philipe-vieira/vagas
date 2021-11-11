<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'name' => 'Joao'
        ]);
        Candidate::create([
            'name' => 'Maria'
        ]);
        Candidate::create([
            'name' => 'Ana'
        ]);
    }
}
