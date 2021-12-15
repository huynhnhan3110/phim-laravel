@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               @if(!isset($movie))
               Thêm phim
               @else
               Sửa phim
               @endif
            </div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               @if(isset($movie))
               {!! Form::open(['route' => ['movie.update',$movie->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
               @else
               {!! Form::open(['route' => 'movie.store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
               @endif
               <div class="form-group">
                  {!! Form::label('title', 'Title',[]) !!}
                  {!! Form::text('title',isset($movie) ? $movie->title : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('slug', 'Slug',[]) !!}
                  {!! Form::text('slug',isset($movie) ? $movie->slug : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'convert_slug']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('description', 'Description',[]) !!}
                  {!! Form::textarea('description',isset($movie) ? $movie->description : null, ['style'=>'resize:none','placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'description']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('status', 'Status',[]) !!}
                  {!!  Form::select('status', ['1' => 'Hiện', '0' => 'Ẩn'], isset($movie) ? $movie->status : '', ['class'=>'form-control']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('category', 'Category',[]) !!}
                  
                  {!!  Form::select('category_id', $category,isset($movie) ? $movie->category_id : '', ['class'=>'form-control']) !!}
                  
               </div>
               <div class="form-group">
                  {!! Form::label('genre', 'Genre',[]) !!}
                  
                  {!!  Form::select('genre_id', $genre,isset($movie) ? $movie->genre_id : '', ['class'=>'form-control']) !!}
                  
               </div>
               <div class="form-group">
                  {!! Form::label('country', 'Country',[]) !!}
                  
                  {!!  Form::select('country_id',$country,isset($movie) ? $movie->country_id :'', ['class'=>'form-control']) !!}
                  
               </div>

                <div class="form-group">
                  {!! Form::label('Image', 'Chọn hình ảnh',[]) !!}
                  <br>
                  {!! Form::file('image', ['class'=> 'image_file']) !!}
                  @if(isset($movie))
                     <img width="150px" src="{{asset('uploads/movie/'.$movie['image'])}}">
                  @endif
               </div>
               @if(!isset($movie))
               {!! Form::submit('Thêm phim', ['class' => 'btn btn-primary']) !!}
               @else
               {!! Form::submit('Cập nhật phim', ['class' => 'btn btn-primary']) !!}
               @endif
               {!! Form::close() !!}
            </div>
         </div>
         <div class="card">
            <div class="card-header">Danh sách các phim</div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
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
                        <td>{{$mov['description']}}</td>
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