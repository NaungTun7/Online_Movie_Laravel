<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Movie Channel - @yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontendtemplate/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontendtemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontendtemplate/css/small-business.css')}}" rel="stylesheet">
  @yield('style')
</head>

<body class="bg-dark">

  <!-- Navigation -->
  <div class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
      <a class="navbar-brand" href="#" id="moviechannel"><i class="fas fa-video text-light mr-3"></i>Movie Channel</a>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          {{-- <li class="nav-item active">
            <a class="nav-link" href="#">Home --}}
             <!--  <span class="sr-only">(current)</span> -->
           {{--  </a>
          </li> --}}
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('homepage')}}">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('serie')}}">Series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('dcma')}}">DCMA</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-secondary" style="font-size: 10px;">Channel Myanmar © 2020 All rights reserved©2017 All rights reserved Disclaimer: ChannelMyanmar.org is not in anyway associated with Gostream.is, Onlinemovies, Fmovies, Xmovies8, Putlocker sites. We do not host any videos on Channelmyanmar.org itself. Channelmyanmar.org is absolutely legal and contains only links to other third party websites like Youtube, Uptobox, Mediafire, Google, Picasaweb, Dailymotion, Openload, VK.com and many more which actually host videos. Channelmyanmar.org is not responsible for the compliance, copyright, legality, decency, or any other aspect of the content of other linked sites. If you have any legal issues please contact the appropriate media file owners or linked hosting websites. Channelmyanmar.org only and only provides links to third party video hosting sites which videos are uploaded by third party users. Channelmyanmar.org in no way affiliated with them nor intend to do that.
</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontendtemplate/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontendtemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


  @yield('script')

</body>

</html>
