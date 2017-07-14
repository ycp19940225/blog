<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="renderer" content="webkit">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ loadStatic('admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ loadStatic('admin/plugins/isotope/isotope.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ loadStatic('admin/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->


    <!-- ================== BEGIN TABLE JS ================== -->
    <link href="{{ loadStatic('admin/plugins/DataTables/css/data-table.css') }}" rel="stylesheet" />
    <!-- ================== END TABLE JS ================== -->
     <!-- ================== BEGIN TAG_INPUT CSS ================== -->
    <link href="{{ loadStatic('common/tag_input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <!-- ================== END TAG_INPUT CSS ================== -->
    @yield('page.css')
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="/" class="navbar-brand"><span class="navbar-logo"></span> Color Admin</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell-o"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">Notifications (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports</h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{ loadStatic('admin/img/user-1.jpg') }}}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">25 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{ loadStatic('admin/img/user-2.jpg') }}}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Olivia</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">35 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted f-s-11">1 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted f-s-11">2 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{  get_user()->logo }}" alt="" />
                        <span class="hidden-xs"> {{  get_user()->adminname }}</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="javascript:;">Edit Profile</a></li>
                        <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                        <li><a href="javascript:;">Calendar</a></li>
                        <li><a href="{{ url('common/setting') }}">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout') }}">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->
    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar" role="navigation">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="{{ url('common/setting') }}"><img src="{{  get_user()->logo }}" alt="" /></a>
                    </div>
                    <div class="info">
                        {{  get_user()->adminname }}
                        <small>Front end developer</small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
        @include('admin.layouts.nav')
        <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <div id="content" class="content">
        @if (session('SYS_INFO'))
            <div class="alert alert-danger">
                {{ session('SYS_INFO') }}
            </div>
        @endif
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        @yield('page.content')
    </div>
    <!-- end #content -->

    <!-- begin theme-panel -->
<div class="theme-panel">
    <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
    <div class="theme-panel-content">
        <h5 class="m-t-0">Color Theme</h5>
        <ul class="theme-list clearfix">
            <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
            <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
            <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
            <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
            <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
            <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
        </ul>
        <div class="divider"></div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label double-line">Header Styling</div>
            <div class="col-md-7">
                <select name="header-styling" class="form-control input-sm">
                    <option value="1">default</option>
                    <option value="2">inverse</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label">Header</div>
            <div class="col-md-7">
                <select name="header-fixed" class="form-control input-sm">
                    <option value="1">fixed</option>
                    <option value="2">default</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label double-line">Sidebar Styling</div>
            <div class="col-md-7">
                <select name="sidebar-styling" class="form-control input-sm">
                    <option value="1">default</option>
                    <option value="2">grid</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label">Sidebar</div>
            <div class="col-md-7">
                <select name="sidebar-fixed" class="form-control input-sm">
                    <option value="1">fixed</option>
                    <option value="2">default</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
            <div class="col-md-7">
                <select name="content-gradient" class="form-control input-sm">
                    <option value="1">disabled</option>
                    <option value="2">enabled</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-5 control-label double-line">Content Styling</div>
            <div class="col-md-7">
                <select name="content-styling" class="form-control input-sm">
                    <option value="1">default</option>
                    <option value="2">black</option>
                </select>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-md-12">
                <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
            </div>
        </div>
    </div>
</div>
<!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ loadStatic('admin/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ loadStatic('admin/crossbrowserjs/html5shiv.js') }}"></script>
<script src="{{ loadStatic('admin/crossbrowserjs/respond.min.js') }}"></script>
<script src="{{ loadStatic('admin/crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ loadStatic('admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ loadStatic('admin/plugins/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ loadStatic('admin/js/dashboard.min.js') }}"></script>
<script src="{{ loadStatic('admin/js/apps.min.js') }}"></script>
<!-- ================== BEGIN TABLE JS ================== -->
<script src="{{ loadStatic('admin/plugins/DataTables/js/jquery.dataTables.js') }}"></script>
<script src="{{ loadStatic('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ loadStatic('admin/js/table-manage-default.demo.min.js') }}"></script>
<!-- ================== END TABLE JS ================== -->
<!-- ================== BEGIN layer JS ================== -->
<script src="{{ loadStatic('common/layer/layer.js') }}"></script>
<!-- ================== END layer JS ================== -->
<!-- ================== BEGIN tag JS ================== -->
<script src="{{ loadStatic('common/tag_input/jquery.tagsinput.min.js') }}"></script>
<!-- ================== END tag JS ================== -->


<!-- ================== END PAGE LEVEL JS ================== -->



@yield('page.js')

<script>
    $(document).ready(function() {
        App.init();
        $('.dropdown-toggle').dropdown();
        //初始化table
        var table =$("#data-table");
        table.dataTable({
            "language": {
                "sProcessing": "读取中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            }
        });
        // bootstrap 居中
        $(".modal").on('show.bs.modal', function(){
            var $this = $(this);
            var $modal_dialog = $this.find('.modal-dialog');
            $this.css('display', 'block');
            $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
        });
    });
</script>
@yield('script.js')
</body>
</html>
