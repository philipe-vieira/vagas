<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Skill;

class EnsureMinimalSkills
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $skills = Skill::get();
        $cont_vacancies_skills = 0;
        foreach($skills as $skill){
            if($request[$skill->name] == $skill->id){
                $cont_vacancies_skills++;
            }
        }

        if($cont_vacancies_skills < 3) 
            return back()->withInput()->with('error', 'Form is missing fields');

        $request->skills = $skills;
        
        return $next($request);
    }
}
