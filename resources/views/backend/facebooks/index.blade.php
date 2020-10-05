@extends('backendtemplate')
@section('title','Facebooks')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">Serie List</h3>
<span><a href="{{route('facebooks.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
    </div>

<div class="table">
      <table class="table table-striped text-center table-bordered px-5">
        <thead class="bg-dark">
          <tr class="text-light" style="font-size: 16px;letter-spacing: 2px;">
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Fb_id</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($facebooks as $facebook)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$facebook->id}}">
      <td>{{$facebook->id}}</td>
      <td>{{$facebook->name}}</td>
       <td>{{$facebook->fb_id}}</td>
      <td>
        <a href="{{route('facebooks.edit',$facebook->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('facebooks.destroy',$facebook->id)}}" class="d-inline-block" id="delete-serie{{ $facebook->id }}">
          @csrf
          @method('delete')
        <button type="submit" class="btn btn-danger btn-flat btn-sm "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
 

@endsection

 



 