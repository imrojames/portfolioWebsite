@extends('backEnd/me')
@section('content')
<!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="section-title">
        @if($abouts >=1)
          @foreach($abouts as $about)
            <a href="/about/{{$about->id}}/edit">
              <h2 data-bs-toggle="modal" data-bs-target="#aboutModal">About<span class="bx bx-edit"></span></h2>
            </a>
            <p>{{ $about->primary_qoutation }}</p>
          @endforeach
        @else
          <p></p>
        @endif
      </div>
  
      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
        	@foreach($profiles as $profile)
        		<img src="/storage/profile_pictures/{{ $profile->photo }}" class="img-fluid" alt="">
        	@endforeach
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Web Developer.</h3>
          <p class="fst-italic">
            {{ $about->secondary_qoutation }}
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $about->bday }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phoneNo }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about->address }}</span></li>
              </ul>
            </div>
              <div class="col-lg-6">
               <ul>
                 <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age }}</span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $about->degree }}</span></li>
                 <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $about->email }}</span></li>
               </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->
@endsection