<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/roboto.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/select2.min.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/jquery.toast.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo URL ?>/styles/css/ace-rtl.min.css" />
		<link rel="shortcut icon" href="<?php echo URL ?>/styles/images/logo.png' ?>" />
		<script src="<?php echo URL ?>/styles/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/ace-extra.min.js"></script>
		<script src="<?php echo URL ?>/public./scripts/library.js"></script>
		<script>
			var baseUrl = '<?php echo URL ?>';
		</script>
	</head>

	<body class="no-skin">
        <!--BEGIN navbar-->
        <?php include('navbar.php') ?>
        <!--END navbar-->

        <div class="main-container ace-save-state" id="main-container">
			<!--BEGIN sidebar-->
            <?php include('sidebar.php') ?>
            <!--END sidebar-->