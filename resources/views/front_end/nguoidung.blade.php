@extends('front_end.layouts.index')
@section('content')
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Đăng ký tài khoản</div>
            <div class="panel-body">
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
                @if(isset($user_login))
                <form action="nguoidung" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div>
                        <label>Họ tên</label>
                        <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" required minlength="6" value="{{$user_login->name}}">
                    </div>
                    <br>
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required value="{{$user_login->email}}" disabled
                        >
                    </div>
                    <br>
                    <div>
                        <label>Đổi mật khẩu</label>
                        <input type="checkbox" name="checkboxPassword" onchange="changePassword()" id="checkbox">
                        <label>Nhập mật khẩu</label>
                        <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon1" placeholder="password" required minlength="8" disabled>
                    </div>
                    <br>
                    <div>
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" id="passwordAgain" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" placeholder="password" required minlength="8" disabled>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="btn btn-default">Sửa thông tin
                        </button>

                    </div>

                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
@endsection
@section('script')
    <script>
        function changePassword() {
            if(document.getElementById('checkbox').checked == true){
                document.getElementById('password').removeAttribute('disabled');
                document.getElementById('passwordAgain').removeAttribute('disabled');
            }else{
                document.getElementById('password').setAttribute('disabled','');
                document.getElementById('passwordAgain').setAttribute('disabled','');
            }


        }
    </script>
@endsection
