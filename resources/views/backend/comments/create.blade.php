@extends('backendtemplate')
@section('title','Comments')

@section('content')

<h4 class="ml-4">Comment Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="cmtName">Comment :</label>
					<input type="text" name="cmtName" id="cmtName" class="form-control">
					@error('cmtName')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				
				<div class="form-group row">
					<label for="name">Facebook Name:</label>
					<select name="facebook" class="form-control">
							@foreach($facebooks as $facebook)
							<option value="{{$facebook->id}}">{{$facebook->name}}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group row">
					<label for="name">Movie Name:</label>
					<select name="movie" class="form-control">
							@foreach($movies as $movie)
							<option value="{{$movie->id}}">{{$movie->name}}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group text-right">
					<input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection