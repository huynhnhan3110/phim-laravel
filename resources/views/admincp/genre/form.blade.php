@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               @if(!isset($genre))
               Thêm thể loại
               @else
               Sửa thể loại
               @endif
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
                  {!! Form::label('textStatus', 'Status',[]) !!}
                  {!!  Form::select('status', ['1' => 'Hiện', '0' => 'Ẩn'], isset($genre) ? $genre->status : null, ['placeholder' => 'Chọn trạng thái...','class'=>'form-control']) !!}
               </div>
               @if(!isset($genre))
               {!! Form::submit('Thêm thể loại', ['class' => 'btn btn-primary']) !!}
               @else
               {!! Form::submit('Cập nhật thể loại', ['class' => 'btn btn-primary']) !!}
               @endif
               {!! Form::close() !!}
            </div>
         </div>
         <div class="card">
            <div class="card-header">Danh sách các thể loại</div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Slug</th>

                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($genres as $key => $gen)
                     <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$gen['title']}}</td>
                        <td>{{$gen['description']}}</td>
                        <td>{{$gen['slug']}}</td>

                        <td>
                           @if($gen['status'])
                           Hiển thị
                           @else
                           Chưa hiển thị
                           @endif
                        </td>
                        <td>
                           {!! Form::open(['route' => ['genre.destroy',$gen['id']],'method'=>'DELETE','onsubmit'=> 'return confirm("Chắc chắn muốn xóa chứ ?")']) !!}
                           {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                           <a href="{{route('genre.edit',$gen['id'])}}" class="btn btn-secondary">Sửa</a>
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