<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use App\Profile;
use DB;
class EmailsController extends Controller
{
    //Global variables
    public $profile_info;

    public function __construct()
    {
        $this->profile_info = DB::select('SELECT * FROM profiles');
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            ]);

        $emails = new Email;
        $emails->name = $request->input('name');
        $emails->email = $request->input('email');
        $emails->subject = $request->input('subject');
        $emails->message = $request->input('message');
        $emails->status = 'Unread';
        $emails->save();

        return redirect('/#contact')->with('success', 'Your message has been sent. Thank you!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_mail = DB::select('SELECT * FROM emails WHERE id = '.$id);

        //Update email status upon viewing of email
        $update_statuses = Email::find($id);
        $update_statuses->status = 'Read';
        $update_statuses->save();

        $profiles = $this->profile_info;
        $emails = DB::select('SELECT COUNT(status) AS email_count FROM emails WHERE status = "Unread"');
        return view('backEnd/devInboxMsgShow')->with(['show_mail' => $show_mail, 'profiles' => $profiles, 'emails' => $emails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emails = Email::find($id);
        $emails->delete();

        return redirect('/1438/email')->with('success', 'Email successfully deleted.');
    }
}
