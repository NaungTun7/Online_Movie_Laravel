@extends('frontendtemplate')
@section('title','Serie')
@section('style')
<style type="text/css">
  #showMovie img{
    transition: .5s;
  }
  .sidebarbtn .btn{
    background: black;
    transition: .5s;
    color: white;
  }
  .sidebarbtn .btn:hover{
    background: #fee715ff;
    color:black;
  }
  .hoverme .dropdown-menu{
    background: black;
  }

</style>
@endsection
@section('content')   
<!-- start ads -->
<div class="container mt-5">
  <div>
     <img src="https://www.thecmpage.com/wp-content/uploads/2020/09/ShweBanner..gif" class="w-100 mb-3">
  </div>
  <div>
     <img src="https://channelmyanmar.org/wp-content/uploads/2020/07/usdp-family.gif" class="w-100 mb-3">
  </div>
  <div>
     <img src="https://channelmyanmar.org/wp-content/uploads/2020/09/syinix-2.jpg" class="w-100 mb-3">  
   </div>
</div>
<!-- end ads  -->
<div class="container my-5 " id="showMovie">
  
  <div class="row">
      <div class="col-12 col-md-9">
        <div class="row" id="allserie">
        @foreach($series as $serie)
        <div class="col-3 col-md-3" data-id="{{$serie->id}}" style="position: relative;">
          <div class="btn-group dropright">
              <div  class="btn hoverme p-0" data-title='{{$serie->name}}' data-content='{{$serie->serieinfo->review}}' data-toggle="popover" onclick="location.href='{{route("serie_detail", ["id" => $serie->id])}}'">
              <img src="{{asset('backendtemplate/serieImg/'.$serie->photo)}}" class="img-fluid m-0 show">
              <div class="content">
                <h6 class="text-left mt-2 text-secondary mb-0">{{$serie->name}}</h6>
                <p class="text-left text-secondary">{{$serie->serieinfo ? $serie->serieinfo->year : 'None'}}</p>
                  <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                  <span >{{$serie->serieinfo ? $serie->serieinfo->rating : 'None'}}</span>
                 </div>
              </div>
            </div>
              <div class="dropdown-menu">
                  <h6 class="text-left">{{$serie->name}}</h6>
                  <div >
                    <p class="text-light">{{$serie->serieinfo ? $serie->serieinfo->review : 'None'}}</p>
                   {{--  <p>hello</p> --}}
                  </div>
              </div>
              {{-- <div class="popup bg-info">
                  <h4>hello</h4>
              </div> --}}
            </div>
        </div>
        @endforeach
            
</div>
 {{-- yeargroup --}}

        @foreach($yeargroup as $check)
        <div class="row" id="{{$check->year}}" style="display: none;">
        @foreach($series as $serie)
         @if($serie->serieinfo->year==$check->year)
            <div class="col-3 col-md-3"  style="position: relative;">
            <div class="btn-group dropright">
             <div  class="btn hoverme p-0" data-title='{{$serie->name}}' data-content='{{$serie->serieinfo->review}}' data-toggle="popover" onclick="location.href='{{route("movie_detail", ["id" => $serie->id])}}'">
                <img src="{{asset('backendtemplate/serieImg/'.$serie->photo)}}" class="img-fluid m-0 show">
                <div class="content">
                  <h6 class="text-left mt-2 text-secondary mb-0">{{$serie->name}}</h6>
                  <p class="text-left text-secondary">{{$serie->serieinfo ? $serie->serieinfo->year : 'None'}}</p>
                    <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                    <span >{{$serie->serieinfo ? $serie->serieinfo->rating : 'None'}}</span>
                   </div>
                </div>
              </div>
                <div class="dropdown-menu">
                    <h6 class="text-left">{{$serie->name}}</h6>
                    <div >
                      <p class="text-light">{{$serie->serieinfo ? $serie->serieinfo->review : 'None'}}</p>
                      
                    </div>
                </div>
              </div>
          </div>
        @endif
        @endforeach
      </div>
       @endforeach
 {{-- end --}}
{{-- typegroup --}}
        @foreach($typegroup as $check)
        <div class="row" id="{{$check->type}}" style="display: none;">
        @foreach($series as $serie)
         @if($serie->serieinfo->type==$check->type)
            <div class="col-3 col-md-3"  style="position: relative;">
            <div class="btn-group dropright">
             <div  class="btn hoverme p-0" data-title='{{$serie->name}}' data-content='{{($serie->serieinfo->review)}}' data-toggle="popover" onclick="location.href='{{route("serie_detail", ["id" => $serie->id])}}'">
                <img src="{{asset('backendtemplate/serieImg/'.$serie->photo)}}" class="img-fluid m-0 show">
                <div class="content">
                  <h6 class="text-left mt-2 text-secondary mb-0">{{$serie->name}}</h6>
                  <p class="text-left text-secondary">{{$serie->serieinfo ? $serie->serieinfo->year : 'None'}}</p>
                    <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                    <span >{{$serie->serieinfo ? $serie->serieinfo->rating : 'None'}}</span>
                   </div>
                </div>
              </div>
                <div class="dropdown-menu">
                    <h6 class="text-left">{{$serie->name}}</h6>
                    <div >
                      <p class="text-light">{{$serie->serieinfo ? $serie->serieinfo->review : 'None'}}</p>
                      {{-- <p>hello</p> --}}
                    </div>
                </div>
              </div>
          </div>
        @endif
        @endforeach
      </div>
       @endforeach

