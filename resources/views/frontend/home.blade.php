@extends('frontendtemplate')
@section('title','Home')
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
  #myUL {
    list-style: none;
  }

  #myUL li a{
    display: block;
    text-decoration: none;
    color: white;
    line-height: 30px;
    margin-top: 10px;
    /*border-bottom: 1px solid gray;*/
  }

</style>
@endsection
@section('content')   
<!-- start ads -->
<div class="container mt-5">
  <div class="searchbar my-4">
      <div class=" d-flex" style="position: relative;">
      <!-- Search form -->
      <input class="form-control bg-dark text-light py-4 pl-5" type="text" placeholder="Search Movies  " aria-label="Search" id="myInput" onkeyup="myFunction()">
      <i class="fas fa-search text-light" style="font-size: 30px;position: absolute;right: 15px;top: 10px;"></i>
    </div>
      {{-- content --}}
    <div class="mname bg-dark" style="position: absolute; width: 79%; border: 1px solid gray;">
        <ul id="myUL">
          @foreach($movies as $movie)
          <li ><a href="{{route("movie_detail", ["id" => $movie->id])}}">{{$movie->name}}</a></li>
          @endforeach
        </ul>
    </div>

      {{-- end content --}}
  </div>

  @foreach($ad as $ads)
    @if($ads->position=='top')
      <div>
        {{-- <h3>hello</h3> --}}
       <img src="{{asset('backendtemplate/adImg/'.$ads->photo)}}" class="w-100 mb-3">
    </div>
    @endif
  @endforeach
  </div>
