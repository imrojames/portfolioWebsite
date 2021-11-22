<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Roj.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/roj-logo.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: iPortfolio - v3.5.0
    * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>
    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
      <div class="d-flex flex-column">

        <div class="profile">
          @if($profiles >= 1)
          @foreach($profiles as $profile)
          <img src="/storage/profile_pictures/{{ $profile->photo }}" alt="" class="img-fluid rounded-circle">
          <h1 class="text-light"><a href="{{url('/')}}">{{ $profile->profile_fname }} {{ $profile->profile_mname }} {{ $profile->profile_lname }}</a></h1>
          @endforeach
          @else
          <h1 class="text-light"><a href="{{url('/')}}">User Name</a></h1>
          @endif
          
        </div>

        <nav id="navbar" class="nav-menu navbar">
          <ul>
            <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
            <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
            <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
            <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
            <!-- <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li> -->
          </ul>
        </nav><!-- .nav-menu -->
      </div>
    </header><!-- End Header -->

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

    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">

          <div class="section-title">
            <h2>About</h2>
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
                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{date('F d, Y', strtotime($about->bday))}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phoneNo }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about->address }}</span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age }} year's old</span></li>
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
            <h2>Resume</h2>
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

              <h3 class="resume-title">Education</h3>
              @if($educations >= 1)
              @foreach($educations as $educ)
              <div class="resume-item">
                <h4>{{ $educ->courseTakingUp }}</h4>
                <h5>{{date('F Y', strtotime($educ->from_sy))}} - {{date('F Y', strtotime($educ->to_sy))}}</h5>
                <p><em>{{ $educ->school }}</em></p>
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
              @if($experiences >= 1)
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
              </div>
              @endforeach
              @endif
            </div>
          </div>

        </div>
      </section><!-- End Resume Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
        <div class="container">

          <div class="section-title">
            <h2>Portfolio</h2>
            <p>In this page you may see and visit my sample project or portfolios.</p>
          </div>

          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
              </ul>
            </div>
          </div>
          <br><br><br><br><br>
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          @if($portfolios >= 1)
            @foreach($portfolios as $portfolio)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="storage/portfolio_thumbnail/{{$portfolio->thumbnail}}" class="img-fluid" alt="">
                <div class="portfolio-links" id="{{$portfolio->id}}">
                  <a href="storage/portfolio_thumbnail/{{$portfolio->thumbnail}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$portfolio->portfolioName}}"><i class="bx bx-image"></i></a>
                  <a href="{{$portfolio->link}}" title="More Details" target="_blank" rel="noopener noreferrer"><i class="bx bx-link"></i></a>
                </div>
              </div>
              <h2 align="center">{{$portfolio->portfolioName}}</h2>
            </div>
            @endforeach
          @else
            <p>No portfolio found.</p>
          @endif
          </div>
        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= Contact Section ======= -->
      <!-- <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row" data-aos="fade-in">
            <div class="col-lg-15 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="10" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
      </section> --><!-- End Contact Section -->
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Roj.</span></strong>
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
          Designed by <a href="https://bootstrapmade.com/" target="_blank" rel="noopener noreferrer">BootstrapMade</a>
        </div>
      </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  </body>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/typed.js/typed.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  </html>