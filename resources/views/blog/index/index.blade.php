@extends('blog.layout')
@section('content')
<!--begin main container-->
<div class="container blog">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            @foreach( $articles as $v)
               <article class="panel articles">
                    <div class="content article_content">
                        <header class="article_header">
                            <h3 class=""><strong>&nbsp;&nbsp;{{ $v['title'] }}</strong></h3>
                            <div class="entry-meta text-muted">
                            <span class="posted-on">
                                &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-calendar"></i>
                                Posted on <a href="" rel="bookmark">
                                    <time class="updated" datetime="">{{ $v['updated_at'] }}</time>
                                </a>
                            </span>
                                <span class="byline"> by <span class="author vcard">
                                    <i class="glyphicon glyphicon-user">

                                    </i> <a class="url fn n" href="">{{ $v->author->adminname }}</a>
                                </span>
                            </span>
                            </div>
                        </header>
                        <hr>
                        <div class="article_intro" id="article_intro">
                            <blockquote>
                            <p >{!! $v['content'] !!}</p>
                            </blockquote>
                        </div>
                        <footer class="entry-meta article_footer">
                            <p class="visible-xs">
                                <a rel="bookmark" href="{{ url('blog/article',['id'=>$v['id']]) }}" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-link"></i> 阅读全文</a>
                            </p>
                            <p class="pull-right hidden-xs">
                                <a rel="bookmark" href="{{ url('blog/article',['id'=>$v['id']]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-link"></i> 阅读全文</a>
                            </p>
                            <p class="text-muted hidden-xs meta-data">
                                &nbsp;&nbsp;&nbsp;<span class="cat-links">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;分类： <a href="http://laravelacademy.org/tutorials/blog" rel="category tag">{{ $v->cat->name }}&nbsp;</a>				</span>

                                <span class="tags-links">
					<i class="glyphicon glyphicon-tags"></i> 标签：
                                    @foreach($v->tag as $tag)
                                        <a href="">{{ $tag->name }}</a>
                                        @endforeach
                                    &nbsp;&nbsp;&nbsp;<a href="http://laravelacademy.org/tags/%e8%af%84%e8%ae%ba" rel="tag">评论</a>				</span>
                                <span class="comments-link">&nbsp;&nbsp;<i class="glyphicon ipt-icon-bubbles2"></i>&nbsp;<a href="#comments">43 Comments</a></span>
                            </p>
                            <div class="clearfix"></div>
                        </footer>

                    </div>
                </article>
            @endforeach

                {{ $articles->links() }}
        </div>
        <!--end 文章-->
        <!--content right-->

        <div class="col-md-3 ">
            <div class="panel panel-success">
                <div class="panel-heading">about me</div>
                <div class="panel-body">
                    <p>phper</p>
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
        $(function () {
            var oBox=document.getElementsByClassName('article_intro');

            for(var i=0;i<oBox.length;i++){
                var Html = oBox[i].innerHTML.slice(0,200)+'...';
                console.log(Html);

                oBox[i].innerHTML = Html;
            }

        });
    </script>
    @endsection