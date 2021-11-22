<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Roj. (Developer Mode)</title>
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
          @if(count($profiles) >= 1)
            @foreach($profiles as $profile)
              <img src="/storage/profile_pictures/{{ $profile->photo }}" alt="" class="img-fluid rounded-circle">
              <h1 class="text-light">
                <a href="/profile/{{ $profile->id }}/edit" type="button">
                  {{ $profile->profile_fname }} {{ $profile->profile_mname }} {{ $profile->profile_lname }}<span class="bx bx-edit"></span>
                </a>
              </h1>
            @endforeach
          @else
            <h1 class="text-light change_profile_name"><a data-bs-toggle="modal" data-bs-target="#myModal">User Name <span class="bx bx-edit"></span></a></h1>
          @endif
          
        </div>

        <nav id="navbar" class="nav-menu navbar">
          <ul>
            <li><a href="/1438" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
            <li><a href="/1438/about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
            <li><a href="/1438/resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
            <li><a href="/1438/portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
            <!-- <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li> -->
          </ul>
        </nav><!-- .nav-menu -->
      </div>
    </header><!-- End Header -->

    @yield('home')

    <!-- Main Content -->
    <main id="main">
      <!-- //Main Content here! -->
      @include('alert/alert')
      @yield('content')

    </main>
    <!-- End of Main Content -->

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
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/typed.js/typed.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- JQuery CDN -->
  <script src="{{ asset('vendor/jquery-2.2.3.min.js') }}"></script>

  <!-- Common Javascript -->
  <script src="{{ asset('vendor/common.js') }}"></script>
  

  <script type="text/javascript">
    // $(document).ready(function(){
    //   $('#editEduc').modal('show');
    // });

    $('.edit-educ').click(function(){
      var educId = $(this).parents('p').attr('id');
      // alert(educId);
      $.ajax({
        url:'education/'+educId+'/edit',
        type:'GET',
        success:function(data){
           var value = data.split(",");

            $('#eduID').val(value[0]);
            $('#courseTakingUp').val(value[1]);
            $('#sy').val(value[2]);
            $('#schoolName').val(value[3]);

            $('#editEduc').modal('show');

            $('#updateEdu').click(function(){
              var id = $('#eduID').val();
              var courseTakingUp = $('#courseTakingUp').val();
              var sy = $('#sy').val();
              var schoolName = $('#schoolName').val();

              $.ajax({
                url:'/education/'+id+'/'+courseTakingUp+'/'+sy+'/'+schoolName,
                type:'GET',
                success:function(data){
                  alert(data);
                  // indow.location.href = window.location.href;
                }
              });
            });
        }
      });
    });


    // $('.edit-educ').click(function(){
    //   var educId = $(this).parents('p').attr('id');
    //   $.ajax({
    //     url:educId,
    //     type:'GET',
    //     success:function(data){
    //       $('#editEduc').modal('show');
    //     }
    //   });
    // });

    // function modalshow(){
    //   $('#editEduc').modal('show');
    // }

  </script>
</html>