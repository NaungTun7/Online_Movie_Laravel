@extends('backendtemplate')
@section('title','Extras')

@section('content')

<h4 class="ml-4 text-center">MovieDetail Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
	<form method="post"  action="{{route('extras.store')}}" enctype="multipart/form-data">
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
				@error('quality')
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
			<label  class="col-sm-2 col-form-label">MovieID:</label>
			
				<div class="col-sm-10">
					<select name="movie" class="form-control">
							@foreach($movies as $movie)
							<option value="{{$movie->id}}">{{$movie->id}}</option>
							@endforeach
					</select>
				</div>
			
		</div>
		<!-- <div class="form-group row">
			<label  class="col-sm-2 col-form-label">SerieID:</label>
			
				<div class="col-sm-10">
					<select name="serie" class="form-control">
							@foreach($series as $serie)
							<option value="{{$serie->id}}">{{$serie->id}}</option>
							@endforeach
					</select>
				</div>
			
		</div> -->
		<!-- <div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file" id="inpoutPhoto" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div> -->
		

		

		<div class="form-group text-right">
					<input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
				</div>

		</form>
	</div>
</div>
</div>


@endsection