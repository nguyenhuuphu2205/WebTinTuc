@extends('front_end.layouts.index')
@section('menu')
    @include('front_end.layouts.menu')
@endsection
@section('slide')
    @include('front_end.layouts.slide')
@endsection
@section('content')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                <p>
                    Đây là project tin tức của Nguyễn Hữu Phú
                </p>

            </div>
        </div>
    </div>
@endsection