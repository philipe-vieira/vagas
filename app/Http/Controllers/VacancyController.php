<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Candidate;
use App\Models\Skill;

class VacancyController extends Controller
{

    public function index() {
        $vacancies = Vacancy::get();
        
        $vacancies->map(function ($vacancy) {
            $vacancy->candidates = $this->candidates_to_vacancy($vacancy);
            return $vacancy;
        });
        
        return view('vacancies.list', ['vacancies' => $vacancies]);
    }

    public function show ($id) {
        $vacancy = Vacancy::find($id);

        if(!$vacancy){
            // Not Find the Vacancy
            return redirect()->route('vacancies', ['error' => 'Vacancy not Found']);
        }

        $vacancy->candidates = $this->candidates_to_vacancy($vacancy);

        return view('vacancies.show', ['vacancy' => $vacancy]);
    }

    public function create() {
        $skills = Skill::get();
        
        return view('vacancies.create', ['skills' => $skills]);
    }

    public function store(Request $request) {
        $vacancy = Vacancy::create([
            'title' => $request->title
        ]);

        foreach($request->skills as $skill){
            if($request[$skill->name] == $skill->id){
                DB::table('skill_vacancy')->insert([
                    'vacancy_id' => $vacancy->id,
                    'skill_id' => $skill->id
                ]);
            }
        }

        return redirect()->route('vacancy.id', ['id' => $vacancy->id]);
    }

    public function update(Request $request, $id) {
        $vacancy = Vacancy::find($id);

        if(!$vacancy){
            // Not Find the Vacancy
            return redirect()->route('vacancies', ['error' => 'Vacancy not Found']);
        }

        $skills = Skill::get();
  
        return view('vacancies.update', [
            'vacancy' => $vacancy,
            'skills' => $skills
        ]);
    }

    public function change(Request $request) {
        $vacancy = Vacancy::find($request->id);

        $vacancy->title = $request->title;
        $vacancy->save();

        foreach($request->skills as $skill){
            $exist_skill = DB::table('skill_vacancy')
                ->where([
                    ['vacancy_id', '=', $vacancy->id],
                    ['skill_id', '=', $skill->id]
                ])->get();

            if($request[$skill->name] == $skill->id){
                // If is checked the skill
                if(!isset($exist_skill[0])){
                    DB::table('skill_vacancy')->insert([
                        'vacancy_id' => $vacancy->id,
                        'skill_id' => $skill->id              
                    ]);
                }
            } else if (!$request[$skill->name] && $exist_skill){
                //If is not checked the skill and this existed before
                DB::table('skill_vacancy')->where([
                    ['vacancy_id', '=', $vacancy->id],
                    ['skill_id', '=', $skill->id]
                ])->delete();
            }
        }

        return redirect()->route('vacancy.id', ['id' => $vacancy->id]);
    }

    public function delete(Request $request) {
        Vacancy::destroy($request->id);
        return redirect()
            ->route('vacancies');
    }

    function candidates_to_vacancy($vacancy){
        $candidates = Candidate::get();
        $able_candidates = [];
        
        foreach ($candidates as $candidate) {
            $skills_amount = 0;

            foreach ($vacancy->skills as $vacancy_skill) {
                foreach ($candidate->skills as $candidate_skill) {
                    //If skill of candidate match with vacancy skill
                    if($vacancy_skill->id === $candidate_skill->id)
                        $skills_amount++;
                }
            }

            if ($skills_amount >= 3){
                // If candidate is able, add in array
                array_push($able_candidates, $candidate);
            }
        }
        
        return $able_candidates;
    }
}
