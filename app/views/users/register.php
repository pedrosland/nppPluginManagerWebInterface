<h1>Register</h1>

<?php echo Form::open('users/register') ?>
	<div>
		<label for="username">Username</label>
		<?php echo Form::input('username', '', array('id'=>'username')) ?>
		<?php if(isset($errors, $errors['username']) === true): ?>
			<p class="error"><?php echo $errors['username'] ?></p>
		<?php endif ?>
	</div>
	<div>
		<label for="email">Email</label>
		<?php echo Form::input('email', '', array('id'=>'email')) ?>
		<?php if(isset($errors, $errors['email']) === true): ?>
			<p class="error"><?php echo $errors['email'] ?></p>
		<?php endif ?>
	</div>
	<div>
		<label for="pass">Password</label>
		<?php echo Form::password('password', '', array('id'=>'pass')) ?>
		<?php if(isset($errors, $errors['password']) === true): ?>
			<p class="error"><?php echo $errors['password'] ?></p>
		<?php endif ?>
	</div>
	<div>
		<label for="confirm_pass">Confirm password</label>
		<?php echo Form::password('password_confirm', '', array('id'=>'confirm_pass')) ?>
		<?php if(isset($errors, $errors['password_confirm']) === true): ?>
			<p class="error"><?php echo $errors['password_confirm'] ?></p>
		<?php endif ?>
	</div>
	<?php echo Form::submit(null, 'Register', array('class' => 'submit')) ?>
</form>
