<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php echo (isset($this->title)) ? $this->title : 'MVC'; ?>
	</title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery.ui.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	<script
	  	src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
	  	integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
	  	crossorigin="anonymous"></script>
	<?php if (isset($this->js)): ?>
		<?php foreach ($this->js as $js): ?>
			<script src="<?php echo URL . 'views/' . $js; ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
	<div id="header">
		<?php if (Session::get('loggedIn') == false): ?>
			<a href="<?php echo URL; ?>index">Index</a>
			<a href="<?php echo URL; ?>help">Help</a>
		<?php endif; ?>
		
		<?php if (Session::get('loggedIn') === true): ?>
			<a href="<?php echo URL; ?>dashboard">Dashboard</a>
			<a href="<?php echo URL; ?>note">Notes</a>
			
			<?php if (Session::get('role') == 'owner'): ?>
				<a href="<?php echo URL; ?>user">Users</a>
			<?php endif; ?>
			
			<a href="<?php echo URL; ?>dashboard/logout">Logout</a>
		<?php else: ?>
			<a href="<?php echo URL; ?>login">Login</a>
		<?php endif; ?>
	</div>
	
	<div id="content">