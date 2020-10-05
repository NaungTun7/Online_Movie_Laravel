@extends('frontendtemplate')
@section('style')
<style type="text/css">
	.info p{
		margin-bottom: 4px;
	}
.widget .panel-body { padding:0px; }
.widget .list-group { margin-bottom: 0; }
.widget .panel-title { display:inline }
.widget .label-info { float: right; }
.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
.widget .mic-info { color: #666666;font-size: 11px; }
.widget .action { margin-top:5px; }
.widget .comment-text { font-size: 12px; }
.widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>
@endsection
@section('content')
<!-- start ads -->
<div class="container mt-5">
 	<div class="row">
 		 <div class="col-12 ">
		     <img src="https://www.thecmpage.com/wp-content/uploads/2020/09/ShweBanner..gif" class="w-100 mb-3">
		  </div>
		  <div class="col-12">
		     <img src="https://channelmyanmar.org/wp-content/uploads/2020/07/usdp-family.gif" class="w-100 mb-3">
		  </div>
		  <div class="col-12">
		     <img src="https://channelmyanmar.org/wp-content/uploads/2020/09/syinix-2.jpg" class="w-100 mb-3">  
		   </div>
 	</div>
</div>
<!-- end ads  -->

<div class="container my-5">
	<div class="row">
		
		<div class="col-12  d-flex">
			<div class="img mr-3">
				<img width="165px" height="250px" src="{{ $movie->img_url }}">
			</div>
			<div class="content">
				<h4 class="text-light">Movie Name</h4>
				<p class="text-light mb-0">{{$movie->name}}<i class="far fa-clock mr-2 border-dark text-light"></i></p>
				<div class="d-flex">
					<div class="mt-2 mr-2 bg-dark text-light p-1" style="border-radius: 5px;">
						<p class="mt-2">Rating</p>
					</div>
					<div class="" style="position: relative;">
						<p class="text-primary mb-0" style="position: absolute; top: 11px;font-size: 20px;">**********</p>
						<p style="position:absolute;width: 100px; top:30px;" class="text-secondary">{{$movie->extra->rating}}</p>
					</div>
				</div>
				{{-- <p class="text-light"><i class="fas fa-bullhorn text-light mr-3"></i>kanwal Seithu</p> --}}
				@foreach($movie->actors as $actor)
				<p class="text-light"><i class="fas fa-star mr-3 d-inline"></i>
					<a href="/?query=true&type=movie&actorid={{$actor->id}}">{{$actor->name}}</a>
				</p>
				@endforeach
			</div>
		</div>
		
		<div class="col-12  mt-5">
			<img src="https://channelmyanmar.org/wp-content/uploads/2020/06/spree-2.gif">
		</div>
		<div class="col-12  mt-3" style="color: #1E222B;">
			<h5 class="text-secondary">{{$movie->name}}</h5>
			<p style="color: #636363;">{{$movie->extra->review}}</p>
			<div class="info text-secondary">
				<p>
					<span>File Size:</span>
					<span>890MB</span>
				</p>
				<p>
					<span>Quality:</span>
					<span>WEB-DL 720P</span>
				</p>
				<p>
					<span>Format:</span>
					<span>{{$movie->extra->quality}}</span>
				</p>
				<p>
					<span>Duration:</span>
					<span>01:17:00</span>
				</p>
				<p>
					<span>Genre:</span>
					<span class="text-primary"><a href="#">{{$movie->extra->type}}</a></span>
					
				</p>
				<p>
					<span>Subtitle:</span>
					<span>Myamar Subtitle(Hard sub)</span>
				</p>
				<p>
					<span>Translated By</span>
					<span>Naung Htun</span>
				</p>
				<p>
					<span>Encoted By</span>
					<span>hla hla</span>
				</p>
			</div>
		</div>
		<div class="col-12 mt-3">
			<img src="https://assets.imyanmarads.com/banners0001/diamond_20200822_468x60.gif">
		</div>
		<div class="col-12  mt-3">
			<img src="https://image.tmdb.org/t/p/w300/xwF7sqHmdkMMzGtTsqr5SxZz7uZ.jpg">
			<img src="https://image.tmdb.org/t/p/w300/q6arFsAnjI1UMAjAjSJZTLAliG7.jpg">	
		</div>
		<div class="col-12  mt-5">
			<table class="table table-borderless">
				<tr class=" text-light" style="background: black;">
					<th>Download<i class="fas fa-sort-up ml-2" style="transform: rotate(180deg);"></i></th>
					<th>Server<i class="fas fa-sort-up ml-2" style="transform: rotate(180deg);"></i></th>
					<th>Size<i class="fas fa-sort-up ml-2" style="transform: rotate(180deg);"></i></th>
					<th>Quality<i class="fas fa-sort-up ml-2" style="transform: rotate(180deg);"></i></th>
				</tr>
				<!-- looping -->

				<tr class="text-secondary">
					<td><i class="fas fa-download mr-3 text-primary"></i>Option 1</td>
					<td>
						<a href="{{$movie->link->link_text}}" class="d-block text-secondary" target="_blank"><i class="fab fa-google-drive mr-3 text-info"></i>userdrive.org</a>
					</td>
					<td>
						850MB
					</td>
					<td>
						WEB-DL 720P
					</td>
				</tr>
			</table>
		</div>
		{{-- comment --}}
		<div class="col-12  mt-5">
			@if(request()->session()->has('facebook_user'))
				<h2 class="text-light">Leave Us a comment</h2>
				<form action="{{route('comments.store')}}" method="post">
					@csrf
					<input type="hidden" name="movie" value="{{$movie->id}}">
					<input type="hidden" name="facebook" value="{{json_decode(session('facebook_user'))->id}}"> 
					<label class="text-secondary">Name:</label>
					<input type="text" name="" value="{{json_decode(session('facebook_user'))->name}}" class="d-block" readonly>
					<label class="d-block text-secondary bg-faded">Message:<br>
					<textarea cols="45" rows="5" name="cmtName"></textarea>
					</label>
					<input class="btn btn-info" type="submit" name="post" value="post">
					<a href="/destroysession" class="btn btn-info">Log out</a>
				</form>
			<div class="col-5">
				@foreach($comments as $comment)
					@if($movie->id === $comment->movie_id)
						<div class="row">
							<div class="col-3"><img src="{{asset($comment->facebook->photo)}}" width="100" height="100"></div>
							<div class="col-9">
								<label class="text-white">{{$comment->facebook->name}}</label><br/>
								<input type="text" name="" value="{{$comment->cmtName}}"></div>
						</div>
					@endif
				@endforeach
			</div>
			@else
				<a href="{{route('loginFb')}}?rdr={{url()->current()}}" class="btn btn-info">Click Here To Login To Facebook</a>
			@endif
		</div>
		{{-- end --}}
		<div class="col-12 col-md-8 offset-md-2 mt-5">
			<!-- carousel -->
		</div>
	</div>
</div>
@endsection



