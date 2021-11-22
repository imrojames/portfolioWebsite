

@if(session('success'))
 <div class="row">
   <div class="col-lg-6"></div>
   <div class="col-lg-6">
     <div class="alert alert-success" align="center">
       {{session('success')}}
     </div>
   </div>
 </div>
@endif
