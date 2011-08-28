<h1>Authorise</h1>

<?php echo Form::open('users/authorise') ?>
	<?php foreach($users as $user) { 
			echo "<br/><a href='authorise/$user->username'>$user->username</a>";
		} ?>
		
	
</form>
