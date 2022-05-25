<?php

namespace App\Http\Controllers;

use App\Account;
use App\Education;
use App\Experience;
use App\Gallery;
use App\Information;
use App\Skill;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $information = Information::first();
        $accounts = Account::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $degrees = Education::all();
        $projects = Gallery::all();
        return view('index' , compact('information' , 'accounts' , 'skills' , 'experiences' , 'degrees' , 'projects'));
    }
}
