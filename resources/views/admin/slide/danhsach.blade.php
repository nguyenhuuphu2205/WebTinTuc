@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
                </h1>
            </div>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Link</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slides as $sl)
                <tr class="odd gradeX" align="center">
                    <td>{{$sl->id}}</td>
                    <td>{{$sl->Ten}}</td>
                    <td>
                        <img src="upload/slide/{{$sl->Hinh}}" width="100px" height="100px"/>
                    </td>
                    <td>{{$sl->NoiDung}}</td>
                    <td>{{$sl->link}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$sl->id}}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$sl->id}}">Sửa</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection