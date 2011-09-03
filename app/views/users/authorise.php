<h1>Authorise</h1>

<?php echo Form::open('users/authorise') ?>
	<ul>
	<?php foreach($users as $user):
		echo '<li>'.HTML::anchor('users/authorise/'.$user->username, $user->username).'</li>';
	endforeach ?>
	</ul>
	
</form>
