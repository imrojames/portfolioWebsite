@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
@foreach($show_mail as $show)
<section class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>
        @if($show->subject == "")
          Subject: [No subject]
        @else
          Subject: {{$show->subject}}
        @endif 
      </h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Inbox</li>
      </ol>
    </div>
    <h6>From: {{$show->name}} - ({{$show->email}})</h6>
    <p> {{ date('F d, Y | h:i A', strtotime($show->created_at)) }} </p>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <p> 
        {{$show->message}}
    </p>
  </div>
</section>
@endforeach
@endsection