@extends('frontendtemplate')
@section('title','Home')
@section('style')
<style type="text/css">
  
  .sidebarbtn .btn{
    background: black;
    transition: .5s;
    color: white;
  }
  
</style>
@endsection
@section('content')   

<div class="container my-5 ">
  <div class="row">
      <div class="col-12 col-md-9">
        <div class="row">
          <h3 class="text-light">DCMA Policy</h3>
       <p class="text-secondary">
         ChannelMyanmar in compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.If your copyrighted material has been posted on ChannelMyanmar or if links to your copyrighted material are returned through our search engine and you want this material removed, you must provide a written communication that details the information listed in the following section. Please be aware that you will be liable for damages (including costs and attorneys’ fees) if you misrepresent information listed on our site that is infringing on your copyrights. We suggest that you first contact an attorney for legal assistance on this matter.The following elements must be included in your copyright infringement claim:
Provide evidence of the authorized person to act on behalf of the owner of an exclusive right that is allegedly infringed.
Provide sufficient contact information so that we may contact you. You must also include a valid email address.
You must identify in sufficient detail the copyrighted work claimed to have been infringed and including at least one search term under which the material appears in channelmyanmar.org search results.
A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law.
A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.
Must be signed by the authorized person to act on behalf of the owner of an exclusive right that is allegedly being infringed.
Please allow 1-3 business days for an email response. Note that emailing your complaint to other parties such as our Internet Service Provider will not expedite your request and may result in a delayed response due the complaint not properly being filed.    
       </p>
</div>
  </div>
    <div class="col-12 col-md-3">
      <!-- ads -->
       
        <!-- year -->
        <div id="releaseyear" class="sidebarbtn">  
          <h5 class="text-secondary">Release Year</h5>
          <div class="row ml-0 mr-3 py-2" style="height: 150px; overflow-x: hidden;">
              <!-- this place -->
            @foreach($movies as $movie)
              <div class="col-6 mb-2">
                <button class="btn  py-1 px-3">{{$movie->extra ? $movie->extra->year : 'None'}}</button>
              </div>
            @endforeach
          </div>
        </div>
        <!-- type -->
        <div id="typeofmovie" class="sidebarbtn mt-4">  
          <h5 class="text-secondary">Type of Movies</h5>
          <div class="row ml-0 mr-3 py-2" style="height: 150px; overflow-x: hidden;">
              <!-- this place -->
              @foreach($movies as $movie)
              <div class="col-6 mb-2">
                <button class="btn  py-1 px-3">{{$movie->extra ? $movie->extra->type : 'None'}}</button>
              </div>
            @endforeach
          </div>
        </div>

    </div>
  </div>
</div>
<div class="container p-4 ml-5">
  
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
     
      $('.hoverme').hover(function() {
        // console.log('HELLO')
        // console.log($(this))
        $(this).popover('show')
      }, function(event) {
        $(this).popover('hide')
      })
  })
</script>
@endsection