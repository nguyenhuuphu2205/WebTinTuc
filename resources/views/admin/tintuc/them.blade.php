@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('thongbao'))
                        <div class="alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    @if(count($errors)>0)
                        <div class="alert-danger">
                            <ul>
                                @foreach($errors ->all() as $error)
                                    <li>{{$error}}</li>
                                 @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" id="theloai" onchange="selectTheLoai(this)">
                                @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="loaiTin" id="loaitin">
                                @foreach( $loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="tieuDe" placeholder="Nhập tiêu đề tin tức" />
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt</label>
                            <textarea id="demo" class="form-control ckeditor" rows="5" name="tomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" class="form-control ckeditor" rows="5" name="noiDung"></textarea>
                        </div>
                       <div class="form-group">
                           <label>Hình ảnh</label>
                               <input type="file" id="files" name="hinh" accept="image/gif, image/jpeg, image/png"  >

                       </div>
                        <div class="form-group">
                            <label class="radio-inline">
                            <input type="radio"  value="1" name="noiBat"/>Nổi bật</label>
                            <label class="radio-inline">
                            <input type="radio" value="0" name="noiBat" checked />Không nổi bật</label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                    <p id="result"></p>
                </div>
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
@endsection