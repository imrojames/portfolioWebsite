@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Update Resume objective</h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Update Resume objective</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    @foreach($objectives as $objective)
    {!!Form::open(['action' => ['ResumeController@update', $objective->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
      <span>Note: Fields with asterisk(*) are required.</span>
    </div>
    <div class="form-group">
      <label>Objective <span class="text-danger">*</span></label>
      <textarea class="form-control" name="objective">{{ $objective->objective }}</textarea>
      <small class="text-danger">{{$errors->first('objective')}}</small>
    </div>
    <br>
    <div class="form-group" align="center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Resume objectives </button>
      <button type="button" class="btn btn-info btn-frm-close-objective">Close</button>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!!Form::close()!!}
    @endforeach
  </div>
</section>
@endsection