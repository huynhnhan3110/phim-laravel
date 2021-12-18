@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               @if(!isset($movie))
               Thêm phim
               @else
               Sửa phim
               @endif
               <a href="{{route('movie.index')}}"  class="btn btn-sm btn-primary">Xem danh sách</a>
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
               <center>
                  @if(!isset($movie))
                  {!! Form::submit('Thêm phim', ['class' => 'btn btn-primary']) !!}
                  @else
                  {!! Form::submit('Cập nhật phim', ['class' => 'btn btn-primary']) !!}
                  @endif
                   <a class="btn btn-secondary" href="{{route('movie.index')}}">Trở về danh sách</a>
               </center>
               {!! Form::close() !!}
            </div>
         </div>
      </div>

   </div>
</div>
@endsection