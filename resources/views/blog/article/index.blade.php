@extends('blog.layout')
@section('content')
<!--begin main container-->
<div class="container blog" data-spy="scroll" data-target=".article_nav">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            <ol class="breadcrumb">
                <li><a href="{{ url('blog') }}">blog</a></li>
                <li><a href="{{ url('blog/articles') }}">article</a></li>
                <li class="active">{{ $article['title'] }}</li>
            </ol>
            <article class="article">
                <div class="content article_content">
                    <header class="article_header">
                        <hr>
                        <h1 class="text-center"><strong>&nbsp;&nbsp;{{ $article['title'] }}</strong></h1>
                        <div class="entry-meta text-muted">
                                <span class="posted-on">
                                &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-calendar"></i>
                                Posted on <a href="" rel="bookmark">
                                    <time class="updated" datetime="">{!! date('Y-m-d',strtotime($article->updated_at)) !!}</time>
                                </a>
                            </span>
                                <span class="byline"> by <span class="author vcard">
                                    <i class="glyphicon glyphicon-user">

                                    </i> <a class="url fn n" href="">{{ $article->author->adminname or '' }}</a>
                                </span>
                            </span>
                            </p>

                        </div>
                    </header>
                    <hr>
                    <div class="article_detail">
                        <p >{!! $article['content'] !!}</p>
                    </div>
                    <footer class="entry-meta article_detail_footer">
                        <p class="text-muted hidden-xs meta-data">
                            &nbsp;&nbsp;&nbsp;<span class="cat-links">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;分类： <a href="http://laravelacademy.org/tutorials/blog" rel="category tag">{{ $article->cat->name }}&nbsp;</a>				</span>

                            <span class="tags-links">
					<i class="glyphicon glyphicon-tags"></i> 标签：
                                @foreach($article->tag as $tag)
                                    <a class="article_tag" href="">{{ $tag->name }}</a>
                                @endforeach
                                   </span>
                        &nbsp;&nbsp;&nbsp;<a href="http://laravelacademy.org/tags/%e8%af%84%e8%ae%ba" rel="tag">评论</a>
                        <span class="comments-link">&nbsp;&nbsp;<i class="glyphicon ipt-icon-bubbles2"></i>&nbsp;<a href="#comments">43 Comments</a></span>
                    </footer>
                </div>
            </article>
        </div>
        <!--end 文章-->
        <!--content right-->

        <div class="col-md-3 ">
            <div class="post-nav" >
                        <div class="nva-list" id="article_nav" >
                            <div class="panel panel-info">
                                <div class="panel-heading">目录</div>
                            </div>
                        </div>
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
        $(document).ready(function(){

            var toc = $('#article_nav').tocify({
                selectors: "h2,h3,h4,h5",
                showEffect: "show",
                highlightDefault: true,
                scrollHistory:true
            });

        });

    </script>
    @endsection