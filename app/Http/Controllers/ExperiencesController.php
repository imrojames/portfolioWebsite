<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Experience;
use App\Email;
use DB;

class ExperiencesController extends Controller
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
        $emails = $this->mail_count;
        $profiles = $this->profile_info;
        return view('backEnd/add_edit_forms/add_experience_form')->with(['profiles' => $profiles, 'emails' => $emails]);
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
            'position' => 'required',
            'from_dateEmployed' => 'required',
            'to_dateEmployed' => 'required',
            'company' => 'required',
            ]);
        $experiences = new Experience;
        $experiences->position = $request->input('position');
        $experiences->form_dateEmployed = $request->input('from_dateEmployed');
        $experiences->to_dateEmployed = $request->input('to_dateEmployed');
        $experiences->company = $request->input('company');
        $experiences->workDesc1 = $request->input('workDesc1');
        $experiences->workDesc2 = $request->input('workDesc2');
        $experiences->workDesc3 = $request->input('workDesc3');
        $experiences->save();

        return redirect('/1438/resume')->with('success', 'Work experience successfully added.');
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
        $emails = $this->mail_count;
        $profiles = $this->profile_info;
        $experiences = DB::select('SELECT * FROM experiences WHERE id = '.$id);
        return view('backEnd/add_edit_forms/edit_experience_form')->with(['profiles' => $profiles, 'experiences' => $experiences, 'emails' => $emails]);
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
            'position' => 'required',
            'from_dateEmployed' => 'required',
            'to_dateEmployed' => 'required',
            'company' => 'required',
            ]);

        $experiences = Experience::find($id);
         $experiences->position = $request->input('position');
        $experiences->form_dateEmployed = $request->input('from_dateEmployed');
        $experiences->to_dateEmployed = $request->input('to_dateEmployed');
        $experiences->company = $request->input('company');
        $experiences->workDesc1 = $request->input('workDesc1');
        $experiences->workDesc2 = $request->input('workDesc2');
        $experiences->workDesc3 = $request->input('workDesc3');
        $experiences->save();

        return redirect('/1438/resume')->with('success', 'Work experience successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiences = Experience::find($id);
        $experiences->delete();

        return redirect('/1438/resume')->with('success', 'Experience successfully deleted.');
    }
}
