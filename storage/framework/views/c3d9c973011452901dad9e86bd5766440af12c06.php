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
            <button class="btn btn-primary m-l-20" type="button" onclick=" javascript:window.location.href='<?php echo e(url('/admin')); ?>' ">返回主页</button>
        </small>
    </h1>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <!-- end panel -->
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
                        <form id="fileupload" action="<?php echo e(url('common/upLogo')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8 img-upload-group">
                                    <span>头像</span>
                                    <p><div id="image-preview" style="border: 1px solid #ccc; width:200px; height: 200px; background: rgb(222, 222, 222)">
                                        <img id="img" src="" alt="" style="width:200px; height: 200px;">
                                    </div>
                                    <p>
                                        <a href="javascript:;" class="file">选择文件
                                            <input type="file" id="image-file" name="logo">
                                        </a>
                                    </p>
                                    <p id="file-info"></p>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-4" >
                                    <button type="submit" class="btn btn-success m-2" id="submit" name="repass">保存</button>
                                    <button type="reset" class="btn btn-success m-2" id="reset" name="repass">重置</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- end col-12 -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page.js'); ?>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo e(loadStatic('admin/js/extend/upload.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            upload.init();
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>