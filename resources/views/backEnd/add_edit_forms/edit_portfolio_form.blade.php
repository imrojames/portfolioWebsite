@extends('backEnd/me')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Update Portfolio</h2>
      <ol>
        <li><a href="/1438">Home</a></li>
        <li>Update Portfolio</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    @foreach($portfolios as $portfolio)
    {!!Form::open(['action' => ['PortfoliosController@update', $portfolio->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    <div class="form-group">
      <span>Note: Fields with asterisk(*) are required.</span>
    </div>
    <div class="form-group">
      <label>Portfolio Name <span class="text-danger">*</span></label>
      <input class="form-control" name="portfolioName" value="{{$portfolio->portfolioName}}" placeholder="Name of your portfolio"></input>
      <small class="text-danger">{{$errors->first('portfolioName')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Link <span class="text-danger">*</span></label>
      <input class="form-control" name="link" value="{{$portfolio->link}}" placeholder="eg. https://www.yourportfolio.com"></input>
      <small class="text-danger">{{$errors->first('link')}}</small>
    </div>
    <br>
    <div class="form-group">
      <label>Thumbnail <span class="text-danger">*</span></label>
      <input type="file" class="form-control" name="thumbnail"></input>
      <small class="text-danger">{{$errors->first('thumbnail')}}</small>
    </div>
    <br>
    <div class="form-group" align="center">
      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Experience </button>
      <button type="button" class="btn btn-info btn-frm-close-portfolio">Close</button>
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {!!Form::close()!!}
    @endforeach 
  </div>
</section>
@endsection