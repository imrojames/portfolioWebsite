@extends('backEnd/me')
@section('content')
@include('modal/modal')
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
  <div class="container">

    <div class="section-title">
      <a href="/portfolio/create">
        <h2>Portfolio <span class="bx bx-plus"></span></h2>
      </a>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
      @if(count($portfolios) > 0)
        @foreach($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="/storage/portfolio_thumbnail/{{$portfolio->thumbnail}}" class="img-fluid" alt="">
            <div class="portfolio-links" id="{{$portfolio->id}}">
              <a href="/portfolio/{{$portfolio->id}}/edit" title="Edit"><i class="bx bx-edit"></i></a>
              <a href="#" class="delete-portfolio" title="Delete"><i class="bx bx-trash"></i></a>
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
@endsection