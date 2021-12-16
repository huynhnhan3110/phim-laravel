@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header">
               @if(!isset($category))
               Thêm danh mục
               @else
               Sửa danh mục
               @endif
            </div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               @if(isset($category))
               {!! Form::open(['route' => ['category.update',$category->id], 'method'=>'PUT']) !!}
               @else
               {!! Form::open(['route' => 'category.store', 'method'=>'POST']) !!}
               @endif
               <div class="form-group">
                  {!! Form::label('title', 'Title',[]) !!}
                  {!! Form::text('title',isset($category) ? $category->title : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('slug', 'Slug',[]) !!}
                  {!! Form::text('slug',isset($category) ? $category->slug : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'convert_slug']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('description', 'Description',[]) !!}
                  {!! Form::textarea('description',isset($category) ? $category->description : null, ['style'=>'resize:none','placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'description']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('textStatus', 'Status',[]) !!}
                  {!!  Form::select('status', ['1' => 'Hiện', '0' => 'Ẩn'], isset($category) ? $category->status : null, ['placeholder' => 'Chọn trạng thái...','class'=>'form-control']) !!}
               </div>
               @if(!isset($category))
               {!! Form::submit('Thêm danh mục', ['class' => 'btn btn-primary']) !!}
               @else
               {!! Form::submit('Cập nhật danh mục', ['class' => 'btn btn-primary']) !!}
               @endif
               {!! Form::close() !!}
            </div>
         </div>
         <div class="card">
            <div class="card-header">Danh sách các danh mục</div>
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
                  <tbody id='sortable'>
                     @foreach($categories as $key => $cate)
                     <tr id='{{$cate->id}}'>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$cate['title']}}</td>
                        <td>{{$cate['description']}}</td>
                        <td>{{$cate['slug']}}</td>

                        <td>
                           @if($cate['status'])
                           Hiển thị
                           @else
                           Chưa hiển thị
                           @endif
                        </td>
                        <td>
                           {!! Form::open(['route' => ['category.destroy',$cate['id']],'method'=>'DELETE','onsubmit'=> 'return confirm("Chắc chắn muốn xóa chứ ?")']) !!}
                           {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                           <a href="{{route('category.edit',$cate['id'])}}" class="btn btn-secondary">Sửa</a>
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