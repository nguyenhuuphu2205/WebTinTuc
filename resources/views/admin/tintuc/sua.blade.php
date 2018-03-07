@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Sửa</small>
                </h1>
                @if(session('thongbao'))
                    <div class="alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" id="theloai" onchange="selectTheLoai(this)">
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}"
                                    @if($tintuc ->loaitin ->theloai ->id == $tl ->id)
                                    {{" selected"}}
                                    @endif
                                    >{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Tin</label>
                        <select class="form-control" id="loaitin" name="loaiTin">
                            @foreach($loaitin as $lt)
                                <option value="{{$lt->id}}"
                                @if($tintuc ->loaitin ->id == $lt->id)
                                {{"selected"}}
                                @endif
                                        >{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieuDe" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}" required/>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                       <textarea id="demo" class="form-control ckeditor" rows="5" name="tomTat" required>{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="5" name="noiDung" required>{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group" >
                       <h2>Hình ảnh</h2>
                        <img src="upload/tintuc/{{$tintuc->Hinh}}" width="100px" height="100px"/>
                        <br/>
                        <br/>
                        <input type="file" id="files" name="hinh" accept="image/gif, image/jpeg, image/png" >
                    </div>
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio"  value="1" name="noiBat"
                            @if($tintuc->NoiBat ==1)
                                {{"checked"}}
                             @endif
                            />Nổi bật</label>
                        <label class="radio-inline">
                            <input type="radio" value="0" name="noiBat"
                            @if($tintuc->NoiBat ==0)
                                {{"checked"}}
                                    @endif
                            />Không nổi bật</label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Comment
                <small>Danh sách</small>
            </h1>
        </div>
        @if(session('thongbaocomment')=='Xóa comment thành công')
            <div class="alert-success">
                {{session('thongbaocomment')}}
            </div>
        @elseif(session('thongbaocomment')=='Xóa comment không thành công')
            <div class="alert-danger">
                {{session('thongbaoxoacomment')}}
            </div>
        @endif
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Người dùng</th>
                <th>Nội dung</th>
                <th>Ngày đăng</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $tintuc->comment as $cm)
                <tr class="odd gradeX" align="center">
                    <td>{{$cm->id}}</td>
                    <td>{{$cm->user->name }}</td>
                    <td>{!!$cm->NoiDung  !!}</td>
                    <td>{{$cm->created_at}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/comment/{{$cm->id}}">Xóa</a></td>
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
@section('script')
    <script>
        function selectTheLoai(sel) {
            var idTheLoai=sel.options[sel.selectedIndex].value;
            var xhttp;
            if(window.XMLHttpRequest){
                xhttp = new XMLHttpRequest();
            }else
                xhttp = new ActiveXObject();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    document.getElementById('loaitin').innerHTML = this.responseText;

                }

            }
            xhttp.open('GET','admin/ajax/loaitin/'+idTheLoai,true);
            xhttp.send();

        }
    </script>