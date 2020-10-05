@extends('backendtemplate')
@section('title','Actors')

@section('content')

<div class="container-fluid">
	<h2 class="text-center mb-5 text-dark" style="font-weight: 700;">Actor Edit Form</h2>
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
	<form method="post" action="{{route('actors.update',$actor->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" value="{{$actor->name}}">
			</div>
		</div>
		

		<center>
		<input type="submit" name="btnsubmit" value="Update" class="btn btn-success w-25 mt-3 mb-3">
		</center>

		</form>
	
</div>

@endsection