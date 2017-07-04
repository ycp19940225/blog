<?php $__env->startSection('page.content'); ?>
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;"><?php echo e($title); ?></a></li>
        <li class="active"><?php echo e($title); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo e($title); ?>

        <small>
            <button class="btn btn-primary m-l-20" type="button" onclick=" javascript:window.location.href='<?php echo e(url('common/uploadLogo')); ?>' ">修改头像</button>
        </small>
    </h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo e($title); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form action="" class="form-horizontal" role="form" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo e(isset($data['id']) ? $data['id'] : ''); ?>">
                                <label for="name" class="col-xs-4 control-label">账号</label>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="name" name="adminname" value="<?php echo e(isset($data['adminname']) ? $data['adminname'] : ''); ?>" placeholder="请输入名字" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-xs-4 control-label">密码</label>
                                <div class="col-xs-5">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo e(isset($data['password']) ? $data['password'] : ''); ?>" placeholder="请输入密码" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-xs-4 control-label">邮箱</label>
                                <div class="col-xs-5">
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(isset($data['email']) ? $data['email'] : ''); ?>" placeholder="请输入邮箱" >
                                </div>
                            </div>
                            <div class="col-md-offset-5" >
                                <button type="button" class="btn btn-success m-2" id="submit" name="repass">保存</button>
                                <button type="reset" class="btn btn-success m-2" id="reset" name="repass">重置</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>
    <script>
        /**
         * 表单提交
         */
        $("#submit").click(function () {
           var data = validation();
            $.post('<?php echo e(url('common/doSetting')); ?>',data,function (res) {
                handle(res);
            },"json");
        });
        /**
         * 表单验证
         */
        function validation() {
            var password = $("#password").val();
            var repass = $("#repass").val();
            var email = $("#email").val();
            return $("form").serialize();
        }
        /**
         * 结果处理
         */
        function handle(res){
            console.log(res);
            if(res['code'] === 'success'){
                layer.msg(res['msg'],{icon: 6});
                setTimeout('location.href="<?php echo e(url('/admin')); ?>"',2000);
            }else{
                layer.msg(res['msg'],{icon:5});
            }
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>