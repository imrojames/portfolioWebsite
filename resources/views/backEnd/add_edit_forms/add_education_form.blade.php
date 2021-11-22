@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Add Education</h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Add Education</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    {!!Form::open(['action' => ['EducationsController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
      <span>Note: Fields with asterisk(*) are required.</span>
    </div>
    <div class="form-group">
      <label>Course taking up <span class="text-danger">*</span></label>
      <input class="form-control" name="courseTakingUp" placeholder="eg. Bachelor of Science in Information Technology major in Computer programming"></input>
      <small class="text-danger">{{$errors->first('courseTakingUp')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>School Year <span class="text-danger">*</span></label>
      <br>
      <label>From: </label>
      <input type="month" class="form-control" name="from_sy"></input>
      <small class="text-danger">{{$errors->first('from_sy')}}</small>
      <br>
      <label>To: </label>
      <input type="month" class="form-control" name="to_sy"></input>
      <small class="text-danger">{{$errors->first('to_sy')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Name of School <span class="text-danger">*</span></label>
      <input class="form-control" name="schoolName" placeholder="eg. STI College Ormoc"></input>
      <small class="text-danger">{{$errors->first('schoolName')}}</small>
    </div>
    <br>
    <div class="form-group" align="center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Add Education </button>
      <button type="button" class="btn btn-info btn-frm-close-education">Close</button>
    </div>
    {!!Form::close()!!} 
  </div>
</section>
@endsection