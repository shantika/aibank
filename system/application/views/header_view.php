<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title><?php echo $title; ?></title>
<base href= <?php echo "$base"; ?> >
<link href="<?php echo $base;?>includes/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="contmain">
<div id="logo">
	<h1><a href=<?php echo "$base"; ?>>ARTIFICIAL INTELLIGENCE BANK</a></h1>
	<h2><a href="http://www.mrbachkhoa.org/">Design by CS TEAM</a></h2>
</div>
<div id="left1">
	<div id="right1">
<div id="header"> 
	<div id="menu">
		<ul>
			<li><a href="<?php echo "$base"; ?>index.php/home">Home</a></li>
			<li><a href="<?php echo "$base"."about"; ?>">About</a></li>
			<li><a href="#">Contact</a></li>
            <li><a href="
            <?php
                $status = $this->session->userdata('status');
                $tmp = (isset($status) && $status=='OK')? 
                $base."index.php/home/logout\">Log out, ".$this->session->userdata('name'): 
                $base."\">Log in";
                echo $tmp;
            ?></a></li>
		</ul>
	</div>	
<!-- end header -->
</div>
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
    <div class="entry">