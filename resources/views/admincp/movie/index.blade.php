@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Danh sách các phim
               <a href="{{route('movie.create')}}"  class="btn btn-sm btn-primary">Thêm phim</a>
            </div>
            <div class="card-body">
               <table class="table" id="datatables_movie">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Category</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Country</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($movies as $key => $mov)
                     <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$mov['title']}}</td>
                        <td><img width="90%" src="{{asset('uploads/movie/'.$mov['image'])}}"></td>
                        <td>{{$mov->slug}}</td>
                        <td>
                          {{$mov->category->title}}
                        </td>
                        <td>{{$mov->genre->title}}</td>
                        <td>{{$mov->country->title}}</td>
                        <td>
                           @if($mov['status'])
                           Active
                           @else
                           Inactive
                           @endif
                        </td>
                        <td>
                           {!! Form::open(['route' => ['movie.destroy',$mov['id']],'method'=>'DELETE','onsubmit'=> 'return confirm("Chắc chắn muốn xóa chứ ?")']) !!}
                           {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                           <a href="{{route('movie.edit',$mov['id'])}}" class="btn btn-secondary">Edit</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>

   </div>
</div>
@endsection