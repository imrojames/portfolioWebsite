<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Profile;
use App\Email;
use DB;

class ProfilesController extends Controller
{
    //Global variables
    public $mail_count;

    public function __construct()
    {
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profiles = DB::select('SELECT * FROM profiles WHERE id = '. $id);
        return view('backEnd/add_edit_forms/edit_profile_form')->with(['profiles' => $profiles, 'emails' => $emails]);
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
        //input validation
        $this->validate($request, [
            'pfname' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'plname' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            ]);

        //Handle file upload
        if ($request->hasFile('picture')) {
            //Get the filename with extension
            $picWithExt = $request->file('picture')->getClientOriginalName();
            //Get just the filename
            $pic = pathinfo($picWithExt, PATHINFO_FILENAME);
            //Get just the file extension
            $picExt = $request->file('picture')->getClientOriginalExtension();
            //Filename to store to DB
            $picture = $pic.'_'.time().'.'.$picExt;
            // Upload location
        $path = $request->file('picture')->storeAs('public/profile_pictures', $picture);
        }

        $profile = Profile::find($id);
        if($request->hasFile('picture')){
        if($profile->picture != 'no_image.png'){
          Storage::delete('public/profile_pictures/'.$profile->photo);
        }
      }
        $profile->profile_fname = $request->input('pfname');
        $profile->profile_mname = $request->input('pmname');
        $profile->profile_lname = $request->input('plname');
        if($request->hasFile('picture')){
        $profile->photo = $picture;
      }
      $profile->save();

      return redirect('/1438')->with('success', 'Profile successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
