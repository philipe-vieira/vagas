<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Skill;

class CandidateController extends Controller
{
    public function index() {
        $candidates = Candidate::get();
        
        return view('candidates.list', ['candidates' => $candidates]);
    }

    public function show ($id) {
        $candidate = Candidate::find($id);

        if(!$candidate){
            // Not Find the candidate
            return redirect()->route('candidates', ['error' => 'Candidate not Found']);
        }

        return view('candidates.show', ['candidate' => $candidate]);
    }

    public function create() {
        $skills = Skill::get();
        
        return view('candidates.create', ['skills' => $skills]);
    }

    public function store(Request $request) {
        $candidate = Candidate::create([
            'name' => $request->name
        ]);

        foreach($request->skills as $skill){
            if($request[$skill->name] == $skill->id){
                DB::table('candidate_skill')->insert([
                    'candidate_id' => $candidate->id,
                    'skill_id' => $skill->id
                ]);
            }
        }

        return redirect()->route('candidate.id', ['id' => $candidate->id]);
    }

    public function update(Request $request, $id) {
        $candidate = Candidate::find($id);

        if(!$candidate){
            // Not Find the candidate
            return redirect()->route('candidates', ['error' => 'candidate not Found']);
        }

        $skills = Skill::get();
  
        return view('candidates.update', [
            'candidate' => $candidate,
            'skills' => $skills
        ]);
    }
    
    public function change(Request $request) {
        $candidate = Candidate::find($request->id);

        $candidate->name = $request->name;
        $candidate->save();

        foreach($request->skills as $skill){
            $exist_skill = DB::table('candidate_skill')
                ->where([
                    ['candidate_id', '=', $candidate->id],
                    ['skill_id', '=', $skill->id]
                ])->get();

            if($request[$skill->name] == $skill->id){
                // If is checked the skill and this not existed before
                if(!isset($exist_skill[0])){
                    DB::table('candidate_skill')->insert([
                        'candidate_id' => $candidate->id,
                        'skill_id' => $skill->id              
                    ]);
                }
            } else if (!$request[$skill->name] && $exist_skill){
                //If is not checked the skill and this existed before
                DB::table('candidate_skill')->where([
                    ['candidate_id', '=', $candidate->id],
                    ['skill_id', '=', $skill->id]
                ])->delete();
            }
        }

        return redirect()->route('candidate.id', ['id' => $candidate->id]);
    }

    public function delete(Request $request) {
        Candidate::destroy($request->id);
        return redirect()
            ->route('candidates');
    }
}
