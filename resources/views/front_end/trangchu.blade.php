@extends('front_end.layouts.index')
@section('slide')
    @include('front_end.layouts.slide')
@endsection
@section('menu')
    @include('front_end.layouts.menu')
@endsection
@section('content')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                @foreach($theloai as $tl)
                 @if(count($tl->loaitin)>0)
                <div class="row-item row">
                    <h3>
                        {{$tl->Ten}}
                        @foreach($tl->loaitin as $lt)
                        <small><a href="loaitin/{{$lt->id}}"><i>{{$lt->Ten}}</i></a>/</small>
                        @endforeach
                    </h3>
                    <?php
                    $data = $tl -> tintuc ->where('NoiBat','1') ->sortByDesc('created_at') ->take(6);
                    $tin1 = $data ->shift();
                    ?>
                    <div class="col-md-8 border-right">
                        <div class="col-md-5">
                            <a href="tintuc/{{$tin1->id}}">
                                <img class="img-responsive" src="upload/tintuc/{{$tin1->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-7">
                            <a href="tintuc/{{$tin1->id}}"><h3>{{$tin1 -> TieuDe}}</h3></a>
                            <p>{!! $tin1->TomTat !!}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tin1->id}}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>

                    </div>


                    <div class="col-md-4">
                        @foreach($data as $tin)
                        <a href="tintuc/{{$tin->id}}">
                            <h4>
                                <span class="glyphicon glyphicon-list-alt"></span>
                                {!! $tin ->TieuDe !!}
                            </h4>
                        </a>
                        @endforeach
                    </div>

                    <div class="break"></div>
                </div>
                  @endif
                @endforeach
                <!-- end item -->
            </div>
        </div>
    </div>
    </div>
@endsection