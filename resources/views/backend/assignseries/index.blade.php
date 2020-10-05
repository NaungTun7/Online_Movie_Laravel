@extends('backendtemplate')
@section('title','AssignSerie')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">AssignSerie List</h3>
<span><a href="{{route('assignseries.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>

<div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
       <th scope="col">No</th>
      <th scope="col">ActorName</th>
     <th scope="col">SerieName</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($infos as $info)
    <tr>
      <td>{{$info->id}}</td>
      <td>{{$info->actorname}}</td>
      <td>{{$info->seriename}}</td>
      {{-- <input type="hidden" name="" id="deleteser" value="{{$actorassign->id}}"> --}}
      {{-- <td>{{$actor->name}}</td>
      @foreach($movies as $movie)
      <td>{{$movie->name}}</td>
       @endforeach --}}
      <td>
        <a href="{{route('assignseries.edit',$info->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('assignseries.destroy',$info->id)}}" class="d-inline-block" id="delete-info{{ $info->id }}">
          @csrf
          @method('delete')
        
       <button type="submit" class="btn  btn-flat btn-outline-danger "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{-- {{$movies->links()}} --}}
</div>
 

@endsection

 



 