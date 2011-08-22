<?php if($add === true): ?>
<h1>Add a new plugin</h1>
<p>Do not use this for updating your plugin. You can do that by editing your plugin. This is only for adding a new one.</p>
<?php else: ?>
<h1>Edit plugin</h1>
<?php endif;
echo Form::open(null, array('class'=>'ajax')) ?>
	<div>
		<label for="name">Name</label>
		<?php echo Form::input('name', $validate->name, array('id'=>'name')) ?>
	<?php if(isset($errors['name'])): ?>
		<p class="error"><?php echo $errors['name'] ?></p>
	<?php endif ?>
	</div>
	<div class="area">
		<label for="description">Description</label>
		<?php echo Form::textarea('description', $validate->description, array('id'=>'description')) ?>
	<?php if(isset($errors['description'])): ?>
		<p class="error"><?php echo $errors['description'] ?></p>
	<?php else: ?>
		<p class="example">What does your plugin do? What are its best features?</p>
	<?php endif ?>
	</div>
	<div>
		<label for="author">Author</label>
		<?php echo Form::input('author', $validate->author, array('id'=>'author')) ?>
	<?php if(isset($errors['author'])): ?>
		<p class="error"><?php echo $errors['author'] ?></p>
	<?php endif ?>
	</div>
	<div>
		<label for="homepage">Homepage URL</label>
		<?php echo Form::input('homepage', $validate->homepage, array('id'=>'homepage', 'class'=>'wide')) ?>
	<?php if(isset($errors['homepage'])): ?>
		<p class="error"><?php echo $errors['homepage'] ?></p>
	<?php endif ?>
	</div>
	<div>
		<label for="source_url">Source URL</label>
		<?php echo Form::input('source_url', $validate->source_url, array('id'=>'source_url', 'class'=>'wide')) ?>
	<?php if(isset($errors['source_url'])): ?>
		<p class="error"><?php echo $errors['source_url'] ?></p>
	<?php endif ?>
	</div>
	<div class="area">
		<label for="latest_update">Latest Update</label>
		<?php echo Form::textarea('latest_update', $validate->latest_update, array('id'=>'latest_update')) ?>
	<?php if(isset($errors['latest_update'])): ?>
		<p class="error"><?php echo $errors['latest_update'] ?></p>
	<?php else: ?>
		<p class="example">What changes have you made in this update?</p>
	<?php endif ?>
	</div>
	<div>
		<label for="stability">Stability</label>
		<?php echo Form::input('stability', $validate->stability, array('id'=>'stability', 'class'=>'wide')) ?>
	<?php if(isset($errors['stability'])): ?>
		<p class="error"><?php echo $errors['stability'] ?></p>
	<?php else: ?>
		<p class="example">TODO: Find better wording. Usually "Good" or "Bad" but can be something else. Leave empty if unsure.</p>
	<?php endif ?>
	</div>
	<div>
		<label for="aliases">Aliases</label>
		<?php echo Form::input('aliases', $validate->aliases, array('id'=>'aliases', 'class'=>'wide')) ?>
	<?php if(isset($errors['aliases'])): ?>
		<p class="error"><?php echo $errors['aliases'] ?></p>
	<?php else: ?>
		<p class="example">Did your plugin change its name? Seperate them with commas.</p>
	<?php endif ?>
	</div>
	<div>
		<label for="dependencies">Dependencies</label>
		<?php echo Form::input('dependencies', $validate->dependencies, array('id'=>'dependencies', 'class'=>'wide')) ?>
	<?php if(isset($errors['dependencies'])): ?>
		<p class="error"><?php echo $errors['dependencies'] ?></p>
	<?php else: ?>
		<p class="example">What other plugins does this plugin rely on eg PythonScript. Seperate them with commas.</p>
	<?php endif ?>
	</div>
	<div>
		<label for="min_version">Min Npp Version</label>
		<?php echo Form::input('min_version', $validate->min_version, array('id'=>'min_version')) ?>
	<?php if(isset($errors['min_version'])): ?>
		<p class="error"><?php echo $errors['min_version'] ?></p>
	<?php endif ?>
	</div>
	<div>
		<label for="max_version">Max Npp Version</label>
		<?php echo Form::input('max_version', $validate->max_version, array('id'=>'max_version')) ?>
	<?php if(isset($errors['max_version'])): ?>
		<p class="error"><?php echo $errors['max_version'] ?></p>
	<?php endif ?>
	</div>
	<fieldset id="versions">
		<legend>Versions</legend>
		<p>If your plugin reports an incorrect version this can be used to override it. The comment is optional.</p>
	<?php if(isset($versions) === true && count($versions) > 0):
		foreach($versions as $key=>$version): ?>
		<div class="version">
			<div>
				<label for="md5_<?php echo $key ?>">MD5</label>
				<?php echo Form::input('version['.$key.'][md5]', $version->md5, array('class' => 'wide', 'id' => 'md5_'.$key)) ?>
			</div>
			<div>
				<label for="version_<?php echo $key ?>">Version</label>
				<?php echo Form::input('version['.$key.'][number]', $version->number, array('id' => 'version_'.$key)) ?>
			</div>
			<div>
				<label for="comment_<?php echo $key ?>">Comment</label>
				<?php echo Form::input('version['.$key.'][comment]', $version->comment, array('class' => 'wide', 'id' => 'comment_'.$key)) ?>
			</div>
		</div>
		<?php endforeach;
	endif ?>
	</fieldset>
	<div class="noPad">
		<fieldset id="unicode">
			<legend>Unicode</legend>
			<div>
				<label for="unicode_version">Version</label>
				<?php echo Form::input('unicode_version', $validate->unicode_version, array('id'=>'unicode_version')) ?>
			<?php if(isset($errors['unicode_version'])): ?>
				<p class="error"><?php echo $errors['unicode_version'] ?></p>
			<?php else: ?>
				<p class="example">eg v1.5 or v1.2.3.456. It must contain one "." and max of 3.</p>
			<?php endif ?>
			</div>
			<h2>Install</h2>
			<div class="steps">
			<?php foreach($unicode_install_steps as $key=>$step):
				echo View::factory('snips/steps')->set('step', $step)->set('key', $key);
			endforeach ?>
			</div>
			<h2>Uninstall</h2>
			<div class="steps">
			<?php foreach($unicode_uninstall_steps as $key=>$step):
				echo View::factory('snips/steps')->set('step', $step)->set('key', $key);
			endforeach ?>
			</div>
		</fieldset>
	</div>
	<div class="noPad">
		<fieldset id="ansi">
			<legend>ANSI</legend>
			<div>
				<label for="ansi_version">Version</label>
				<?php echo Form::input('ansi_version', $validate->ansi_version, array('id'=>'ansi_version')) ?>
			<?php if(isset($errors['ansi_version'])): ?>
				<p class="error"><?php echo $errors['ansi_version'] ?></p>
			<?php else: ?>
				<p class="example">eg v1.5 or v1.2.3.456. It must contain one "." and max of 3.</p>
			<?php endif ?>
			</div>
			<h2>Install</h2>
			<div class="steps">
			<?php foreach($ansi_install_steps as $key=>$step):
				echo View::factory('snips/steps')->set('step', $step)->set('key', $key);
			endforeach ?>
			</div>
			<h2>Uninstall</h2>
			<div class="steps">
			<?php foreach($ansi_uninstall_steps as $key=>$step):
				echo View::factory('snips/steps')->set('step', $step)->set('key', $key);
			endforeach ?>
			</div>
		</fieldset>
	</div>
	<div>
		<?php echo Form::submit(null, $add === true ? 'Add new plugin' : 'Edit plugin') ?>
	</div>
</form>