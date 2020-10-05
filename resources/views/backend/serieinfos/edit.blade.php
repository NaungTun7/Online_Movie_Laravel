@extends('backendtemplate')
@section('title','Serieinfos')

@section('content')

<div class="container-fluid">
  <h2 class="text-center mb-5 text-dark" style="font-weight: 700;">Serieinfo Edit Form</h2>
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
  <form method="post" action="{{route('serieinfos.update',$serieinfo->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label for="rating" class="col-sm-2 col-form-label">Rating:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rating" name="rating" value="{{$serieinfo->rating}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="duration" class="col-sm-2 col-form-label">Duration:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="duration" name="duration" value="{{$serieinfo->duration}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="review" class="col-sm-2 col-form-label">Review:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="review" name="review" value="{{$serieinfo->review}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="type" class="col-sm-2 col-form-label">Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="type" name="type" value="{{$serieinfo->type}}">
      </div>
    </div>
     <div class="form-group row">
      <label for="quality" class="col-sm-2 col-form-label">Quality:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="quality" name="quality" value="{{$serieinfo->quality}}">
      </div>
    </div>
     <div class="form-group row">
      <label for="year" class="col-sm-2 col-form-label">Year:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="year" name="year" value="{{$serieinfo->year}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="seasonno" class="col-sm-2 col-form-label">season_no:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="seasonno" name="season_no" value="{{$serieinfo->season_no}}">
      </div>
    </div>
       <div class="form-group row">
      <label for="episodeno" class="col-sm-2 col-form-label">episode_no:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="episodeno" name="episode_no" value="{{$serieinfo->episode_no}}">
      </div>
    </div>
      <div class="form-group row">
      <label  class="col-sm-2 col-form-label">LinkID:</label>
      
        <div class="col-sm-10">
          <select name="link" class="form-control">
              @foreach($links as $link)
              <option value="{{$link->id}}">{{$link->link_text}}</option>
              @endforeach
          </select>
        </div>
      
    </div>
    <div class="form-group row">
      <label for="serie" class="col-sm-2 col-form-label">SerieID:</label>
      
        <div class="col-sm-10">
          <select name="serie" class="form-control">
            <optgroup label="Choose ID">
              @foreach($series as $serie)
              <option value="{{$serie->id}}" @if($serie->id==$serieinfo->serie_id){{'selected'}}@endif>{{$serie->id}}</option>
              @endforeach
            </optgroup>
          </select>
        </div>
      
    </div>
    
    <center>
    <input type="submit" name="btnsubmit" value="Update" class="btn btn-info w-25 mt-3 mb-3">
    </center>

    </form>
  
</div>

@endsection