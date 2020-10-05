@extends('backendtemplate')
@section('title','AssignSerie')

@section('content')

<h4 class="ml-4">AssignSerie Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('assignseries.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group row">
					<label for="actor">Actor Name:</label>
					<select name="actor" class="form-control">
							@foreach($actors as $actor)
							<option value="{{$actor->id}}">{{$actor->name}}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group row">
					<label for="serie">Serie Name:</label>
					<select name="serie" class="form-control">
							@foreach($series as $serie)
							<option value="{{$serie->id}}">{{$serie->name}}</option>
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