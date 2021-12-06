@extends('backEnd/me')
@section('content')
@include('modal/modal')
<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
  <div class="container">
    <div class="section-title">
      @if($objectives >= 1)
      @foreach($objectives as $objective)
      <a href="/resume/{{$objective->id}}/edit">
        <h2 data-bs-toggle="modal" data-bs-target="#objectiveModal">Resume<span class="bx bx-edit"></span></h2>
      </a>
      <p>{{ $objective->objective }}</p>
      @endforeach
      @else
      <p> </p>
      @endif
    </div>
    
    <div class="row">
      <div class="col-lg-6" data-aos="fade-up">
        <h3 class="resume-title">Sumary</h3>
        <div class="resume-item pb-0">
          @foreach($profiles as $profile)
          <h4>{{ $profile->profile_fname }} {{ $profile->profile_mname }} {{ $profile->profile_lname }}</h4>
          @endforeach

          @foreach($abouts as $about)
          <p><em>{{ $about->course }}</em></p>
          <ul>
            <li>{{ $about->address }}</li>
            <li>{{ $about->phoneNo }}</li>
            <li>{{ $about->email }}</li>
          </ul>
          @endforeach
        </div>
        
        <a href="/education/create">
          <h3 class="resume-title">Education <span class="bx bx-plus"></span></h3>
        </a>
        @if(count($educations) >= 1)
        @foreach($educations as $educ)
        <div class="resume-item">
          <h4>{{ $educ->courseTakingUp }}</h4>
          <h5>{{date('F Y', strtotime($educ->from_sy))}} - {{date('F Y', strtotime($educ->to_sy))}}</h5>
          <p><em>{{ $educ->school }}</em></p>
          <p id="{{$educ->id}}">
            <a href="/education/{{$educ->id}}/edit">Edit</a>
            <span>|</span>
            <a href="#" class="delete-edu">Delete</a>
          </p>
        </div>
        @endforeach
        @else
        <li>No education background found.</li>
        @endif
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <a href="/experience/create">
          <h3 class="resume-title">Professional Experience <span class="bx bx-plus"></span></h3>
        </a>
        @if(count($experiences) >= 1)
        @foreach($experiences as $exp)
        <div class="resume-item">
          <h4>{{$exp->position}}</h4>
          <h5>{{date('F Y', strtotime($exp->form_dateEmployed))}} - {{date('F Y', strtotime($exp->to_dateEmployed))}}</h5>
          <p><em>{{$exp->company}}</em></p>
          <ul>
            <li>{{$exp->workDesc1}}</li>
            <li>{{$exp->workDesc2}}</li>
            <li>{{$exp->workDesc3}}</li>
          </ul>
          <p id="{{$exp->id}}">
            <a href="/experience/{{$exp->id}}/edit">Edit</a>
            <span>|</span>
            <a href="#" class="delete-exp">Delete</a>
          </p>
        </div>
        @endforeach
        @else
        <li>No professional experience found.</li>
        @endif
      </div>
    </div>
  </div>
</section><!-- End Resume Section -->
@endsection