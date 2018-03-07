@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Sửa</small>
                    </h1>
                </div>
                @if(count($errors)>0)
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors -> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(session('thongbao_error'))
                    <div class="alert-danger">
                        {{session('thongbao_error')}}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="ten" placeholder="Nhập tên slide" required maxlength="100" minlength="10" value="{{$slide->Ten}}"/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input class="form-control" name="noiDung" placeholder="Nhập nội dung cho slide" required minlength="10" maxlength="500" value="{{$slide -> NoiDung}}"/>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" name="link" placeholder="Nhập link cho slide" required minlength="10" maxlength="500" value="{{$slide -> link}}"/>
                        </div>
                        <div class="form-group">
                            <h2>Hình ảnh</h2>
                            <img src="upload/slide/{{$slide->Hinh}}" width="100px" height="100px"/>
                            <input type="file" name="hinh" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection