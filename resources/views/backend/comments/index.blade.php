@extends('backendtemplate')
@section('title','Comments')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">Comment List</h3>
<span><a href="{{route('comments.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>

<div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
      <th scope="col">No</th>
      <th scope="col">FbName</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$comment->id}}">
      <td>{{$comment->id}}</td>
      <td>{{$comment->cmtName}}</td>
      <td>
        <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('comments.destroy',$comment->id)}}" class="d-inline-block" id="delete-comment{{ $comment->id }}">
          @csrf
          @method('delete')
        
       <button type="submit" class="btn  btn-flat btn-outline-danger "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
 <!-- <a href="{{-- {{route('links.create')}} --}}" class="btn btn-success float-right btn-sm">Add New</a> 

@endsection

 



 