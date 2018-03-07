@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Sửa</small>
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
                            @foreach($errors -> all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                             @endforeach
                        </ul>
                    </div>
                 @endif
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="name" placeholder="Nhập username" value="{{$user->name}}" readonly />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email" readonly value="{{$user -> email}}" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="quyen" value="0"
                                   @if( $user -> quyen == 0)
                                           {{"checked"}}
                                   @endif
                                   type="radio">Người dùng thường
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1"
                                   @if( $user -> quyen == 1)
                                           {{"checked"}}
                                   @endif
                                   type="radio">Quyền admin
                        </label>
                    </div>
                    <div class="checkbox">
                        <label><input name="changePassword1" id="checkbox" type="checkbox"  onchange="changePassword()"  />Thay đổi mật khẩu</label>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" id="password" name="password" placeholder="Nhập password" type="password" readonly required  />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input class="form-control" id="passwordAgain" type="password" name="passwordAgain" placeholder="Nhập lại password" readonly required />
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
@section('script')
<script>
    function changePassword(){
        if(document.getElementById('checkbox').checked==false) {
            document.getElementById('password').setAttribute('readonly', '');
            document.getElementById('passwordAgain').setAttribute('readonly', '');
        }
        else {
            document.getElementById('password').removeAttribute('readonly');
            document.getElementById('passwordAgain').removeAttribute('readonly');
        }
    }
</script>
@endsection