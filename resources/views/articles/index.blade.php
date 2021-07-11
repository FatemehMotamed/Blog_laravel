@extends('layout_main')

@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    مقالات سایت
                </h1>

                <!-- First Blog Post -->
                @foreach ($articles as $article)
                    <div>
                        <h2>
                            <a href="#">{{$article->title}}</a>
                        </h2>
                        <p class="lead">
                            ارسال شده توسط <a href="index.php">{{$article->user->name}}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  {{Verta::parse($article->created_at)->format('%B %d، %Y')}}</p>
                        <hr>
                        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                        <hr>
                        <p>{{$article->body}}</p>
                        <a class="btn btn-primary" href="{{route('article.show',['article' => $article->slug])}}">ادامه  مطلب <span class="glyphicon glyphicon-chevron-left"></span></a>
                    </div>

                    @if (! $loop->last)
                        <hr>
                    @endif

                @endforeach



                <!-- Pager -->
                <div style="text-align:center;">
                    {{$articles->links()}}
{{--                    <nav aria-label="Page navigation">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li>--}}
{{--                                <a href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true">&laquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#">1</a></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                            <li><a href="#">4</a></li>--}}
{{--                            <li><a href="#">5</a></li>--}}
{{--                            <li>--}}
{{--                                <a href="#" aria-label="Next">--}}
{{--                                    <span aria-hidden="true">&raquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('layouts.sidebar')

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        @include('layouts.footer')

    </div>

@endsection
