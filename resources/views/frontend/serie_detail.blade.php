@extends('frontendtemplate')
@section('style')
<style type="text/css">
	.info p{
		margin-bottom: 4px;
	}
</style>
@endsection
@section('content')
<!-- start ads -->
<div class="container mt-5">
 	<div class="row">
 		 <div class="col-12 col-md-8 offset-md-2">
		     <img src="https://www.thecmpage.com/wp-content/uploads/2020/09/ShweBanner..gif" class="w-100 mb-3">
		  </div>
		  <div class="col-12 col-md-8 offset-md-2">
		     <img src="https://channelmyanmar.org/wp-content/uploads/2020/07/usdp-family.gif" class="w-100 mb-3">
		  </div>
		  <div class="col-12 col-md-8 offset-md-2">
		     <img src="https://channelmyanmar.org/wp-content/uploads/2020/09/syinix-2.jpg" class="w-100 mb-3">  
		   </div>
 	</div>
</div>
<!-- end ads  -->

<div class="container my-5">
	<div class="row">
		
		<div class="col-12 col-md-8 offset-md-2 d-flex">
			<div class="img mr-3">
				<img width="165px" height="250px" src="{{ $serie->img_url }}">
			</div>
			<div class="content">
				<h4 class="text-light">Serie Name</h4>
				<p class="text-light mb-0">{{$serie->name}}<i class="far fa-clock mr-2 border-dark text-light"></i></p>
				<div class="d-flex">
					<div class="mt-2 mr-2 bg-dark text-light p-1" style="border-radius: 5px;">
						<p class="mt-2">Rating</p>
					</div>
					<div class="" style="position: relative;">
						<p class="text-primary mb-0" style="position: absolute; top: 11px;font-size: 20px;">**********</p>
						<p style="position:absolute;width: 100px; top:30px;" class="text-secondary">{{$serie->serieinfo->rating}}</p>
					</div>
				</div>
				@foreach($serie->actors as $actor)
				<p class="text-light"><i class="fas fa-star mr-3 d-inline"></i>
					<a href="/?query=true&type=series&actorid={{$actor->id}}">{{$actor->name}}</a>
				</p>
				@endforeach
			</div>
		</div>
		
		<div class="col-12 col-md-8 offset-md-2 mt-5">
			<img src="https://channelmyanmar.org/wp-content/uploads/2020/06/spree-2.gif">
		</div>
		<div class="col-12 col-md-8 offset-md-2 mt-3" style="color: #1E222B;">
			<h5 class="text-secondary">{{$serie->name}}</h5>
			<p style="color: #636363;">{{$serie->serieinfo->review}}</p>
			<div class="info text-secondary">
				<p>
					<span>File Size:</span>
					<span>890MB</span>
				</p>
				<p>
					<span>Quality:</span>
					<span>{{$serie->serieinfo->quality}}</span>
				</p>
				<p>
					<span>Format:</span>
					<span>mp4</span>
				</p>
				<p>
					<span>Duration:</span>
					<span>{{$serie->serieinfo->duration}}</span>
				</p>
				<p>
					<span>Genre:</span>
					<span class="text-primary">{{$serie->serieinfo->type}}</span>
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
					<span>hla hlal</span>
				</p>
			</div>
		</div>
		<div class="col-12 col-md-6 offset-md-3 mt-3">
			<img src="https://assets.imyanmarads.com/banners0001/diamond_20200822_468x60.gif">
		</div>
		<div class="col-12 col-md-8 offset-md-2 mt-3">
			<img src="https://image.tmdb.org/t/p/w300/xwF7sqHmdkMMzGtTsqr5SxZz7uZ.jpg">
			<img src="https://image.tmdb.org/t/p/w300/q6arFsAnjI1UMAjAjSJZTLAliG7.jpg">	
		</div>
		<div class="col-12 col-md-8 offset-md-2 mt-5">
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
						<a href="{{$serie->serieinfo->link->link_text}}" class="d-block text-secondary"><i class="fab fa-google-drive mr-3 text-info"></i>userdrive.org</a>
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
		<div class="col-12 col-md-8 offset-md-2 mt-5">
			<!-- carousel -->
		</div>
	</div>
</div>
@endsection

