<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Profile;
use App\About;
use App\Objective;
use App\Education;
use App\Experience;
use App\Portfolio;
use DB;

class PagesController extends Controller
{   
    //Front end
    public function index(){
    	$profiles = DB::select('SELECT * FROM profiles WHERE id = 1');
    	$abouts = DB::select('SELECT * FROM abouts WHERE id = 1');
    	$objectives = DB::select('SELECT * FROM objectives WHERE id = 1');
        $educations = DB::select('SELECT * FROM education');
        $experiences = DB::select('SELECT * FROM experiences');
        $portfolios = DB::select('SELECT * FROM portfolios');

    	return view ('frontEnd/index')->with(['profiles' => $profiles, 'abouts' => $abouts, 'objectives' => $objectives, 'educations' => $educations, 'experiences' => $experiences, 'portfolios' => $portfolios]);
    }
    

    //Revision code back end
    public function home(){
        $profiles = DB::select('SELECT * FROM profiles');
        return view('backEnd/devHome')->with(['profiles' => $profiles]);
    }

    public function about(){
        $profiles = DB::select('SELECT * FROM profiles');
        $abouts = DB::select('SELECT * FROM abouts');
        return view('backEnd/devAbout')->with(['profiles' => $profiles, 'abouts' => $abouts]);
    }

    public function resume(){
        $profiles = DB::select('SELECT * FROM profiles');
        $abouts = DB::select('SELECT * FROM abouts');
        $objectives = DB::select('SELECT * FROM objectives');
        $educations = DB::select('SELECT * FROM education');
        $experiences = DB::select('SELECT * FROM experiences');
        return view('backEnd/devResume')->with(['profiles' => $profiles, 'objectives' => $objectives, 'educations' => $educations, 'abouts' => $abouts, 'experiences' => $experiences]);
    }

    public function portfolio(){
        $profiles = DB::select('SELECT * FROM profiles');
        $portfolios = DB::select('SELECT * FROM portfolios');
        return view('backEnd/devPortfolio')->with(['profiles' => $profiles, 'portfolios' => $portfolios]);
    }
}