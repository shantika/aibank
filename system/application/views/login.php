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
<?php $this->load->view('nav');?>
</div>
<div id="main">
<h2>Please login to Access the Dashboard</h2>
<?php
if ($this->session->flashdata('error')){ 
	echo "<div class='message'>";
	echo $this->session->flashdata('error');
	echo "</div>";
}
?>
<?php
$udata = array('name'=>'username','id'=>'u','size'=>15);
$pdata = array('name'=>'password','id'=>'p','size'=>15);


echo form_open("welcome/index");
echo "<p><label for='u'>Username</label><br/>";
echo form_input($udata) . "</p>";
echo "<p><label for='p'>Password</label><br/>";
echo form_password($pdata) . "</p>";
echo form_submit('submit','login');
echo form_close();
?>
</div>
<div id="footer">
Copyright 2010 CS TEAM
</div>
</div>
</body>
</html>

