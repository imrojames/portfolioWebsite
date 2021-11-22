@extends('backEnd/me')
@section('home')
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      @if($profiles >= 1)
        @foreach($profiles as $profile)
          <h1>{{ $profile->profile_fname }} {{ $profile->profile_mname }} {{ $profile->profile_lname }}</h1>
        @endforeach
      @else
        <h1>User Name</h1>
      @endif
      <p>I'm <span class="typed" data-typed-items="Developer"></span></p>
    </div>
  </section><!-- End Hero -->
@endsection
