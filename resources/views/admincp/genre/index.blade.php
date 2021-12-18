@extends('layouts.app')
@section('content')
<div class="container page_name" id="genre-page">
   <div class="row justify-content-center">
      <div class="col-md-12" style="margin-top: 10px">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Danh sách các thể loại
               <a href="{{route('genre.create')}}"  class="btn btn-sm btn-primary">Thêm thể loại</a>
            </div>
            <div class="card-body">
               <table class="table" id="datatables_genre">
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
                     @foreach($genres as $key => $gen)
                     <tr id="{{$gen['id']}}">
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