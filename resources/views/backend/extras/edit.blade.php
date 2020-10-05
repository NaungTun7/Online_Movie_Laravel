@extends('backendtemplate')
@section('title','Extras')

@section('content')

<div class="container-fluid">
  <h2 class="text-center mb-5 text-dark" style="font-weight: 700;">MovieDetail Edit Form</h2>
  {{-- Must show related input errors --}}
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method="post" action="{{route('extras.update',$extra->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-group row">
      <label for="rating" class="col-sm-2 col-form-label">Rating:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rating" name="rating" value="{{$extra->rating}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="duration" class="col-sm-2 col-form-label">Duration:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="duration" name="duration" value="{{$extra->duration}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="review" class="col-sm-2 col-form-label">Review:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="review" name="review" value="{{$extra->review}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="type" class="col-sm-2 col-form-label">Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="type" name="type" value="{{$extra->type}}">
      </div>
    </div>
     <div class="form-group row">
      <label for="quality" class="col-sm-2 col-form-label">Quality:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="quality" name="quality" value="{{$extra->quality}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="year" class="col-sm-2 col-form-label">Year:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="year" name="year" value="{{$extra->year}}">
      </div>
    </div>
      <div class="form-group row">
      <label for="movie" class="col-sm-2 col-form-label">MovieID:</label>
      
        <div class="col-sm-10">
          <select name="movie" class="form-control">
            <optgroup label="Choose ID">
              @foreach($movies as $movie)
              <option value="{{$movie->id}}" @if($movie->id==$extra->movie_id){{'selected'}}@endif>{{$movie->id}}</option>
              @endforeach
            </optgroup>
          </select>
        </div>
    </div>
    <!-- <div class="form-group row">
      <label for="serie" class="col-sm-2 col-form-label">SerieID:</label>
      
        <div class="col-sm-10">
          <select name="serie" class="form-control">
            <optgroup label="Choose ID">
              @foreach($series as $serie)
              <option value="{{$serie->id}}" @if($serie->id==$extra->serie_id){{'selected'}}@endif>{{$serie->id}}</option>
              @endforeach
            </optgroup>
          </select>
        </div>
      
    </div> -->
    
    <center>
    <input type="submit" name="btnsubmit" value="Update" class="btn btn-info w-25 mt-3 mb-3">
    </center>

    </form>
  
</div>

@endsection