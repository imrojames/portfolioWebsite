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
    <h4 id="{{$show->email}}">From: {{$show->name}} - ({{$show->email}}) <a href="#" class="copy_email"><span class="bx bx-copy-alt" title="copy email"></span></a></h4>
    <input value="{{$show->email}}" id="email" hidden=""></input>
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