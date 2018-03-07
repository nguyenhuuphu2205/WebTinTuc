@extends('front_end.layouts.index')
@section('content')
    <div class="row carousel-holder">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Đăng nhập</div>
                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="dangnhap" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required
                            >
                        </div>
                        <br>
                        <div >
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required minlength="8">
                        </div>
                        <br>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-default" style="text-align: center;width: 340px"  >Đăng nhập
                            </button>

                            <a href="auth/facebook" class="form-control" style="text-align: center;">Facebook Login</a>

                            <a href="auth/google" class="form-control" style="text-align: center;">Google Login</a>

                            @if(session('thongbao_error'))
                                <div class="alert-danger">
                                    {{session('thongbao_error')}}
                                </div>
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection