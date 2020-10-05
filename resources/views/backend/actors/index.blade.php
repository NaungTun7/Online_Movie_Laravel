@extends('backendtemplate')
@section('title','Actors')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <div class=" p-2" style="position: relative;">
      <h3 class="text-dark d-inline-block">Actors List</h3>
      <span><a href="{{route('actors.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>
    <div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($actors as $actor)
          <tr>
            <input type="hidden" name="" id="deleteser" value="{{$actor->id}}">
            <td>{{$actor->id}}</td>
            <td class="text-info" style="font-size: 18px;">{{$actor->name}}</td>
              <td>
        <a href="{{route('actors.edit',$actor->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('actors.destroy',$actor->id)}}" class="d-inline-block" id="delete-actor{{ $actor->id }}">
          @csrf
          @method('delete')
    
        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
        
        
        </form>  
        
      </td>
          </tr>
           @endforeach
        </tbody>
      </table>
      {{$actors->links()}}
    </div>
</div>

@endsection

 



 