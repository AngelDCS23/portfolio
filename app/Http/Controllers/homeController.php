<?php

namespace App\Http\Controllers;

use App\Models\experience_has_skills;
use App\Models\proyects_has_skills;
use Illuminate\Http\Request;

use App\Models\education;
use App\Models\menu;
use App\Models\skills;
use App\Models\lenguages;
use App\Models\person;
use App\Models\experience;
use App\Models\projects;

class homeController extends Controller{

    public function languages(Request $request){
        $languages = lenguages::where('id', $request->id)->first();
        session(['language' => $languages->id]);
        return $languages;
    }

    public function menu(){
        $lenguages = session('language');

        if($lenguages == null){
            $lenguages = 1;
        }

        $menu = menu::where('languages_id', $lenguages)->first();
        return $menu;
    }

    public function skills(){
        $skills = skills::all();
        return $skills;
    }

    public function education(){
        $lenguages = session('language');
        if($lenguages == null){
            $lenguages = 1;
        }
        $education = education::where('languages_id', $lenguages)->get();
        return $education;
    }

    public function person(){
        $lenguages = session('language');
        if($lenguages == null){
            $lenguages = 1;
        }
        $person = person::where('languages_id', $lenguages)->first();
        return $person;
    }

    public function experience(){
        $lenguages = session('language');
        if($lenguages == null){
            $lenguages = 1;
        }
        $experience = experience::where('languages_id', $lenguages)->get();
        return $experience;
    }

    public function projects(){
        $lenguages = session('language');
        if($lenguages == null){
            $lenguages = 1;
        }
        $projects = projects::where('languages_id', $lenguages)->get();
        return $projects;
    }

    public function skillsExp(){
        $skillExp = experience_has_skills::select('experience_id', 'skills_id')
            ->groupBy('experience_id', 'skills_id')
            ->get();

        $skills = skills::whereIn('id', $skillExp->pluck('skills_id'))
            ->get()
            ->keyBy('id');

            $grouped = $skillExp->groupBy('experience_id')->map(function ($items) use ($skills) {
                return $items->map(function ($item) use ($skills) {
                    return $skills->get($item->skills_id);
                })->filter();
            });

        return $grouped; 
    }

    public function skillsProjects(){
        $skillProjects = proyects_has_skills::select('proyects_id', 'skills_id')
            ->groupBy('proyects_id', 'skills_id')
            ->get();
        $skills = skills::whereIn('id', $skillProjects->pluck('skills_id'))
            ->get()
            ->keyBy('id');

        $grouped = $skillProjects->groupBy('proyects_id')->map(function ($items) use ($skills) {
            return $items->map(function ($item) use ($skills) {
                return $skills->get($item->skills_id);
            })->filter();
        });
        return $grouped;
    }

    public function index(){
        $menu = $this->menu();
        $education = $this->education();
        $person = $this->person();
        $experience = $this->experience();
        $projects = $this->projects();
        $skills = $this->skills();
        $skillsExp = $this->skillsExp();
        $skillsProjects = $this->skillsProjects();
        
        \Log::info($menu);
        \Log::info($education);
        \Log::info($person);

        \Log::info('projects');
        \Log::info($skillsProjects);
        \Log::info('projects');

        \Log::info($experience);
        \Log::info($skillsExp);

        return view('home', compact('menu', 'education', 'person', 'experience', 'projects', 'skillsExp', 'skillsProjects', 'skills'));
    }



}
