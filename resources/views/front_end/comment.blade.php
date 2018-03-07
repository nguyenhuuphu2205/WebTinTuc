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