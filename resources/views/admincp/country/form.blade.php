@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header">
               @if(!isset($country))
               Thêm quốc gia
               @else
               Sửa quốc gia
               @endif
            </div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               @if(isset($country))
               {!! Form::open(['route' => ['country.update',$country->id], 'method'=>'PUT']) !!}
               @else
               {!! Form::open(['route' => 'country.store', 'method'=>'POST']) !!}
               @endif
               <div class="form-group">
                  {!! Form::label('title', 'Title',[]) !!}
                  {!! Form::text('title',isset($country) ? $country->title : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'slug','onkeyup'=>'ChangeToSlug()']) !!}
               </div>
                <div class="form-group">
                  {!! Form::label('slug', 'Slug',[]) !!}
                  {!! Form::text('slug',isset($country) ? $country->slug : null, ['placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'convert_slug']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('description', 'Description',[]) !!}
                  {!! Form::textarea('description',isset($country) ? $country->description : null, ['style'=>'resize:none','placeholder' => 'Nhập nội dung','class' => 'form-control','id' => 'description']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('textStatus', 'Status',[]) !!}
                  {!!  Form::select('status', ['1' => 'Hiện', '0' => 'Ẩn'], isset($country) ? $country->status : null, ['placeholder' => 'Chọn trạng thái...','class'=>'form-control']) !!}
               </div>
               @if(!isset($country))
               {!! Form::submit('Thêm quốc gia', ['class' => 'btn btn-primary']) !!}
               @else
               {!! Form::submit('Cập nhật quốc gia', ['class' => 'btn btn-primary']) !!}
               @endif
               {!! Form::close() !!}
            </div>
         </div>
         <div class="card">
            <div class="card-header">Danh sách các quốc gia</div>
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
                     @foreach($countries as $key => $coty)
                     <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$coty['title']}}</td>
                        <td>{{$coty['description']}}</td>
                        <td>{{$coty['slug']}}</td>

                        <td>
                           @if($coty['status'])
                           Hiển thị
                           @else
                           Chưa hiển thị
                           @endif
                        </td>
                        <td>
                           {!! Form::open(['route' => ['country.destroy',$coty['id']],'method'=>'DELETE','onsubmit'=> 'return confirm("Chắc chắn muốn xóa chứ ?")']) !!}
                           {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                           <a href="{{route('country.edit',$coty['id'])}}" class="btn btn-secondary">Sửa</a>
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