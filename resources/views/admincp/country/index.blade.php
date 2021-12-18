@extends('layouts.app')
@section('content')
<div class="container page_name" id="country-page">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Danh sách các quốc gia
               <a href="{{route('country.create')}}"  class="btn btn-sm btn-primary">Thêm quốc gia</a>
            </div>
            <div class="card-body">
               <table class="table" id="datatables_country">
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
                     @foreach($countries as $key => $coty)
                     <tr id="{{$coty['id']}}">
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