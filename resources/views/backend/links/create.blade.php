@extends('backendtemplate')
@section('title','Links')

@section('content')


<h4 class="ml-4">Link Create Table</h4>
<div class="container my-5">
		<div class="row">
		<div class="col-12 col-md-8 offset-md-2">
			<form action="{{route('links.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="links">Link Name:</label>
					<input type="text" name="link_text" id="links" class="form-control">
					@error('links')
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