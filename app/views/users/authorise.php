<h1>Authorise</h1>

<?php echo Form::open('users/authorise');
	echo Form::hidden('token', Security::token()) ?>
	<ul>
	<?php foreach($users as $user):
		echo '<li>'.Form::submit($user->username, $user->username).'</li>';
	endforeach ?>
	</ul>
	
</form>