{{-- end --}}
  </div>
    <div class="col-12 col-md-3">
      <!-- ads -->
        <div class="p-0 mb-5">
            <img src="https://channelmyanmar.org/wp-content/uploads/2020/07/mmbus_ads_4.png" class="w-100 h-100">          
        </div>
        <!-- year -->
         <div id="releaseyear" class="sidebarbtn">  
          <h5 class="text-secondary">Release Year</h5>
          <div class="row ml-0 mr-3 py-2" style="height: 150px; overflow-x: hidden;">
              <!-- this place -->
            @foreach($yeargroup as $serie)
              <div class="col-6 mb-2">
                <button class="btn  py-1 px-3 year" data-id="{{$serie->year}}">{{$serie->year}}</button>
              </div>
            @endforeach
          </div>
        </div>
        <!-- type -->
        <div id="typeofserie" class="sidebarbtn mt-4">  
          <h5 class="text-secondary">Type of Series</h5>
          <div class="row ml-0 mr-3 py-2" style="height: 150px; overflow-x: hidden;">
              <!-- this place -->
              @foreach($typegroup as $serie)
              <div class="col-6 mb-2">
                {{-- <button class="btn  py-1 px-3">{{$movie->extra ? $movie->extra->type : 'None'}}</button> --}}
                <button class="btn  py-1 px-3 type" data-id="{{$serie->type}}">{{$serie->type}}</button>
              </div>
            @endforeach
          </div>
        </div>

    </div>
  </div>
</div>
<div class="container p-4 ml-5">
  <div>
     <img src="https://channelmyanmar.org/wp-content/uploads/2020/08/sexy_gaming.gif" class="w-100">
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    var showlist;
         var data;
      var moveLeft = 20;
      var moveDown = 10;
      $('.hoverme').hover(function() {
        // console.log('HELLO')
        // console.log($(this))
       $(this).popover({
          template: `
            <div class="card popover bg-secondary text-light" style="width: 18rem;">
              <div class="arrow"></div>
              <div class="card-body">
                <h5 class="card-title popover-header bg-secondary">Card title</h5>
                <p class="card-text popover-body text-light">
                </p>
                <div class="" style="position: relative;">
            <p style="position:absolute;width: 100px; top:30px;" class="text-secondary"></p>
          </div>
              </div>
            </div>
          `
        }).popover('show')
      }, function(event) {

        $(this).popover('hide')
      })
      $('.year').click(function () {
        id =$(this).data('id');
        // alert(id); 
        if(showlist){
          $('#'+showlist).hide();
        }  
        $('#'+id).show();
        $('#allserie').hide(); 
        // $('.pagi').hide(); 
        showlist = id;    
      })
        $('.type').click(function () {
        id =$(this).data('id');
        // alert(id); 
        if(showlist){
          $('#'+showlist).hide();
        }  
        $('#'+id).show();
        $('#allserie').hide(); 
        /*$('.pagi').hide();  */
        showlist = id; 

      })
         $('#moviechannel').click(function () {
        // body...
        $('#'+showlist).hide();
        $('#allserie').show();
       /* $('.pagi').show(); */
      })
  })
</script>
@endsection