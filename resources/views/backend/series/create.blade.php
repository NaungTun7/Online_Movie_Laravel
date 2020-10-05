@extends('backendtemplate')
@section('title','Series')

@section('content')

<h4 class="ml-4">Serie Create Table </h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">

	<form method="post" action="{{route('series.store')}}" enctype="multipart/form-data">
		@csrf
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name">
				@error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file w-50" id="inpoutPhoto" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
	
		<div class="form-group text-right">
					<input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
				</div>
		</form>
	</div>
</div>
</div>



@endsection