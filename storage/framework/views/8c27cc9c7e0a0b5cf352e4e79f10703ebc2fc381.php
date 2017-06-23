<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="<?php echo e(loadStatic('admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/css/animate.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/css/style.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/css/style-responsive.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/css/theme2/default.css')); ?>" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo e(loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/plugins/bootstrap-datepicker/css/datepicker.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/plugins/bootstrap-datepicker/css/datepicker3.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(loadStatic('admin/plugins/gritter/css/jquery.gritter.css')); ?>" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo e(loadStatic('admin/plugins/pace/pace.min.js')); ?>"></script>
    <!-- ================== END BASE JS ================== -->


    <!-- ================== BEGIN TABLE JS ================== -->
    <link href="<?php echo e(loadStatic('admin/plugins/DataTables/css/data-table.css')); ?>" rel="stylesheet" />
    <!-- ================== END TABLE JS ================== -->
    <?php echo $__env->yieldContent('page.css'); ?>
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
                                <div class="media-left"><img src="<?php echo e(loadStatic('admin/img/user-1.jpg')); ?>}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">25 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="<?php echo e(loadStatic('admin/img/user-2.jpg')); ?>}" class="media-object" alt="" /></div>
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
                        <img src="<?php echo e(loadStatic('admin/img/user-13.jpg')); ?>}" alt="" />
                        <span class="hidden-xs"> <?php echo e(get_user()); ?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="javascript:;">Edit Profile</a></li>
                        <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                        <li><a href="javascript:;">Calendar</a></li>
                        <li><a href="javascript:;">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(url('admin/logout')); ?>">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="<?php echo e(loadStatic('admin/img/user-13.jpg')); ?>}" alt="" /></a>
                    </div>
                    <div class="info">
                        <?php echo e(get_user()); ?>

                        <small>Front end developer</small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav" id="nav">
                <li class="nav-header">菜单</li>
                <?php $__currentLoopData = config('nav.NAV'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-<?php echo e($v['icon']); ?>"></i>
                        <span><?php echo e($v['name']); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $v['access']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $access): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li ><a href="<?php echo e(url($access['access'])); ?>"><?php echo e($access['name']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <div id="content" class="content">
        <?php echo $__env->yieldContent('page.content'); ?>
    </div>
    <!-- end #content -->

    <!-- begin theme-panel -->

<!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo e(loadStatic('admin/plugins/jquery/jquery-1.9.1.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/jquery/jquery-migrate-1.1.0.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/jquery-ui/ui/minified/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo e(loadStatic('admin/crossbrowserjs/html5shiv.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/crossbrowserjs/respond.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/crossbrowserjs/excanvas.min.js')); ?>"></script>
<![endif]-->
<script src="<?php echo e(loadStatic('admin/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/jquery-cookie/jquery.cookie.js')); ?>"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo e(loadStatic('admin/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/flot/jquery.flot.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/flot/jquery.flot.time.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/flot/jquery.flot.resize.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/flot/jquery.flot.pie.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/sparkline/jquery.sparkline.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/js/dashboard.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/js/apps.min.js')); ?>"></script>
<!-- ================== BEGIN TABLE JS ================== -->
<script src="<?php echo e(loadStatic('admin/plugins/DataTables/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/js/table-manage-default.demo.min.js')); ?>"></script>
<!-- ================== END TABLE JS ================== -->
<!-- ================== BEGIN layer JS ================== -->
<script src="<?php echo e(loadStatic('common/layer/layer.js')); ?>"></script>
<!-- ================== END layer JS ================== -->


<!-- ================== END PAGE LEVEL JS ================== -->



<?php echo $__env->yieldContent('page.js'); ?>

<script>
    $(document).ready(function() {
        var handleSidebarMenu = function () {
            "use strict";
            $(".sidebar .nav > .has-sub > a").click(function () {
                var e = $(this).next(".sub-menu");
                var t = ".sidebar .nav > li.has-sub > .sub-menu";
                if ($(".page-sidebar-minified").length === 0) {
                    $(t).not(e).slideUp(250, function () {
                        $(this).closest("li").removeClass("expand")
                    });
                    $(e).slideToggle(250, function () {
                        var e = $(this).closest("li");
                        if ($(e).hasClass("expand")) {
                            $(e).removeClass("expand")
                        } else {
                            $(e).addClass("expand")
                        }
                    })
                }
            });
            $(".sidebar .nav > .has-sub .sub-menu li.has-sub > a").click(function () {
                if ($(".page-sidebar-minified").length === 0) {
                    var e = $(this).next(".sub-menu");
                    $(e).slideToggle(250)
                }
            })
        };
        handleSidebarMenu();
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
<?php echo $__env->yieldContent('script.js'); ?>
</body>
</html>
