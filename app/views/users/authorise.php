<h1>Authorise</h1>

<?php if(isset($authorised) === true): ?>
<p class="success">User <?php echo $authorised; ?> has been authorised.</p>
<?php endif ?>

<?php echo Form::open('users/authorise');
	echo Form::hidden('token', Security::token()) ?>
	<ul class="noBullets spaced">
	<?php foreach($users as $user):
		echo '<li>'.
			Form::submit('username', $user->username, array('class' => 'submit')).
			' ('.Html::chars($user->email).
			')</li>';
	endforeach ?>
	</ul>
	
</form>
