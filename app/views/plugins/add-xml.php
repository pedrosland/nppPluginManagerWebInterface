<h1>Add new plugin from XML</h1><?php echo Form::open();if(isset($error) === true): ?><p class="error no-indent"><?php echo $error ?></p>
<?php endif ?>	<div>
		<label for="xml">Paste your XML here</label>
		<textarea id="xml" name="xml" class="wide"><?php echo isset($xml) === true ? Html::chars($xml) : '' ?></textarea>	</div>	<?php echo Form::submit(null, 'Add new plugin') ?>
</form>