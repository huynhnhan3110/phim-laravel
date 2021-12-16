@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin-top: 10px">
            <div class="card">
                <div class="card-header">Trang quản trị Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Hello Admin
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
