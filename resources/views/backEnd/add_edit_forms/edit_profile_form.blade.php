@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Update Profile</h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Update Profile</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    @foreach($profiles as $profile)
    {!!Form::open(['action' => ['ProfilesController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
      <label>Note: Fields with asterisk(<strong class="text-danger">*</strong>) are required.</label>
    </div>
    <div class="form-group">
      <label>First Name <strong class="text-danger">*</strong></label>
      <input class="form-control" name="pfname" placeholder="First name" value="{{ $profile->profile_fname }}"></input>
      @if($errors->first('pfname') == 'The pfname field is required.')
        <small class="text-danger">The first name field is required.</small>
      @elseif($errors->first('pfname') == 'The pfname format is invalid.')
        <small class="text-danger">The first name format is invalid.</small>
      @elseif($errors->first('pfname') == 'The pfname may not be greater than 255.')
        <small class="text-danger">The first name may not be greater than 255.</small>
      @endif
    </div>
    <br>
    <div class="form-group">
      <label>Middle Name (Optional)</label>
      <input class="form-control" name="pmname" placeholder="Middle name" value="{{ $profile->profile_mname }}"></input>
    </div>
    <br>
    <div class="form-group">
      <label>Last Name <strong class="text-danger">*</strong></label>
      <input class="form-control" name="plname" placeholder="Last name" value="{{ $profile->profile_lname }}"></input>
      @if($errors->first('plname') == 'The plname field is required.')
        <small class="text-danger">The last name field is required.</small>
      @elseif($errors->first('plname') == 'The plname format is invalid.')
        <small class="text-danger">The last name format is invalid.</small>
      @elseif($errors->first('plname') == 'The plname may not be greater than 255.')
        <small class="text-danger">The last name may not be greater than 255.</small>
      @endif
    </div>
    <br>
    <div class="form-group">
      <label>Profile Photo</label>
      <input type="file" name="picture" class="form-control" value="{{ $profile->photo }}">
    </div>
    <br>
    <div class="form-group" align="center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Profile </button>
      <button type="button" class="btn btn-info btn-frm-close-profile">Close</button>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!!Form::close()!!}
    @endforeach
  </div>
</section>
@endsection
