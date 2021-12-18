@extends('layouts.app')
@section('content')
<div class="container page_name" id="category-page">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Danh sách các danh mục
            <a href="{{route('category.create')}}"  class="btn btn-sm btn-primary">Thêm danh mục</a></div>
            <div class="card-body">
               <table class="table" id="datatables_category">
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