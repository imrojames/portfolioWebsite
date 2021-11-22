@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Update About Page</h2>
          <ol>
            <li><a href="/1438">Home</a></li>
            <li>Update About page</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
      @foreach($abouts as $about)
        {!!Form::open(['action' => ['AboutsController@update', $about->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
          <div class="form-group">
            <span>Note: Fields with asterisk(*) are required.</span>
          </div>
          <div class="form-group">
            <label>Primary quotation <span class="text-danger">*</span></label>
            <textarea class="form-control" name="primaryQuotation" placeholder="Primary quotation">{{$about->primary_qoutation}}</textarea>
            <small class="text-danger">{{$errors->first('primaryQuotation')}}</small>
          </div>

          <br>
          <div class="form-group">
            <label>Secondary quotation <span class="text-danger">*</span></label>
            <textarea class="form-control" name="secQuotation" placeholder="Seconday quotation">{{ $about->secondary_qoutation }}</textarea>
            <small class="text-danger">{{$errors->first('secQuotation')}}</small>
          </div>
          <br>
          <div class="form-group">
            <label>Birthdate <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="bday" value="{{ $about->bday }}"></input>
            @if($errors->first('bday'))
              <small class="text-danger">The birthdate field is required.</small>
            @endif
          </div>
          <br>
          <div class="form-group">
            <label>Contact no. <span class="text-danger">*</span></label>
            <input type="text" name="contact" class="form-control" placeholder="Contact no." value="{{ $about->phoneNo }}">
            @if($errors->first('contact') == 'The contact field is required.')
              <small class="text-danger">The contact field is required</small>
            @elseif($errors->first('contact') == 'The contact may not be greater than 11.')
              <small class="text-danger">The contact may not be greater than 11.</small>
            @elseif($errors->first('contact') == 'The contact must be a number.')
              <small class="text-danger">The contact must be a number.</small>
            @endif
          </div>
          <br>
          <div class="form-group">
            <label>Based <span class="text-danger">*</span></label>
            <input type="text" name="address" class="form-control" placeholder="Based / Address" value="{{ $about->address }}">
            @if($errors->first('address'))
              <small class="text-danger">The address field is required.</small>
            @endif
          </div>
          <br>
          <div class="form-group">
            <label>Degree <span class="text-danger">*</span></label>
            <select class="form-control select2" name="degree">
                @if($about->degree == "Elemetary")
                  <option value="Elemtary" selected>Elemtary</option>
                  <option value="Junior High School">Junior High School</option>
                  <option value="Senior High School">Senior High School</option>
                  <option value="Bachelor's">Bachelor's</option>
                  <option value="Master's">Master's</option>
                  <option value="Doctoral">Doctoral</option>
                @endif
                @if($about->degree == "Junior High School")
                  <option value="Elemtary">Elemtary</option>
                  <option value="Junior High School" selected>Junior High School</option>
                  <option value="Senior High School">Senior High School</option>
                  <option value="Bachelor's">Bachelor's</option>
                  <option value="Master's">Master's</option>
                  <option value="Doctoral">Doctoral</option>
                @endif
                @if($about->degree == "Junior High School")
                  <option value="Elemtary">Elemtary</option>
                  <option value="Junior High School">Junior High School</option>
                  <option value="Senior High School" selected>Senior High School</option>
                  <option value="Bachelor's">Bachelor's</option>
                  <option value="Master's">Master's</option>
                  <option value="Doctoral">Doctoral</option>
                @endif
                @if($about->degree == "Bachelor's")
                  <option value="Elemtary">Elemtary</option>
                  <option value="Junior High School">Junior High School</option>
                  <option value="Senior High School">Senior High School</option>
                  <option value="Bachelor's" selected>Bachelor's</option>
                  <option value="Master's">Master's</option>
                  <option value="Doctoral">Doctoral</option>
                @endif
                @if($about->degree == "Master's")
                  <option value="Elemtary">Elemtary</option>
                  <option value="Junior High School">Junior High School</option>
                  <option value="Senior High School">Senior High School</option>
                  <option value="Bachelor's">Bachelor's</option>
                  <option value="Master's" selected>Master's</option>
                  <option value="Doctoral">Doctoral</option>
                @endif
                @if($about->degree == "Doctoral")
                  <option value="Elemtary">Elemtary</option>
                  <option value="Junior High School">Junior High School</option>
                  <option value="Senior High School">Senior High School</option>
                  <option value="Bachelor's">Bachelor's</option>
                  <option value="Master's">Master's</option>
                  <option value="Doctoral" selected>Doctoral</option>
                @endif
            </select>
            @if($errors->first('degree'))
              <small class="text-danger">The degree field is required.</small>
            @endif
          </div>
          <br>
          <div class="form-group">
            <label>Course <span class="text-danger">*</span></label>
            <input type="text" name="course" class="form-control" placeholder="Course" value="{{ $about->course }}">
            @if($errors->first('course'))
              <small class="text-danger">The course field is required.</small>
            @endif
          </div>
          <br>
          <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="emailAdd" class="form-control" placeholder="Email address" value="{{ $about->email }}">
            @if($errors->first('emailAdd') == 'The emailAdd must be a valid email address.')
              <small class="text-danger">The email must be a valid email address.</small>
            @elseif($errors->first('emailAdd') == 'The emailAdd field is required.')
              <small class="text-danger">The email field is required.</small>
            @endif
          </div>
            <br>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update about page </button>
              <button type="button" class="btn btn-info btn-frm-close-about">Close</button>
            </div>
            {{Form::hidden('_method', 'PUT')}}
        {!!Form::close()!!}
        @endforeach
      </div>
    </section>
@endsection