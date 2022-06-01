<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>LongBien - Hight School</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/roboto.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/jquery.toast.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo URL.'/styles' ?>/css/ace-rtl.min.css" />
		<script src="<?php echo URL.'/styles' ?>/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo URL.'/styles' ?>/js/jquery.toast.js"></script>
		<script src="<?php echo URL.'/public' ?>/javascript/library.js"></script>
		<script>
			var baseUrl = '<?php echo URL ?>';
		</script>
	</head>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">LB</span>
									<span class="white" id="id-text2">Hight School</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; THCS Long Biên</h4>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Nhập thông tin để đăng nhập
											</h4>
											<div class="space-6"></div>
											<form id="login" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id="username"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Ghi nhớ tôi</span>
														</label>
														<button type="button" class="width-45 pull-right btn btn-sm btn-primary"onclick="login()" >
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Đăng nhập</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
											<div class="social-or-login center">
												<span class="bigger-110">Social</span>
											</div>
											<div class="space-6"></div>
											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>
												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>
												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>
										</div><!-- /.widget-main -->
										<div class="toolbar clearfix">
											<div>
												<a href="javascript:void(0)" data-target="#forgot-box" class="forgot-password-link">
													Trường THCS Long Biên - Quận Long Biên
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="javascript:void(0)">Tối</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="javascript:void(0)">Xanh</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="javascript:void(0)">Sáng</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<script src="<?php echo URL.'/public' ?>/javascript/login.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo URL.'/styles' ?>/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
