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
use App\Email;
use DB;

class PagesController extends Controller
{   
    //Global variables
    public $mail_count, $profile_info;

    public function __construct()
    {
        $this->profile_info = DB::select('SELECT * FROM profiles');
        $this->mail_count = DB::select('SELECT COUNT(status) AS email_count FROM emails WHERE status = "Unread"');

        return "hai";
    }
    //Front end
    public function index(){
    	$abouts = DB::select('SELECT * FROM abouts');
    	$objectives = DB::select('SELECT * FROM objectives');
        $educations = DB::select('SELECT * FROM education');
        $experiences = DB::select('SELECT * FROM experiences');
        $portfolios = DB::select('SELECT * FROM portfolios');

        //To check if profiles table has data
        $profile_count = DB::select('SELECT COUNT(id) as profileCount FROM profiles');
        foreach($profile_count as $p_count){
            if ($p_count->profileCount == "0") {
                //add default profile data
                $default_profile = new Profile;
                $default_profile->profile_fname = 'User';
                $default_profile->profile_mname = 'U.';
                $default_profile->profile_lname = 'User';
                $default_profile->photo = 'no_image.png';
                $default_profile->save();
            }
        }

        $profiles = DB::select('SELECT * FROM profiles');

    	return view ('frontEnd/index')->with(['profiles' => $profiles, 'abouts' => $abouts, 'objectives' => $objectives, 'educations' => $educations, 'experiences' => $experiences, 'portfolios' => $portfolios]);
    }
    
    // $emails = DB::select('SELECT COUNT id FROM emails');

    //Revision code back end
    public function home(){
        $profiles = $this->profile_info;
        $emails = $this->mail_count;
        return view('backEnd/devHome')->with(['profiles' => $profiles, 'emails' => $emails]);
    }

    public function about(){
        $profiles = $this->profile_info;
        $abouts = DB::select('SELECT * FROM abouts');
        $emails = $this->mail_count;
        return view('backEnd/devAbout')->with(['profiles' => $profiles, 'abouts' => $abouts, 'emails' => $emails]);
    }

    public function resume(){
        $profiles = $this->profile_info;
        $abouts = DB::select('SELECT * FROM abouts');
        $objectives = DB::select('SELECT * FROM objectives');
        $educations = DB::select('SELECT * FROM education');
        $experiences = DB::select('SELECT * FROM experiences');
        $emails = $this->mail_count;
        return view('backEnd/devResume')->with(['profiles' => $profiles, 'objectives' => $objectives, 'educations' => $educations, 'abouts' => $abouts, 'experiences' => $experiences, 'emails' => $emails]);
    }

    public function portfolio(){
        $profiles = $this->profile_info;
        $portfolios = DB::select('SELECT * FROM portfolios');
        $emails = $this->mail_count;
        return view('backEnd/devPortfolio')->with(['profiles' => $profiles, 'portfolios' => $portfolios, 'emails' => $emails]);
    }

    public function inbox(){
        $profiles = $this->profile_info;
        $emails = $this->mail_count;
        $all_mails = DB::select('SELECT * FROM emails ORDER BY created_at DESC');
        return view('backEnd/devInbox')->with(['profiles' => $profiles, 'emails' => $emails, 'all_mails' => $all_mails]);
    }
}