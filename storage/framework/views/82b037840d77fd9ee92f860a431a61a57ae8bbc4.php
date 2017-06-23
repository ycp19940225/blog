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
            <button class="btn btn-primary m-l-20" type="button" onclick=" window.location.href='/admin/admin/add' ">添加用户</button>
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
                    <div class="table-responsive">
                        <table id="data-table" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>账号</th>
                                <th>角色</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($v['id']); ?></td>
                                <td><?php echo e($v['adminname']); ?></td>
                                <td>
                                    <?php $__currentLoopData = $v->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(isset($role->role_name) ? $role->role_name : ''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($v['created_at']); ?></td>
                                <td><?php echo e($v['updated_at']); ?></td>
                                <td>
                                    <a class="btn btn-info btn-xs m-2 detail" href="<?php echo e(url('admin/admin/edit',['id'=>$v['id']])); ?>" >编辑</a>
                                    <a href="JavaScript:void(0)" onclick="del(<?php echo e($v['id']); ?>)" class="btn btn-danger btn-xs m-2 delete" >删除</a>
                                    <a href="<?php echo e(url('admin/role/addUser',['id'=>$v['id']])); ?>" class="btn btn-success btn-xs m-2 delete" >角色</a>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>
    <script>
        /**
         * 删除
         * @param  i
         */
        function del(i) {
            //询问框
            layer.confirm('是否删除？', {
                title:'确认操作',
                btn: ['是','否'] //按钮
            }, function(){
                var _token =  "<?php echo e(csrf_token()); ?>";
                var data = {
                    id:i,
                    _token: _token
                };
                console.log(data);
                $.post("<?php echo e(url('admin/admin/delete')); ?>",data,function (res) {
                    console.log(res);
                    if(res['code'] === 'success'){
                        layer.msg(res['msg'],{icon: 6});
                        setTimeout('location.href="<?php echo e(url('admin/admin/index')); ?>"',2000);
                    }else{
                        layer.msg(res['msg'],{icon:5});
                    }
                },"json");
            });
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>