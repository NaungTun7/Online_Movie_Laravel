@extends('backendtemplate')
@section('title','Months')

@section('content')


<h4 class="ml-4">Month Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('months.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="month">Month Name:</label>
					<input type="text" name="month" id="month" class="form-control">
					@error('month')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group row">
					<label for="price">Price:</label>
					<input type="text" name="price" id="price" class="form-control">
					@error('price')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group text-right">
					<input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection