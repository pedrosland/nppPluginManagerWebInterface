<h1>Log in</h1>

<?php if(isset($error) === false): ?>
<p>You must be logged in to use this site.</p>
<?php else: ?>
<p><?php echo $error ?></p>
<?php endif ?>

<?php echo Form::open('users/login') ?>
	<div>
		<label for="username">Username</label>
		<?php echo Form::input('username', '', array('id'=>'username')) ?>
	</div>
	<div>
		<label for="pass">Password</label>
		<?php echo Form::password('password', '', array('id'=>'pass')) ?>
	</div>
	
	<?php echo Form::hidden('from', $from);
	      echo Form::submit(null, 'Log in', array('class' => 'submit')) ?>
</form>
