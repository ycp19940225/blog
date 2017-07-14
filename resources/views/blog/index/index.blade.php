<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>BLOG</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ loadStatic('blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('blog/css/main.css') }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
    <!--begin响应式导航栏-->
    <nav class="navbar navbar-default " role="navigation" id="nav">
        <div class="container">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbar-collapse-blog">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">YCP的博客</a>
            </div>
            <div class="navbar-collapse collapse " id="navbar-collapse-blog" role="navigation" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">首页</a></li>
                    <li><a href="#">文章</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- end nav   -->

    <!--begin main container-->
    <div class="container blog">
        <div id="content" class="row">
            <!--文章-->
            <div class="col-md-9" >
                <div class="panel article">
                    <div class="content line-limit-length">
                        <h3>我是标题1 h1</h3>
                        <p class="line-limit-length">最新消息：神秘地球黑洞深不可测，不停吸入周围海水。55555555555555555555555555555555555555555555入周围海水5555555555555555555555555555555555555555555555</p>
                    </div>
                </div>
                <div class="panel article">
                    <div class="content line-limit-length">
                        <h2>我是标题1 h1</h2>
                        <p class="line-limit-length">最新消息：神秘地球黑洞深不可测，不停吸入周围海水。55555555555555555555555555555555555555555555入周围海水5555555555555555555555555555555555555555555555</p>
                    </div>
                </div><div class="panel article">
                    <div class="content line-limit-length">
                        <h2>我是标题1 h1</h2>
                        <p class="line-limit-length">最新消息：神秘地球黑洞深不可测，不停吸入周围海水。55555555555555555555555555555555555555555555入周围海水5555555555555555555555555555555555555555555555</p>
                    </div>
                </div><div class="panel article">
                    <div class="content line-limit-length">
                        <h2>我是标题1 h1</h2>
                        <p class="line-limit-length">最新消息：神秘地球黑洞深不可测，不停吸入周围海水。55555555555555555555555555555555555555555555入周围海水5555555555555555555555555555555555555555555555</p>
                    </div>
                </div>
                <div class="panel article">
                    <div class="content line-limit-length">
                        <h2>我是标题1 h1</h2>
                        <p class="line-limit-length">最新消息：神秘地球黑洞深不可测，不停吸入周围海水。55555555555555555555555555555555555555555555入周围海水5555555555555555555555555555555555555555555555</p>
                    </div>
                </div>

                <ul class="pagination ">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
            <!--end 文章-->
            <!--content right-->
            <div class="col-md-3">
                <div class="panel author_info">
                    <div class="widget-box widget-box--blog-info">
                        <div class="blog__sidebar-author ">
                            <button type="button" class="btn btn-sm btn-success follow-user ml10 pull-right" data-do="follow" data-type="user" data-id="1030000000271073">关注作者
                            </button>

                            <div class="article__widget--author">
                                <a href="/u/devlevelup">
                                    <img class="avatar-40" src="https://sfault-avatar.b0.upaiyun.com/838/001/838001092-1030000000271073_big64" alt="技术人攻略">
                                </a>
                                <a class="article__widget-author-name" href="/u/devlevelup">
                                    <strong>技术人攻略</strong>
                                </a>
                                <p class="article__widget-author-text-muted mb0">
                                    <span>1.1k 声望</span>

                                </p>


                            </div>


                        </div>
                        <div class="blog__sidebar-blog-name">
                            <p class="article__widget-author-text-muted mt15 mb5">发布于专栏</p>

                            <h4 class="fz16"><a href="/blog/devlevelup">技术人攻略</a></h4>
                            <p class="article__widget-author-desc">关注技术人的个人成长，讲述技术人自己的故事，传递技术梦想。</p>

                            <p>
                                <span class="article__widget-author-text-muted">56 人关注</span>

                                <button type="button mb20" class="btn btn-sm btn-default follow-article pull-right" data-do="follow" data-type="blog" data-id="1200000000366060">关注专栏
                                </button>

                            </p>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel author_info">
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                </div>
            </div> <div class="col-md-3">
                <div class="panel author_info">
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                </div>
            </div> <div class="col-md-3">
                <div class="panel author_info">
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                    <p>222</p>
                </div>
            </div>
            <!--end content right-->
        </div>
        <!-- begin scroll to top btn -->
        <div style="" id="toTop"><button type="button" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eject" title="返回顶部"></span></button></div>
        <!-- end scroll to top btn -->
    </div>
    <!--end main container-->
    <!--begin footer-->
    <div class="footer">
        <div class="container">
            <p style="text-align: center">
                Copyright © 2012-2016 wenzhixin.net.cn <a href="http://www.miitbeian.gov.cn/">粤ICP备15117953号</a>
            </p>
        </div>
    </div>
    <!-- end footer-->
</body>

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ loadStatic('admin/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ loadStatic('blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->
<script>
    $(function(){
        $(window).scroll(function() {
            if ($(this).scrollTop() > 1) { //当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                $("#toTop").fadeIn();
            } else {
                $("#toTop").fadeOut();
            }
        });
        $("#toTop").click(function(){
                     $("html").animate({"scrollTop": "0px"},300); //IE,FF
                     $("body").animate({"scrollTop": "0px"},300); //Webkit
                     });
             })
</script>
</html>