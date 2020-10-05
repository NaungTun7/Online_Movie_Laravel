@extends('backendtemplate')
@section('title','Serieinfos')

@section('content')

<h4 class="ml-4 text-center">Serie Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
	
	<form method="post"  action="{{route('serieinfos.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="rating" class="col-sm-2 col-form-label">Rating:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="rating" name="rating">
				@error('rating')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="duration" class="col-sm-2 col-form-label">Duration:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="duration" name="duration">
				@error('duration')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="review" class="col-sm-2 col-form-label">Review:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="review" name="review">
				@error('review')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="type" class="col-sm-2 col-form-label">Type:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="type" name="type">
				@error('type')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="quality" class="col-sm-2 col-form-label">Quality:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="quality" name="quality">
				@error('type')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
			<div class="form-group row">
			<label for="year" class="col-sm-2 col-form-label">Year:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="year" name="year">
				@error('year')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="season_no" class="col-sm-2 col-form-label">Season No:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="seasonno" name="season_no">
				@error('season_no')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="episode_no" class="col-sm-2 col-form-label">Episode No:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="episodeno" name="episode_no">
				@error('episode_no')
					<span class="text-danger">{{ $message }}</span>
					@enderror
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
			<label  class="col-sm-2 col-form-label">SerieID:</label>
			
				<div class="col-sm-10">
					<select name="serie" class="form-control">
							@foreach($series as $serie)
							<option value="{{$serie->id}}">{{$serie->id}}</option>
							@endforeach
					</select>
				</div>
			
		</div>
		<center>
		<input type="submit" name="btnsubmit" value="Save" class="btn btn-info w-25 mt-3 mb-3">
		</center>
		</form>
	</div>
</div>
</div>
@endsection