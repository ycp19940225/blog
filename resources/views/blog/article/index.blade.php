@extends('blog.layout')
@section('content')
<!--begin main container-->
<div class="container blog" data-spy="scroll" data-target=".article_nav">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            <ol class="breadcrumb">
                <li><a href="{{ url('blog') }}">blog</a></li>
                <li><a href="{{ url('blog') }}">article</a></li>
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
                                    Last updated on  <time class="updated" datetime="">{!! date('Y-m-d',strtotime($article->updated_at)) !!}</time>
                            </span>
                                <span class="byline"> by <span class="author vcard">
                                    <i class="glyphicon glyphicon-user">

                                    </i> <a class="url fn n" href="">{{ $article->author->adminname or '' }}</a>
                                </span>
                            </span>

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
                    </p>
                    <div class="comments_share">
                        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>                    </div>
                </footer>
            </article>
            @include('vendor.pagination.article_pagination')
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
        /**
         * 设置token,防止跨站脚本攻击
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**
         * 获取评论
         */
        $.getJSON('{{ url('blog/getComments') }}',{article_id:'{{ $article['id'] }}'},function (res) {
            if(res['code'] === 'success'){
                layer.msg(res['msg'],{time:1000,offset: 'rb'});
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
                var total = $(".article_comments_list").find('li').length;
                $("#comments_total").html('共计'+total+'条评论');
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        });
        $(document).ready(function(){
            $('#article_nav').tocify({
                selectors: "h2,h3,h4,h5",
                showEffect: "show",
                highlightDefault: true,
                scrollHistory:false
            });
            /**
             * 发布评论，回复
             */
            /*Parsley.on('form:submit', function() {
                return false; // Don't submit form for this demo
            });*/
            $('.do_comments').on('click',function () {
                /**
                 *表单验证
                 */
                if(!$('.comments_sub').valid()){
                    return false;
                }
                $(this).attr('disabled',true);
                var that = $(this).closest('form');
                var data = that.serialize();
                $.post('{{ url('blog/doComments') }}',data,function (res,status) {
                    $('.do_comments').attr('disabled',false);
                    var data =JSON.parse(res['data']['data']['comment_info']);
                    var base_data = res['data']['data'];
                    if(res['code'] === 'success'){
                        layer.msg(res['msg'],{icon: 6});
                        var author = data.author;
                        var content = res['data'].data.content;
                        var timestamp = new Date().getTime();
                        var time = get_format(timestamp/1000);
                        var parent_id = base_data.parent_id;
                        var width;
                        if(parent_id == 0){
                             var depth = 0;
                             width = toPercent((100-5*depth)/100);
                        }else{

                            width = toPercent((100-5)/100);
                        }
                        var comments_list = '<li class="list-group-item-'+base_data.id+'" id="'+base_data.id+'">'+
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
                            '<a class="" href="JavaScript:void(0);" onclick="reply_comments(\''+author+'\','+base_data.id+')" ><i class="fa fa-reply"></i>&nbsp;&nbsp;回复'+
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
                        var total = $(".article_comments_list").find('li').length;
                        $("#comments_total").html('共计'+total+'条评论');
                    }else{
                        layer.msg(res['msg'],{icon:5});
                    }
                },'json');
            });


        });
        /**
         * 评论框
         */
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
        /**
         * 百度分享
         */
        window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdText": "",
                "bdMini": "2",
                "bdMiniList": false,
                "bdPic": "",
                "bdStyle": "0",
                "bdSize": "16"
            },
            "share": {},
            "image": {"viewList": ["weixin", "tsina", "qzone", "sqq"], "viewText": "分享到：", "viewSize": "16"}
        };
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];

    </script>
    @endsection