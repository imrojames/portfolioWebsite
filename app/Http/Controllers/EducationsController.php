<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Profile;
use App\Email;
use DB;

class EducationsController extends Controller
{
    //Global variables
    public $profile_info, $mail_count;

    public function __construct()
    {
        $this->profile_info = DB::select('SELECT * FROM profiles');
        $this->mail_count = DB::select('SELECT COUNT(status) AS email_count FROM emails WHERE status = "Unread"');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = $this->profile_info;
        $emails = $this->mail_count;
        return view('backEnd/add_edit_forms/add_education_form')->with(['profiles' => $profiles, 'emails' => $emails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'courseTakingUp' => 'required',
            'from_sy' => 'required',
            'to_sy' => 'required',
            'schoolName' => 'required'
            ]);

        $education = new Education;

        $education->courseTakingUp = $request->input('courseTakingUp');
        $education->from_sy = $request->input('from_sy');
        $education->to_sy = $request->input('to_sy');
        $education->school = $request->input('schoolName');
        $education->save();

        return redirect('/1438/resume')->with('success', 'Education successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = $this->profile_info;
        $emails = $this->mail_count;
        $educations = DB::select('SELECT * FROM education WHERE id = '.$id);

        return view('backEnd/add_edit_forms/edit_education_form')->with(['profiles' => $profiles, 'educations' => $educations, 'emails' => $emails]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'courseTakingUp' => 'required',
            'from_sy' => 'required',
            'to_sy' => 'required',
            'schoolName' => 'required'
            ]);
        
       $profiles = DB::select('SELECT * FROM profiles');
       $education = Education::find($id);

       $education->courseTakingUp = $request->input('courseTakingUp');
       $education->from_sy = $request->input('from_sy');
        $education->to_sy = $request->input('to_sy');
       $education->school = $request->input('schoolName');
       $education->save();

       return redirect('/1438/resume')->with('success', 'Education successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educations = Education::find($id);
        $educations->delete();

        return redirect('/1438/resume')->with('success', 'Education successfully deleted.');
    }
}
