@extends('backendtemplate')
@section('title','Movies')

@section('content')

<h4 class="ml-4">Movie Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('movies.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="name">Movie Name:</label>
					<input type="text" name="name" id="name" class="form-control">
					@error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="photo">Movie Photo:</label>
					<input type="file" class="w-50" id="photo" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="photo">Link Name:</label>
					<select name="link" class="form-control">
							@foreach($links as $link)
							<option value="{{$link->id}}">{{$link->link_text}}</option>
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