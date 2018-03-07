@extends('front_end.layouts.index')
@section('menu')
    @include('front_end.layouts.menu')
@endsection
@section('content')
    <div class="col-md-9 ">
        <div class="panel panel-default ">
            <div class="panel-heading" style="background-color:#337AB7; color:white;">
                <h4><b>{{$loaitin->Ten}}</b></h4>
            </div>
            @foreach($tintuc as $tin)
            <div class="row-item row">
                <div class="col-md-3">

                    <a href="tintuc/{{$tin->id}}">
                        <br>
                        <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tin->Hinh}}" alt="">
                    </a>
                </div>

                <div class="col-md-9">
                    <h3>{!!$tin->TieuDe!!}</h3>
                    <p>{!! $tin->TomTat !!}</p>
                    <a class="btn btn-primary" href="tintuc/{{$tin->id}}">Xem chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div class="break"></div>
            </div>
            @endforeach
            {{$tintuc ->links()}}

        </div>
    </div>
@endsection