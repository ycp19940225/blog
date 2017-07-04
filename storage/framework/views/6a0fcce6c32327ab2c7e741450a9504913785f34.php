<?php $__env->startSection('page.content'); ?>
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Extra</a></li>
        <li class="active">Search Results</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Search Results <small>3 results found</small></h1>
    <div class="panel">
        <div class="row">
            <form action="" class="form-horizontal" role="form" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="name" class="col-xs-4 control-label">账号</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" id="name" name="adminname" placeholder="请输入名字">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-xs-4 control-label">密码</label>
                    <div class="col-xs-5">
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="repass" class="col-xs-4 control-label">确认密码</label>
                    <div class="col-xs-5">
                        <input type="password" class="form-control" id="repass" name="repass" placeholder="确认密码">
                    </div>
                </div>
                <div class="col-md-offset-5" >
                        <button type="button" class="btn btn-success m-2" id="repass" name="repass">保存</button>
                        <button type="reset" class="btn btn-success m-2" id="repass" name="repass">重置</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>
    <script>
        $("button").click(function () {
            $("form").submit();
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>