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
    <link href="{{ loadStatic('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('common/prettify/src/prettify.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('common/ztree_toc/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet" />
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
            <a class="navbar-brand" href="{{ url('blog') }}">YCP的博客</a>
        </div>
        <div class="navbar-collapse collapse " id="navbar-collapse-blog" role="navigation" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
                <li><a href="#">文章</a></li>
                <li><a href="#">归档</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 注册</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search" method="get" action="https://lufficc.com/search">
                <input type="text" class="form-control" name="search" placeholder="搜索" required="">
            </form>
        </div>
    </div>

</nav>
<!-- end nav   -->

<!--begin main container-->
@yield('content');
<!--end main container-->
<!--begin footer-->
<div class="footer">
    <div class="container">
        <p style="text-align: center">
            Copyright © 2012-2016 wenzhixin.net.cn <a href=""></a>
        </p>
    </div>
</div>
<!-- end footer-->
</body>

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ loadStatic('admin/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ loadStatic('common/prettify/src/prettify.js') }}"></script>
<script src="{{ loadStatic('blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ loadStatic('common/ztree_toc/js/jquery.ztree.core-3.5.js') }}"></script>
<script src="{{ loadStatic('common/ztree_toc/src/ztree_toc.js') }}"></script>
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
        $("pre").addClass("prettyprint");
        prettyPrint();

    })
</script>
@yield('script.js')
</html>