@extends('admin.layouts.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <!-- Hiển thị lỗi -->
                    @if( count($errors ) )
                        <div class="alert-danger">
                            <ul>
                                @foreach( $errors -> all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Hiển thị thông báo thêm thành công -->
                    @if( session( 'thongbao' ) )
                        <div class="alert-success">
                            {{session( 'thongbao' )}}
                        </div>
                    @endif
                    <!------------------------------>
                    <form action="admin/user/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="ten" placeholder="Nhập họ và tên" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Nhập email" type="email" required/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Nhập password" type="password" required />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại password</label>
                            <input class="form-control" name="passwordAgain" placeholder="Nhập lại password" type="password" required />
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked="" type="radio">Người dùng thường
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection