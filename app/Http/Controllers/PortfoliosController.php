<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Profile;
use App\Portfolio;
use App\Email;
use DB;

class PortfoliosController extends Controller
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
        return view('backEnd/add_edit_forms/add_portfolio_form')->with(['profiles' => $profiles, 'emails' => $emails]);
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
            'portfolioName' => 'required',
            'link' => 'required|url',
            'thumbnail' => 'required',
            ]);

        //Handle file upload
        if ($request->hasFile('thumbnail')) {
            //Get the filename with extension
            $picWithExt = $request->file('thumbnail')->getClientOriginalName();
            //Get just the filename
            $pic = pathinfo($picWithExt, PATHINFO_FILENAME);
            //Get just the file extension
            $picExt = $request->file('thumbnail')->getClientOriginalExtension();
            //Filename to store to DB
            $picture = $pic.'_'.time().'.'.$picExt;
            // Upload location
        $path = $request->file('thumbnail')->storeAs('public/portfolio_thumbnail', $picture);
        }

        $portfolios = new Portfolio;
        $portfolios->portfolioName = $request->input('portfolioName');
        $portfolios->link = $request->input('link');
        $portfolios->thumbnail = $picture;
        $portfolios->save();

        return redirect('/1438/portfolio')->with('success', 'Portfolio successfuly added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $portfolios = DB::select('SELECT * FROM portfolios WHERE id = '.$id);
        return view('backEnd/add_edit_forms/edit_portfolio_form')->with(['profiles' => $profiles, 'portfolios' => $portfolios, 'emails' => $emails]);
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
            'portfolioName' => 'required',
            'link' => 'required|url',
            ]);
        
        //Handle file upload
        if ($request->hasFile('thumbnail')) {
            //Get the filename with extension
            $picWithExt = $request->file('thumbnail')->getClientOriginalName();
            //Get just the filename
            $pic = pathinfo($picWithExt, PATHINFO_FILENAME);
            //Get just the file extension
            $picExt = $request->file('thumbnail')->getClientOriginalExtension();
            //Filename to store to DB
            $picture = $pic.'_'.time().'.'.$picExt;
            // Upload location
        $path = $request->file('thumbnail')->storeAs('public/portfolio_thumbnail', $picture);
        }

        $portfolios = Portfolio::find($id);
        if($request->hasFile('thumbnail')){
         if($portfolios->thumbnail != 'no_image.png'){
           Storage::delete('public/portfolio_thumbnail/'.$portfolios->thumbnail);
         }
        }
        $portfolios->portfolioName = $request->input('portfolioName');
        $portfolios->link = $request->input('link');
        if($request->hasFile('thumbnail')){
         $portfolios->thumbnail = $picture;
        }
        $portfolios->save();

        return redirect('/1438/portfolio')->with('success', 'Portfolio successfuly added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios = Portfolio::find($id);
        $portfolios->delete();
        Storage::delete('public/portfolio_thumbnail/'.$portfolios->thumbnail);

        return redirect('/1438/portfolio')->with('success', 'Portfolio successfully deleted.');
    }
}
