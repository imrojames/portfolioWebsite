@extends('backEnd/me')
@section('content')
@include('modal/modal')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Inbox</h2>
    </div>

    <div class="row" data-aos="fade-in">
      <!-- <div class="col-lg-15 mt-5 mt-lg-0 d-flex align-items-stretch"> -->
       <table id="example2" class="table table-bordered table-hover" style="width: 100%">
         <thead>
           <tr>
             <th>Name</th>
             <th>Subject</th>
             <th>Status</th>
             <th>Date</th>
             <th></th>
             <th></th>
           </tr>
         </thead>
         <tbody>
         @if(count($all_mails) >= 1)
          @foreach($all_mails as $all_mail)
            @if($all_mail->status == 'Unread')
            <tr class="fw-bold">
              <td>{{ $all_mail->name }}</td>
              <td>{{ $all_mail->subject }}</td>
              <td><strong class="text-danger">{{ $all_mail->status }}</strong></td>
              <td>{{ date('F d, Y | h:i A', strtotime($all_mail->created_at)) }}</td>
              <td>
                <a href="/email/{{ $all_mail->id }}" class="btn btn-primary">View</a>
              </td>
              <td id="{{ $all_mail->id }}">
               <button class="btn btn-danger delete-email">Delete</button>
             </td>
            </tr>
            @else
            <tr>
              <td>{{ $all_mail->name }}</td>
              <td>{{ $all_mail->subject }}</td>
              <td>{{ $all_mail->status }}</td>
              <td>{{ date('F d, Y | h:i A', strtotime($all_mail->created_at)) }}</td>
              <td class="text-center">
                <a href="/email/{{ $all_mail->id }}" class="btn btn-primary">View</a>
              </td>
              <td id="{{ $all_mail->id }}" class="text-center">
               <button class="btn btn-danger delete-email">Delete</button>
             </td>
            </tr>
            @endif
          @endforeach
         @else
          <tr>
            <td></td>
            <td></td>
            <td>No email to show.</td>
            <td></td>
            <td></td>
          </tr>
         @endif
         </tbody>
       </table>
      <!-- </div> -->
    </div>
  </div>
</section><!--  End Contact Section -->
@endsection