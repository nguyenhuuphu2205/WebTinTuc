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
            <form action="dangky" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div>
                    <label>Họ tên</label>
                    <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" required minlength="6">
                </div>
                <br>
                <div>
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required
                    >
                </div>
                <br>
                <div>
                    <label>Nhập mật khẩu</label>
                    <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon1" placeholder="password" required minlength="8">
                </div>
                <br>
                <div>
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" id="passwordAgain" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" placeholder="password" required minlength="8">
                </div>
                <br>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-default">Đăng ký
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>
<div class="col-md-2">
</div>
@endsection
