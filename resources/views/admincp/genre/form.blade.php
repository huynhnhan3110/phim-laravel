@extends('layouts.app')
@section('content')
<div class="container page_name" id="genre-page">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               @if(!isset($genre))
               Thêm thể loại
               @else
               Sửa thể loại
               @endif
               <a href="{{route('genre.index')}}"  class="btn btn-sm btn-primary">Xem danh sách</a>
            </div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               @if(isset($genre))
               {!! Form::open(['route' => ['genre.update',$genre->id], 'method'=>'PUT']) !!}
               @else
               {!! Form::open(['route' => 'genre.store', 'method'=>'POST']) !!}
               @endif
               <div class="form-group">
                  {!! Form::label('title', 'Title',[]) !!}
                  {!! Form::text('title',isset($genre) ? $genre->title : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('slug', 'Slug',[]) !!}
                  {!! Form::text('slug',isset($genre) ? $genre->slug : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'convert_slug']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('description', 'Description',[]) !!}
                  {!! Form::textarea('description',isset($genre) ? $genre->description : null, ['style'=>'resize:none','placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'description']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('textColor', 'Tag Color',[]) !!}
                  {!!  Form::select('tagColor', ['label-default' => 'Mặc định', 'label-primary' => 'Tím','label-success'=>'Cam', 'label-info'=>'Xanh nhạt','label-warning'=>'Xanh lá','label-danger'=>'Đỏ'], isset($genre) ? $genre->tagColor : null, ['class'=>'form-control']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('textStatus', 'Status',[]) !!}
                  {!!  Form::select('status', ['1' => 'Hiện', '0' => 'Ẩn'], isset($genre) ? $genre->status : null, ['placeholder' => 'Chọn trạng thái...','class'=>'form-control']) !!}
               </div>
               <center>
                  @if(!isset($genre))
                  {!! Form::submit('Thêm thể loại', ['class' => 'btn btn-primary']) !!}
                  @else
                  {!! Form::submit('Cập nhật thể loại', ['class' => 'btn btn-primary']) !!}
                  @endif
                   <a class="btn btn-secondary" href="{{route('genre.index')}}">Trở về danh sách</a>
               </center>
               {!! Form::close() !!}
            </div>
         </div>
         
      </div>
   </div>
</div>
@endsection