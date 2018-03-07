@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Danh sách</small>
                </h1>
                @if(session('thongbao')=="Xóa thành công")
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(session('thongbao')=='Xóa không thành công')
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tiêu Đề</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Nội bật</th>
                    <th>Số lượt xem</th>
                    <th>Loại tin</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $tintucs as $tintuc)
                <tr class="odd gradeX" align="center">
                    <td>{{$tintuc->id}}</td>
                    <td>{{$tintuc->TieuDe}}<br><img src="upload/tintuc/{{$tintuc->Hinh}}" width="200" height="100"/></td>
                    <td>{!!$tintuc->TomTat  !!}</td>
                    <td>{!!$tintuc->NoiDung!!}</td>
                    <td>
                        @if($tintuc->NoiBat ==1)
                            {{"Có"}}
                        @else
                            {{"Không"}}
                        @endif
                    </td>
                    <td>{{$tintuc->SoLuotXem}}</td>
                    <td>{{$tintuc->loaitin->Ten}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tintuc->id}}">Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tintuc->id}}">Sửa</a></td>
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