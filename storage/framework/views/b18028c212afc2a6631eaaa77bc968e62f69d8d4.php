<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo e(loadStatic('admin/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(loadStatic('admin/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(loadStatic('admin/css/animate.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(loadStatic('admin/css/style.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(loadStatic('admin/css/style-responsive.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(loadStatic('admin/css/theme/default.css')); ?>" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
	<div class="login-cover-image"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-1.jpg')); ?>" data-id="login-cover-image" alt="" /></div>
	<div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
	<!-- begin login -->
	<div class="login login-v2" data-pageload-addclass="animated flipInX">
		<!-- begin brand -->
		<div class="login-header">
			<div class="brand">
				<span class="logo"></span> Color Admin
				<small>responsive bootstrap 3 admin template</small>
			</div>
			<div class="icon">
				<i class="fa fa-sign-in"></i>
			</div>
		</div>
		<!-- end brand -->
		<div class="login-content">
			<?php if(session('error')): ?>
				<div class="alert alert-danger">
					<?php echo e(session('error')); ?>

				</div>
			<?php endif; ?>
				<?php if(session('status')): ?>
					<div class="alert alert-success">
						<?php echo e(session('status')); ?>

					</div>
				<?php endif; ?>
			<form action="<?php echo e(url('admin/doLogin')); ?>" method="POST" class="margin-bottom-0">
				<?php echo e(csrf_field()); ?>

				<div class="form-group m-b-20">
					<input type="text" name="adminname" class="form-control input-lg" placeholder="请输入账户名" required/>
				</div>
				<div class="form-group m-b-20">
					<input type="password" name="password" class="form-control input-lg" placeholder="请输入账户密码" required/>
				</div>
				<div class="form-group code">
					<label>
						<input class="form-control input-md" name="captcha"  placeholder="请输入验证码" required>
					</label>
					<img src="<?php echo e(captcha_src()); ?>" onclick="javaScript:$(this).attr('src','<?php echo e(captcha_src()); ?>'+Math.random())">
				</div>
				<div class="checkbox m-b-20">
					<label>
						<input type="checkbox" /> Remember Me
					</label>
				</div>
				<div class="login-buttons">
					<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
				</div>
				<div class="m-t-20">
					Not a member yet? Click <a href="#">here</a> to register.
				</div>
			</form>
		</div>
	</div>
	<!-- end login -->

	<ul class="login-bg-list">
		<li class="active"><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-1.jpg')); ?>" alt="" /></a></li>
		<li><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-2.jpg')); ?>" alt="" /></a></li>
		<li><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-3.jpg')); ?>" alt="" /></a></li>
		<li><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-4.jpg')); ?>" alt="" /></a></li>
		<li><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-5.jpg')); ?>" alt="" /></a></li>
		<li><a href="#" data-click="change-bg"><img src="<?php echo e(loadStatic('admin/img/login-bg/bg-6.jpg')); ?>" alt="" /></a></li>
	</ul>

	<!-- begin theme-panel -->
	<!-- end theme-panel -->
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
<script src="<?php echo e(loadStatic('admin/js/login-v2.demo.min.js')); ?>"></script>
<script src="<?php echo e(loadStatic('admin/js/apps.min.js')); ?>"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>
</body>
</html>
