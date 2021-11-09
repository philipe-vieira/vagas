<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyController extends Controller
{

    public function test() {
        $vacancy = Vacancy::find(1);
        dd($vacancy->skills);
    }
}
