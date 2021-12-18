@extends('layouts.app')
@section('content')
<div class="container page_name" id="country-page">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               @if(!isset($country))
               Thêm quốc gia
               @else
               Sửa quốc gia
               @endif
               <a href="{{route('country.index')}}"  class="btn btn-sm btn-primary">Xem danh sách</a>
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
               <center>
                  @if(!isset($country))
                  {!! Form::submit('Thêm quốc gia', ['class' => 'btn btn-primary']) !!}
                  @else
                  {!! Form::submit('Cập nhật quốc gia', ['class' => 'btn btn-primary']) !!}
                  @endif
                   <a class="btn btn-secondary" href="{{route('country.index')}}">Trở về danh sách</a>

               </center>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection