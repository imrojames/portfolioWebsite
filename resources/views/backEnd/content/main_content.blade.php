
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
        
    <!-- <main id="main"> -->
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="section-title">
            <a href="#">
              <h2 data-bs-toggle="modal" data-bs-target="#aboutModal">About<span class="bx bx-edit"></span></h2>
            </a>
            @if($abouts >=1)
              @foreach($abouts as $about)
                <p>{{ $about->primary_qoutation }}</p>
              @endforeach
            @else
              <p></p>
            @endif
          </div>
  
          <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
            <img src="/storage/profile_pictures/{{ $profile->photo }}" class="img-fluid" alt="">
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

      <!-- ======= Resume Section ======= -->
      <section id="resume" class="resume">
        <div class="container">
  
          <div class="section-title">
            <a href="#">
              <h2 data-bs-toggle="modal" data-bs-target="#objectiveModal">Resume<span class="bx bx-edit"></span></h2>
            </a>
            @if($objectives >= 1)
              @foreach($objectives as $objective)
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
                <h4>{{ $profile->profile_fname }} {{ $profile->profile_mname }} {{ $profile->profile_lname }}</h4>
                <p><em>{{ $about->course }}</em></p>
                <ul>
                  <li>{{ $about->address }}</li>
                  <li>{{ $about->phoneNo }}</li>
                  <li>{{ $about->email }}</li>
                </ul>
              </div>
              
              <a href="/education/create">
                <h3 class="resume-title">Education <span class="bx bx-plus"></span></h3>
              </a>
              @if($educations >= 1)
                @foreach($educations as $educ)
                  <div class="resume-item">
                    <h4>{{ $educ->courseTakingUp }}</h4>
                    <h5>{{ $educ->sy }}</h5>
                    <p><em>{{ $educ->school }}</em></p>
                    <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#editEduc">Edit {{$educ->id}}</a> -->
                    <p id="{{$educ->id}}">
                      <button type="button" class="edit-educ">Edit</button>
                      <!-- <a href="ed/{{$educ->id}}/edit">Edit</a> -->
                    </p>
                  </div>
                @endforeach
              @else
                <div class="resume-item">
                  <h4>No Education background</h4>
                </div>
              @endif
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <h3 class="resume-title">Professional Experience</h3>
              <div class="resume-item">
                <h4>Cash Custodian / Pre & Post Delivery Associate</h4>
                <h5>February 2020 - August 2021</h5>
                <p><em>LBC Express Inc. Palompon Delivery Hub</em></p>
                <ul>
                  <li>Ensure the safe keeping of branch collection.</li>
                  <li>Responsible for updating and monitoring of delivery status.</li>
                  <li>Ensure the correct destination of the item or the delivery.</li>
                </ul>
              </div>
              <div class="resume-item">
                <h4>Documentation Staff</h4>
                <h5>March 2019 - July 2019</h5>
                <p><em>LBC Express Inc. Ormoc City Delivery Hub</em></p>
                <ul>
                  <li>Ensure the proper documentation of cargoes or item to its destination.</li>
                  <li>Perform physical and system inventory.</li>
                </ul>
              </div>
              <div class="resume-item">
                <h4>Web Developer</h4>
                <h5>November 2018 - February 2019</h5>
                <p><em>Bootyard</em></p>
                <ul>
                  <li>Maintain a web application using Ruby on Rails framework.</li>
                  <li>Performed a tests's with in the system.</li>
                </ul>
              </div>
              <div class="resume-item">
                <h4>Intern Software Developer</h4>
                <h5>November 2018 - February 2019</h5>
                <p><em>DENR Cenro - Ormoc</em></p>
                <ul>
                  <li>Develop a Viewing Status of Billing NGP Sites from the sratch using PHP and MySQL for database</li>
                </ul>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End Resume Section -->
    <!-- </main> -->
   