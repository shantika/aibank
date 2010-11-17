<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url();?>includes/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
  		<div id="header">
			<div id='globalnav'>
				<ul>
					<li><?php echo anchor("admin/dashboard/index","home");?></li>
					<li><?php echo anchor("admin/admins/", "admins");?></li>
					<li><?php echo anchor("admin/customers/", "customers");?></li>
					<li><?php echo anchor("admin/customers/training", "training");?></li>
					<li><?php echo anchor("admin/dashboard/logout/", "logout");?></li>
				</ul>
			</div>
       	</div>

