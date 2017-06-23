<?php $__env->startSection('page.css'); ?>
    <link href="<?php echo e(loadStatic('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" />
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('page.content'); ?>
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:void 0;">Home</a></li>
        <li><a href="javascript:void 0;"><?php echo e($title); ?></a></li>
        <li class="active"><?php echo e($title); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo e($title); ?>

        <small>
            <button class="btn btn-primary m-l-20" type="button" onclick=" window.location.href='/admin/role/add' ">添加角色</button>
        </small>
    </h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:void 0;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:void 0;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:void 0;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:void 0;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo e($title); ?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>角色名</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($v['id']); ?></td>
                                <td><?php echo e($v['role_name']); ?></td>
                                <td><?php echo e($v['created_at']); ?></td>
                                <td>
                                    <p>
                                        <label>
                                            <input type="checkbox" name="status" class="js-switch " value="1" <?php echo e($v['checked']); ?> data-id="<?php echo e($v['id']); ?>"/>
                                        </label>
                                    </p>
                                </td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page.js'); ?>
    <script src="<?php echo e(loadStatic('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>

    <script>
        $(function () {
            $('[name="status"]').bootstrapSwitch({
                onText:"开启",
                offText:"关闭",
                onColor:"success",
                offColor:"info",
                size:"small",
                onSwitchChange:function(event,state){
                    var id = $(this).attr('data-id');
                    var data;
                    if(state==true){
                        $(this).val("1");
                        data = {
                            role_id:id,
                            admin_id:'<?php echo e($user_id); ?>',
                            status:$(this).val(),
                            _token:'<?php echo e(csrf_token()); ?>'
                        };
                        console.log(data);
                        $.post("<?php echo e(url('admin/user/addUserOperate')); ?>",data,function (res) {
                            
                        });
                    }else{
                        $(this).val("0");
                        data = {
                            role_id:id,
                            admin_id:'<?php echo e($user_id); ?>',
                            status:$(this).val(),
                            _token:'<?php echo e(csrf_token()); ?>'
                        };
                        $.post("<?php echo e(url('admin/user/addUserOperate')); ?>",data,function (res) {

                        });
                    }
                }
            })
        });
        /**
         * 删除
         * @param  i
         */
        $("input[type='checkbox']").click(function () {
            
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>