@extends('backendtemplate')
@section('title','Serieinfos')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">Serie List</h3>
<span><a href="{{route('serieinfos.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>

<div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
      <th scope="col">No</th>
      <th scope="col">Rating</th>
      <th scope="col">Duration</th>
      <th scope="col">Type</th>
      <th scope="col">Quality</th>
      <th scope="col">Year</th>
      <th scope="col">season no</th>
      <th scope="col">episode no</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($serieinfos as $serieinfo)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$serieinfo->id}}">
      <td>{{$serieinfo->id}}</td>
      <td>{{$serieinfo->rating}}</td>
      <td>{{$serieinfo->duration}}</td>
      <td>{{$serieinfo->type}}</td>
      <td>{{$serieinfo->quality}}</td>
      <td>{{$serieinfo->year}}</td>
      <td>{{$serieinfo->season_no}}</td>
      <td>{{$serieinfo->episode_no}}</td>
      <td>
        <a href="{{route('serieinfos.edit',$serieinfo->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('serieinfos.destroy',$serieinfo->id)}}" class="d-inline-block" id="delete-serieinfo{{ $serieinfo->id }}">
          @csrf
          @method('delete')
        
       <button type="submit" class="btn btn-danger btn-flat btn-sm "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$serieinfos->links()}}
</div>
</div>


@endsection

 



 