<!-- end ads  -->
<div class="container my-5 " id="showMovie">
  
  <div class="row">
      <div class="col-12 col-md-9">
        <div class="row" id="allmovie">
        @foreach($movies as $movie)
        <div class="col-3 col-md-3" data-id="{{$movie->id}}" style="position: relative;">
          <div class="btn-group dropright">
           <div  class="btn hoverme p-0" data-title='{{$movie->name}}' data-content='{{$movie->extra->review}}' data-toggle="popover" onclick="location.href='{{route("movie_detail", ["id" => $movie->id])}}'">
              <img src="{{asset('backendtemplate/movieImg/'.$movie->photo)}}" class="img-fluid m-0 show">
              <div class="content">
                <h6 class="text-left mt-2 text-secondary mb-0">{{$movie->name}}</h6>
                <p class="text-left text-secondary">{{$movie->extra ? $movie->extra->year : 'None'}}</p>
                  <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                  <span >{{$movie->extra ? $movie->extra->rating : 'None'}}</span>
                 </div>
              </div>
            </div>
  
            </div>
        </div>
        @endforeach
        </div>
        {{-- year 1990 --}}
        @foreach($yeargroup as $check)
        <div class="row" id="{{$check->year}}" style="display: none;">
        @foreach($movies as $movie)
         @if($movie->extra->year==$check->year)
            <div class="col-3 col-md-3"  style="position: relative;">
            <div class="btn-group dropright">
             <div  class="btn hoverme p-0" data-title='{{$movie->name}}' data-content='{{$movie->extra->review}}' data-toggle="popover" onclick="location.href='{{route("movie_detail", ["id" => $movie->id])}}'">
                <img src="{{asset('backendtemplate/movieImg/'.$movie->photo)}}" class="img-fluid m-0 show">
                <div class="content">
                  <h6 class="text-left mt-2 text-secondary mb-0">{{$movie->name}}</h6>
                  <p class="text-left text-secondary">{{$movie->extra ? $movie->extra->year : 'None'}}</p>
                    <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                    <span >{{$movie->extra ? $movie->extra->rating : 'None'}}</span>
                   </div>
                </div>
              </div>
                <div class="dropdown-menu">
                    <h6 class="text-left">{{$movie->name}}</h6>
                    <div >
                      <p class="text-light">{{$movie->extra ? $movie->extra->review : 'None'}}</p>
                      
                    </div>
                </div>
              </div>
          </div>
        @endif
        @endforeach
      </div>
       @endforeach
         {{-- end --}}

         {{-- type --}}
          @foreach($typegroup as $check)
        <div class="row" id="{{$check->type}}" style="display: none;">
        @foreach($movies as $movie)
         @if($movie->extra->type==$check->type)
            <div class="col-3 col-md-3"  style="position: relative;">
            <div class="btn-group dropright">
             <div  class="btn hoverme p-0" data-title='{{$movie->name}}' data-content='{{($movie->extra->review)}}' data-toggle="popover" onclick="location.href='{{route("movie_detail", ["id" => $movie->id])}}'">
                <img src="{{asset('backendtemplate/movieImg/'.$movie->photo)}}" class="img-fluid m-0 show">
                <div class="content">
                  <h6 class="text-left mt-2 text-secondary mb-0">{{$movie->name}}</h6>
                  <p class="text-left text-secondary">{{$movie->extra ? $movie->extra->year : 'None'}}</p>
                    <div style="color:gold;position: absolute;right: 4px;bottom: 69px;" class="bg-secondary px-2 rounded">
                    <span >{{$movie->extra ? $movie->extra->rating : 'None'}}</span>
                   </div>
                </div>
              </div>
                <div class="dropdown-menu">
                    <h6 class="text-left">{{$movie->name}}</h6>
                    <div >
                      <p class="text-light">{{$movie->extra ? $movie->extra->review : 'None'}}</p>
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
{{-- 
        <nav aria-label="Page navigation example">
          <ul class="pagination mt-3 bg-dark" style="margin-left: 200px;">
            <li class="page-item"><a class="page-link bg-dark text-light" href="#">1</a></li>
            <li class="page-item"><a class="page-link bg-dark text-light" href="#">2</a></li>
            <li class="page-item"><a class="page-link bg-dark text-light" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link bg-dark text-light" href="#">Next</a>
            </li>
          </ul>
        </nav> --}}  
          <div class="container text-secondary pagi">
          {{ $movies->links() }}
          </div>
{{-- THIS IS BUTTON --}}
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
            @foreach($yeargroup as $movie)
              <div class="col-6 mb-2">
                <button class="btn  py-1 px-3 year" data-id="{{$movie->year}}">{{$movie->year}}</button>
              </div>
            @endforeach
          </div>
        </div>
        <!-- type -->
        <div id="typeofmovie" class="sidebarbtn mt-4">  
          <h5 class="text-secondary">Type of Movies</h5>
          <div class="row ml-0 mr-3 py-2" style="height: 150px; overflow-x: hidden;">
              <!-- this place -->
              @foreach($typegroup as $movie)
              <div class="col-6 mb-2">
                {{-- <button class="btn  py-1 px-3">{{$movie->extra ? $movie->extra->type : 'None'}}</button> --}}
                <button class="btn  py-1 px-3 type" data-id="{{$movie->type}}">{{$movie->type}}</button>
              </div>
            @endforeach
          </div>
        </div>

    </div>
  </div>
</div>
<div class="container p-4 ">

    @foreach($ad as $ads)
    @if($ads->position=='bottom')
      <div>
        {{-- <h3>hello</h3> --}}
       <img src="{{asset('backendtemplate/adImg/'.$ads->photo)}}" class="w-100 mb-3">
    </div>
    @endif
  @endforeach
 
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
      var showlist;
      var data;
      $('#myUL').hide();
      $('#myInput').keyup(function(){
        $('#myUL').show();
         if(!$(this).val()){
          $('#myUL').hide();
         }
      });
      
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
      // $('#f1990').hide();
      $('.year').click(function () {
        id =$(this).data('id');
        // alert(id); 
        if(showlist){
          $('#'+showlist).hide();
        }  
        $('#'+id).show();
        $('#allmovie').hide(); 
        $('.pagi').hide(); 
        showlist = id;    
      })
        $('.type').click(function () {
        id =$(this).data('id');
        // alert(id); 
        if(showlist){
          $('#'+showlist).hide();
        }  
        $('#'+id).show();
        $('#allmovie').hide(); 
        $('.pagi').hide();  
        showlist = id; 

      })
      $('#moviechannel').click(function () {
        // body...
        $('#'+showlist).hide();
        $('#allmovie').show();
        $('.pagi').show(); 
      })
  });
  function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

@endsection