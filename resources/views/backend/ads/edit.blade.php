@extends('backendtemplate')
@section('title','Ads')

@section('content')

<div class="container-fluid">
  <h2 class="text-center mb-5 text-dark" style="font-weight: 700;">Ad Edit Form</h2>
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
  <form method="post" action="{{route('ads.update',$ad->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')  


    <div class="form-group row">
      <label for="oldphoto" class="col-sm-2 col-form-label">Photo:</label>
      <div class="col-sm-10">
      <img src="{{asset('backendtemplate/adImg/'.$ad->photo)}}" class="w-25">
    </div>
  </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{$ad->name}}">
      </div>
      </div>

      <div class="form-group row">
      <label for="ph_no" class="col-sm-2 col-form-label">Phone Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ph_no" name="ph_no" value="{{$ad->ph_no}}">
      </div>
      </div>

  
      
      <div class="form-group row">
        <label for="Nphot" class="col-sm-2 col-form-label">Photo:</label>
        <div class="col-sm-10">
        <input type="file" name="nextphoto" class="form-control">
      </div>
      </div>

          <div class="form-group row">
      <label for="position" class="col-sm-2 col-form-label">Position:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="position" name="position" value="{{$ad->position}}">
      </div>
      </div>
    
   <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Month:</label>
      
        <div class="col-sm-10">
          <select name="month" class="form-control">
              @foreach($months as $month)
              <option value="{{$month->id}}">{{$month->month}}</option>
              @endforeach
          </select>
        </div>
    </div>
        <div class="form-group row">
          <label for="price" class="col-sm-2 col-form-label">Price:</label>
          <div class="col-sm-10">
          <select name="price" class="form-control">
              @foreach($months as $month)
              <option value="{{$month->id}}">{{$month->price}}</option>
              @endforeach
          </select>
        </div>
        </div>

    <center>
    <input type="submit" name="btnsubmit" value="Update" class="btn btn-info w-25 mt-3 mb-3">
    </center>

    </form>
  
</div>

@endsection