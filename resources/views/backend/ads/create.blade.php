@extends('backendtemplate')
@section('title','Ads')

@section('content')

<h4 class="ml-4">Ad Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('ads.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="name">Customer Name:</label>
					<input type="text" name="name" id="name" class="form-control">
					@error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="ph_no">Customer Phone:</label>
					<input type="text" name="ph_no" id="ph_no" class="form-control">
					@error('ph_no')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="photo"> Photo:</label>
					<input type="file" class="w-50" id="photo" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="position">Position:</label>
					<input type="text" name="position" id="position" class="form-control">
					@error('position')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="photo">Month Name:</label>
					<select name="link" class="form-control">
							@foreach($months as $month)
							<option value="{{$month->id}}">{{$month->month}}</option>
							@endforeach
					</select>
				</div>
				<div class="form-group row">
					<label for="price">Price:</label>
					<select name="price" class="form-control">
							@foreach($months as $month)
							<option value="{{$month->id}}">{{$month->price}}</option>
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