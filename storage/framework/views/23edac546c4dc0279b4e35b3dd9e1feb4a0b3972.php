<?php $__env->startSection('page.css'); ?>
    <link href="<?php echo e(loadStatic('admin/css/multree.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page.content'); ?>
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:">Home</a></li>
        <li><a href="javascript:"><?php echo e($title); ?></a></li>
        <li class="active"><?php echo e($title); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?php echo e($title); ?>


    </h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo e($title); ?></h4>
                </div>
                <div class="panel-body">
                    <button class="btn btn-info" href="javaScript:void(0);" onclick="refresh()">刷新权限</button>
                        <form method="post" action="<?php echo e(route('update_pri_role')); ?>" class="form-horizontal" >
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($role_id); ?>">

                            <div class="form-group">
                                <label class="col-md-3 control-label">当前角色</label>
                                <div class="col-md-9">
                                    <label>
                                        <input type="text" class="form-control" disabled="disabled"
                                               value="<?php echo e($role['role_name']); ?>">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">权限选择</label>
                                <div class="col-md-9">
                                    <label for="accessTree"></label>
                                    <select id="accessTree" name="access[]" multiple="multiple" class="form-control">
                                        <?php $__currentLoopData = $pris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(isset($v['id']) ? $v['id'] : ''); ?>"
                                                    data-id="<?php echo e(isset($v['id']) ? $v['id'] : ''); ?>"
                                                    data-pid="<?php echo e(isset($v['parent_id']) ? $v['parent_id'] : ''); ?>"
                                                    <?php echo e(isset($v['selected']) ? $v['selected'] : ''); ?>

                                                    <?php echo e(isset($v['disabled']) ? $v['disabled'] : ''); ?>

                                                    ><?php echo e(isset($v['pri_name']) ? $v['pri_name'] : ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-sm btn-success">确定提交</button>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page.js'); ?>
    <script src="<?php echo e(loadStatic('admin/js/multree.js')); ?>"></script>
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
                $.post("<?php echo e(url('admin/role/delete')); ?>",data,function (res) {
                    console.log(res);
                    if(res['code'] === 'success'){
                        layer.msg(res['msg'],{icon: 6});
                        setTimeout('location.href="<?php echo e(url('admin/role/index')); ?>"',2000);
                    }else{
                        layer.msg(res['msg'],{icon:5});
                    }
                },"json");
            });
        }
        /**
         * 刷新权限
         */
        function refresh() {
            $.get('<?php echo e(route('pri-refresh')); ?>',function (res) {
                if(res['code'] === 'success'){
                    layer.msg(res['msg'],{icon: 6});
                    setTimeout('window.location.reload()',1000);
                }else{
                    layer.msg(res['msg'],{icon:5});
                }
            });
        }
        /**
         * 初始化树形结构
         */
        $("#accessTree").mulTree();
        $("submit").click(function () {
            var url = $("form").attr('action');
            console.log(url);return;

        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>