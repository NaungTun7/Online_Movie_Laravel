@extends('backendtemplate')
@section('title','Facebooks')

@section('content')

<div class="container-fluid">
  <h2 class="text-center mb-5 text-dark" style="font-weight: 700;">Facebook Edit Form</h2>
<!--   {{-- Must show related input errors --}}
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
  <form method="post" action="{{route('facebooks.update',$facebook->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="form-group row">
      <label for="oldphoto" class="col-sm-2 col-form-label">Photo:</label>
      <div class="col-sm-10">
      <img src="{{asset('backendtemplate/facebookImg/'.$facebook->photo)}}" class="w-25">
    </div>
  </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{$facebook->name}}">
      </div>
    </div>
     <div class="form-group row">
        <label for="Nphot" class="col-sm-2 col-form-label">Photo:</label>
        <div class="col-sm-10">
        <input type="file" name="nextphoto" class="form-control">
      </div>
      </div>
       <div class="form-group row">
      <label for="fb_id" class="col-sm-2 col-form-label">Fb_id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fb_id" name="fb_id" value="{{$facebook->fb_id}}">
      </div>
    </div>
    <center>
    <input type="submit" name="btnsubmit" value="Update" class="btn btn-info w-25 mt-3 mb-3">
    </center>

    </form>
  
</div>

@endsection