<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\About;
use DB;

class AboutsController extends Controller
{
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
        $profiles = DB::select('SELECT * FROM profiles');
        $abouts = DB::select('SELECT * FROM abouts WHERE id = '.$id);
        return view('backEnd/add_edit_forms/edit_about_form')->with(['profiles' => $profiles, 'abouts' => $abouts]);
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
        //To validate form input
        $this->validate($request, [
            'primaryQuotation' => 'required|max:300',
            'secQuotation' => 'required|max:300',
            'bday' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'degree' => 'required',
            'course' => 'required',
            'emailAdd' => 'required|email',
            ]);
        //To get the age
        $currentYear = date("Y");
        //get the birth year only
        $birthyear = substr($request->input('bday'), 0,4);
        $age = $currentYear - $birthyear;

        $about = About::find($id);
        $about->primary_qoutation = $request->input('primaryQuotation');
        $about->secondary_qoutation = $request->input('secQuotation');
        $about->bday = $request->input('bday');
        $about->phoneNo = $request->input('contact');
        $about->address = $request->input('address');
        $about->age = $age;
        $about->degree = $request->input('degree');
        $about->course = $request->input('course');
        $about->email = $request->input('emailAdd');
        $about->save();

        return redirect('/1438/about')->with('success', 'About page successfully updated.');
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
