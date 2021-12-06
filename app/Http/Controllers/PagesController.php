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
        $educations = DB::select('SELECT * FROM education');
        $experiences = DB::select('SELECT * FROM experiences');
        $portfolios = DB::select('SELECT * FROM portfolios');

        //To check if profiles table has data
        $profile_count = DB::select('SELECT COUNT(id) as profileCount FROM profiles');
        foreach($profile_count as $p_count){
            // if no data found
            if ($p_count->profileCount == "0") {
                //add default profile data
                $default_profile = new Profile;
                $default_profile->profile_fname = 'John';
                $default_profile->profile_mname = 'U.';
                $default_profile->profile_lname = 'Doe';
                $default_profile->photo = 'no_profile_image.jpeg';
                $default_profile->save();
            }
        }

        //To check if abouts table has data
        $about_count = DB::select('SELECT COUNT(id) as aboutCount FROM abouts');
        foreach($about_count as $a_count){
            // if no data found
            if ($a_count->aboutCount == "0") {
                //add default data
                $default_about = new About;
                $default_about->primary_qoutation = "Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.";
                $default_about->secondary_qoutation = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
                $default_about->bday = "1995-05-01";
                $default_about->phoneNo = "09502456710";
                $default_about->address = "Ormoc City, Leyte, Philippines";
                $default_about->age = "26";
                $default_about->degree = "Bachelor's";
                $default_about->course = "Bachelor of Science in Information Technology";
                $default_about->email = "binoyarojames@gmail.com";
                $default_about->save();
            }
        }

        //To check if resume objectives has data
        $objective_count = DB::select('SELECT COUNT(id) as objCount FROM objectives');
        foreach($objective_count as $o_count){
            // if No data found
            if ($o_count->objCount == "0") {
                // add default data
                $default_obj = new Objective;
                $default_obj->objective = "Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.";
                $default_obj->save();
            }
        }

        $profiles = DB::select('SELECT * FROM profiles');
        $abouts = DB::select('SELECT * FROM abouts');
        $objectives = DB::select('SELECT * FROM objectives');

    	return view ('frontEnd/index')->with(['profiles' => $profiles, 'abouts' => $abouts, 'objectives' => $objectives, 'educations' => $educations, 'experiences' => $experiences, 'portfolios' => $portfolios]);
    }
    

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