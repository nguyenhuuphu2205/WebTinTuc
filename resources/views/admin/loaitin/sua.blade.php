@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tin
                    <small>Sửa</small>
                </h1>
            </div>
            <!--Hiển thị session thành công-->
            @if( session( 'thongbao' ) )
                <div class="alert-success">
                    {{ session( 'thongbao' ) }}
                </div>
            @endif
            <!------------------------------>
            <!--Hiển thị các lỗi-->
            @if( count( $errors ) > 0 )
                <div class="alert-danger">
                    <ul>
                        @foreach( $errors -> all() as $error )
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif
            <!-------------------->
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/loaitin/sua/{{ $loaitin -> id }}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" required name="sltTheLoai">
                            <!--Hiển thị danh sách thể loại-->
                            @foreach( $theloai as $tl )
                            <option value="{{ $tl -> id }}"
                            @if( $tl -> id == $loaitin -> idTheLoai )
                                {{" selected "}}
                            @endif
                            >{{ $tl -> Ten }}</option>
                            @endforeach
                            <!--./Hiển thị danh sách thể loại-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên thể loại" value="{{ $loaitin -> Ten }}" required/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection