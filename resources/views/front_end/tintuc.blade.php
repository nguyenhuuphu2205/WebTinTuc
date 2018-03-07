@extends('front_end.layouts.index')
@section('slide')
    @include('front_end.layouts.slide')
@endsection
@section('content')

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->TieuDe}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">PhuNHb</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}  <br>Số lượt xem : {{$tintuc ->SoLuotXem}}</p>

            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $tintuc->TomTat !!}</p>
            <p>{!! $tintuc -> NoiDung !!}</p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                @if(session('thongbao'))
                    <div class="alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(Auth::check()==false)
                <p>Đăng nhập để bình luận</p>
                @endif
                <div>
                    <input id="token" type="hidden" value="{{csrf_token()}}">
                    <input id="idTinTuc" type="hidden"  value="{{$tintuc->id}}">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" id="noiDungComment" required></textarea>
                    </div>
                    <button class="btn btn-primary" onclick="clickComment()"
                    @if(Auth::check()==false)
                        {{"disabled"}}
                    @endif
                    >Gửi</button>
                </div>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div id="danhsachcomment">
            @foreach($comment as $cm)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cm->user->name}}
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {{$cm->NoiDung}}
                </div>
            </div>
            @endforeach
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                    @foreach($tinlienquan as $tin)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="tintuc/{{$tin->id}}">
                                <img class="img-responsive" src="upload/tintuc/{{$tin->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{$tin->id}}"><b>{{$tin->TieuDe}}</b></a>
                        </div>
                        <p>{!! $tin->TomTat !!}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                    @foreach($tinnoibat as $tinnb)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="detail.html">
                                <img class="img-responsive" src="upload/tintuc/{{$tinnb->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="tintuc/{{$tinnb->id}}"><b>{{$tinnb->TieuDe}}</b></a>
                        </div>
                        <p>{{$tinnb->TomTat}}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

@endsection
@section('script')
    <script>
        function clickComment() {
            var idTinTuc = document.getElementById('idTinTuc').value;
            var noiDungComment = document.getElementById('noiDungComment').value;
            var token = document.getElementById('token').value;
            if(noiDungComment != ""){
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                xhttp.onreadystatechange = function () {
                    if(this.readyState==4 && this.status==200){
                        document.getElementById('danhsachcomment').innerHTML=this.responseText;
                        console.log(this.responseText);
                    }
                }
                xhttp.open('POST','binhluan/'+idTinTuc,true);
                xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                var data = "_token="+token+"&noiDung="+noiDungComment;
                xhttp.send(data);
            }
        }
    </script>
@endsection