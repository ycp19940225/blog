@extends('blog.layout')
@section('content')
<!--begin main container-->
<div class="container blog">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            <article class="article_detail">
                <h3>{{ $article['title'] }}</h3>
                <p> {{ $article->author->adminname or ''}} 发布于 {{$article['created_at']}}</p>
                <hr>
                {!! $article['content'] !!}
            </article>
        </div>
        <!--end 文章-->
        <!--content right-->

        <div class="col-md-3 ">
            <div class="panel author_info">

            </div>
        </div>

        <!--end content right-->
    </div>
    <!-- begin scroll to top btn -->
    <div style="" id="toTop"><button type="button" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eject" title="返回顶部"></span></button></div>
    <!-- end scroll to top btn -->
</div>
<!--end main container-->
@endsection
@section('script.js')
    <script>

    </script>
    @endsection