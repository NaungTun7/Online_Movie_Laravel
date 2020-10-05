@extends('backendtemplate')
@section('title','Movies')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">Movie List</h3>
<span><a href="{{route('movies.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>

<div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
      <th scope="col">No</th>
      <th scope="col">Name</th>
    
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$movie->id}}">
      <td>{{$movie->id}}</td>
      <td>{{$movie->name}}</td>
      <td>
        <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('movies.destroy',$movie->id)}}" class="d-inline-block" id="delete-movie{{ $movie->id }}">
          @csrf
          @method('delete')
        
       <button type="submit" class="btn  btn-flat btn-outline-danger "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$movies->links()}}
</div>
 <!-- <a href="{{route('links.create')}}" class="btn btn-success float-right btn-sm">Add New</a> -->
<!-- Detail Modal -->
<!-- <div class="modal" id="detailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title name"></h4>

      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="" class="img-fluid itemImg">
          </div>
          <div class="col-md-6 content">
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

@endsection

 



 