<h1>Update your information.</h1>

<?php if(isset($success) === true): ?>
<p><?php echo $success ?></p>
<?php endif ?>

<?php echo Form::open('users/edit') ?>
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
	<?php echo Form::submit(null, 'Save', array('class' => 'submit')) ?>
</form>
