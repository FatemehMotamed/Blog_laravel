@extends('layout_main')


@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $article->title }}</h1>

    <!-- Author -->
    <p class="lead">
        ارسال شده توسط <a href="index.php">{{$article->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  {{Verta::parse($article->created_at)->format('%B %d، %Y')}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    {!! $article->body !!}
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>ارسال کامنت :</h4>
        <form role="form" method="post" action="{{route("comment.store", ['article'=>$article->slug])}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>نام</label>
                <input class="form-control" name="name" rows="3" />
            </div>

            <div class="form-group">
                <label>نظر</label>
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->


    @foreach($comments as $comment)
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">{{$comment->name}}
                <small>ارسال شده در تاریخ  فرودین 1396</small>
            </h4>
            {{$comment->body}}
        </div>
    </div>
    @endforeach


@endsection
