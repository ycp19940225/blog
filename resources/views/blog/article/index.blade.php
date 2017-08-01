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
                        <div class="entry-meta text-muted " style="text-align: center">
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
                </div>
                <footer class="entry-meta article_detail_footer">
                    <p class="text-muted  meta-data">
                        &nbsp;&nbsp;&nbsp;<span class="cat-links">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;分类： <a href="http://laravelacademy.org/tutorials/blog" rel="category tag">{{ $article->cat->name }}&nbsp;</a>				</span>

                        <span class="tags-links">
					<i class="glyphicon glyphicon-tags"></i> 标签：
                            @foreach($article->tag as $tag)
                                <a class="article_tag" href="">{{ $tag->name }}</a>
                            @endforeach
                                   </span>
                </footer>
            </article>
            @include('blog.comments')

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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.getJSON('{{ url('blog/getComments') }}',{article_id:'{{ $article['id'] }}'},function (res) {
            console.log(res['data']);
            if(res['code'] === 'success'){
                layer.msg(res['msg'],{icon: 6});

                $.each(res['data']['data'],function (key,value){
                    //language=HTML
                    var comment_info=JSON.parse(value.comment_info);
                    var author = String(comment_info.author);
                    var width = toPercent((100-5*value.level)/100);
                    var comments_list = '<li class="list-group-item-'+value.id+'" id="'+value.id+'" >'+
                        '<div class="article_comments_detail" id="article_comments" >'+
                       '<div class="panel panel-info pull-right article_depth" style="width:'+width+'">'+
                        '<div class="panel-body comment-meta">'+
                        '<div class="comment_body col-xs-10 ">'+
                        '<div class="media-heading">'+
                       '<cite>'+comment_info.author+'</cite>&nbsp;&nbsp; 发表于&nbsp;&nbsp;'+
                        '<a href="#">'+
                        '<time datetime="2017-06-13T17:20:42+00:00">'+
                        '<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;	'+get_format(value.created_at)+'		</time>'+
                   '</a>'+
                    '</div>'+

                    '<div class="media-body markdown-reply content-body">'+
                        '<p>'+value.content+'</p>'+
                  '  </div>'+
                   ' </div>'+
                   ' <div class="pull-right">'+
                        '<div class="reply text-right">'+
                        '<a class="" href="JavaScript:void(0);" onclick="reply_comments(\''+author+'\','+value.id+')" ><i class="fa fa-reply"></i>&nbsp;&nbsp;回复'+
                    '</a></div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div> <div class="clear_float"></div>'+
                    '</li>';
                    $('.article_comments_list').append(comments_list);
                });
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        });
        $(document).ready(function(){
            $('#article_nav').tocify({
                selectors: "h2,h3,h4,h5",
                showEffect: "show",
                highlightDefault: true,
                scrollHistory:true
            });
            $('form').on('click','.do_comments',function () {
                var that = $(this).closest('form');
                var data = that.serialize();
                $.post('{{ url('blog/doComments') }}',data,function (res,status) {
                    if(res['code'] === 'success'){
                        layer.msg(res['msg'],{icon: 6});
                        var author = that.find('input[name="author"]').val();
                        var content = that.find('textarea[name="content"]').val();
                        var timestamp = new Date().getTime();
                        var time = get_format(timestamp/1000);
                        var parent_id = JSON.parse(res['data']['data']['comment_info']).parent_id;
                        var width;
                        if(parent_id ==0){
                             var depth = 0;
                             width = toPercent((100-5*depth)/100);
                        }else{
                            width = toPercent((100-5)/100);
                        }
                        var comments_list = '<li class="list-group-item" id="'+res['data']['data']['id']+'">'+
                            '<div class="article_comments_detail" id="article_comments">'+
                            '<div class="panel panel-info article_depth pull-right" style="width:'+width+'">'+
                            '<div class="panel-body comment-meta">'+
                            '<div class="comment_body col-xs-11 ">'+
                            '<div class="media-heading">'+
                            '<cite>'+author+'</cite>&nbsp;&nbsp; 发表于&nbsp;&nbsp;'+
                            '<a href="">'+
                            '<time datetime="">'+
                            '<i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;	'+time+'		</time>'+
                            '</a>'+
                            '</div>'+

                            '<div class="media-body markdown-reply content-body">'+
                            '<p>'+content+'</p>'+
                            '  </div>'+
                            ' </div>'+
                            ' <div class="pull-right">'+
                            '<div class="reply text-right">'+
                            '<a class="" href="JavaScript:void(0);" onclick="reply_comments(\''+author+'\','+res['data']['data']['id']+')" ><i class="fa fa-reply"></i>&nbsp;&nbsp;回复'+
                            '</a></div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div><div class="clear_float"></div>'+
                            '</li>';
                        if(parent_id == 0){
                            $("#comments_total").after(comments_list);
                        }else{
                            $("#"+parent_id).after(comments_list);
                        }
                        $("[id^='reply_']").hide();
                    }else{
                        layer.msg(res['msg'],{icon:5});
                    }
                },'json');
            });


        });
        function reply_comments(author,comments_id){
            var obj = $(".article_comments:last");
            var comment_html = obj.clone(true);
            comment_html.find("input[name='parent_id']").val(comments_id);
            var tt=comment_html.attr('id','reply_'+comments_id);
            var comments_handle = '<span class="pull-right"><button type="button" class="btn btn-danger btn-sm pull-right" onclick="cancel_comments($(this))">取消回复</button></span> <h3 >回复给<a href="#list-group-item">'+author+'</a></h3>'
            comment_html.find('p').before(comments_handle);
            $("#"+comments_id).after(comment_html);
            $("[id^='reply_']").not('#reply_'+comments_id).hide();
        }
        function cancel_comments(e) {
            e.closest('.article_comments').hide();
        }
        function toPercent(point){
            var str=Number(point*100).toFixed(1);
            str+="%";
            return str;
        }
    </script>
    @endsection