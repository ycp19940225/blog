<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>BLOG</title>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ loadStatic('blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('blog/css/main.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('common/tocfiy/stylesheets/jquery.tocify.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('common/prettify/styles/prttify_tomorow.css') }}" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{{ loadStatic('admin/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />

{{--<link href="{{ loadStatic('blog/vendor/comments/css/comment.css') }}" rel="stylesheet" />--}}
    <!-- ================== END PAGE CSS STYLE ================== -->

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
                <li class="active"><a href="#">文章</a></li>
               {{-- <li><a href="#">文章</a></li>
                <li><a href="#">归档</a></li>--}}
            </ul>
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar_url  }}" alt="" style="max-height: 25px;max-width:25px;">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="#">Setting</a></li>
                            <li><a href="{{ url('blog/logout') }}">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
               @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('blog/auth/index') }}"><span class="fa fa-user"></span>登录</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-log-in"></span> 注册</a></li>
                </ul>
            @endif
            <form class="navbar-form navbar-right" role="search" method="get" action="{{ url('blog/search') }}">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="search" placeholder="搜索" required="">
            </form>
        </div>
    </div>

</nav>
<!-- end nav   -->
@yield('content')
<!--begin footer-->
<div class="footer">
    <div class="container">
        <p style="text-align: center">
            Copyright ©2017 yangcp.me <a href="http://www.miitbeian.gov.cn/">渝ICP备17009018号</a>
        </p>
    </div>
</div>
<!-- end footer-->
</body>

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ loadStatic('admin/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ loadStatic('blog/vendor/comments/js/jquery.cookie.js') }}"></script>
<script src="{{ loadStatic('common/prettify/src/prettify.js') }}"></script>
<script src="{{ loadStatic('blog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ loadStatic('common/tocfiy/javascripts/jquery.tocify.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE JS ================== -->
{{--layer.js--}}
<script src="{{ loadStatic('common/layer/layer.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ loadStatic('blog/js/app.js') }}"></script>

{{--<script src="{{ loadStatic('blog/vendor/comments/js/comment.js') }}"></script>
<script src="{{ loadStatic('blog/vendor/comments/js/pager.js') }}"></script>--}}
<!-- ================== BEGIN PAGE JS ================== -->


<script>
    $(function(){
        @if (session('status'))
            layer.msg('{{ session('status') }}', {
                offset: 't',
                anim: 6
            });
        @endif
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