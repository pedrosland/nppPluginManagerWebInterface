<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title>Notepad++ Plugins</title>
	
	<link rel="stylesheet" type="text/css" href="/npp/pm/admin/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="/npp/pm/admin/css/jquery-ui-1.8.15.custom.css" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/npp/pm/admin/js/script.js"></script>
<?php if($admin === true): ?>
	<script type="text/javascript" src="/npp/pm/admin/js/admin.js"></script>
<?php endif ?>
</head>
<body>
<div id="header">
	<div id="hcontent">
		<?php echo HTML::anchor('plugins', 'Npp Plugins Repository', array('id'=>'logo')) ?>
<?php if($logged_in !== true): ?>
		<div id="login">
			<?php echo Form::open('users/login') ?>
				<label for="l_username">Username</label>
				<?php echo Form::input('username', '', array('id'=>'l_username', 'placeholder'=>'username')) ?>
				<label for="l_pass">Password</label>
				<?php echo Form::password('password', '', array('id'=>'l_pass', 'placeholder'=>'password')) ?>
				<?php echo Form::submit(null, 'Log in', array('class' => 'submit')) ?>
			</form>
		</div>
<?php else: ?>
		<div id="user">
	<?php if($admin === true): ?>
			<span class="admin">Admin</span>
	<?php endif ?>
			<span id="l_username"><?php echo $user->username ?></span>
			<?php echo HTML::anchor('users/logout', 'Log out') ?>
		</div>
<?php endif ?>
	</div>
</div>
<div id="body">
<?php echo $body ?>
</div>
</body>
</html>
