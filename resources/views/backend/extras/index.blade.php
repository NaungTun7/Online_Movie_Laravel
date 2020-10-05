@extends('backendtemplate')
@section('title','Extras')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  <div class=" p-2" style="position: relative;">
<h3 class="text-dark d-inline-block">Movie List</h3>
<span><a href="{{route('extras.create')}}" class="btn btn-info" style="position: absolute; right: 10px;">Create</a></span>
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
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($extras as $extra)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$extra->id}}">
      <td>{{$extra->id}}</td>
      <td>{{$extra->rating}}</td>
      <td>{{$extra->duration}}</td>
      <td>{{$extra->type}}</td>
      <td>{{$extra->quality}}</td>
      <td>{{$extra->year}}</td>
      <td>
        <a href="{{route('extras.edit',$extra->id)}}" class="btn btn-outline-info "><i class="fas fa-pencil-alt"></i></a>
       <form method="post" action="{{route('extras.destroy',$extra->id)}}" class="d-inline-block" id="delete-extra{{ $extra->id }}">
          @csrf
          @method('delete')
        
       <button type="submit" class="btn btn-danger btn-flat btn-sm "><i class="fas fa-trash"></i></button>
        
        </form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$extras->links()}}
</div>
</div>

@endsection

 



 