@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Update Work Experience</h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Update Work Experience</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    @foreach($experiences as $exp)
    {!!Form::open(['action' => ['ExperiencesController@update', $exp->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
      <span>Note: Fields with asterisk(*) are required.</span>
    </div>
    <div class="form-group">
      <label>Position <span class="text-danger">*</span></label>
      <input class="form-control" name="position" value="{{$exp->position}}" placeholder="Position"></input>
      <small class="text-danger">{{$errors->first('position')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Date Employed <span class="text-danger">*</span></label>
      <br>
      <label>From: </label>
      <input type="month" class="form-control" name="from_dateEmployed" value="{{$exp->form_dateEmployed}}"></input>
      <small class="text-danger">{{$errors->first('from_dateEmployed')}}</small>
      <br>
      <label>To: </label>
      <input type="month" class="form-control" name="to_dateEmployed" value="{{$exp->to_dateEmployed}}"></input>
      <small class="text-danger">{{$errors->first('to_dateEmployed')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Company <span class="text-danger">*</span></label>
      <input class="form-control" name="company" value="{{$exp->company}}" placeholder="Company"></input>
      <small class="text-danger">{{$errors->first('company')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Work Description 1 <span>(optional)</span></label>
      <textarea class="form-control" name="workDesc1" placeholder="Work Description...">{{$exp->workDesc1}}</textarea>
    </div>
    <br>
    <div class="form-group">
      <label>Work Description 2 <span>(optional)</span></label>
      <textarea class="form-control" name="workDesc2" placeholder="Work Description...">{{$exp->workDesc2}}</textarea>
    </div>
    <br>
    <div class="form-group">
      <label>Work Description 3 <span>(optional)</span></label>
      <textarea class="form-control" name="workDesc3" placeholder="Work Description...">{{$exp->workDesc3}}</textarea>
    </div>
    <br>
    <div class="form-group" align="center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> update Experience </button>
      <button type="button" class="btn btn-info btn-frm-close-experience">Close</button>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!!Form::close()!!} 
    @endforeach
  </div>
</section>
@endsection