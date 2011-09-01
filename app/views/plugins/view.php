<h1><?php echo $plugin->name ?></h1>

<div class="menu rightMenu">
	<?php echo HTML::anchor('plugins/edit/'.$plugin->url, 'Edit') ?>
	<?php echo HTML::anchor('plugins/edit_xml/'.$plugin->url, 'Upload XML') ?>
</div>

<?php if($plugin->description != null): ?>
<div><?php echo Text::auto_p($plugin->description) ?></div>
<?php endif;
if($plugin->latest_update != null): ?>
<h2>Latest updates</h2>
<div><?php echo Text::auto_p($plugin->latest_update) ?></div>
<?php endif ?>
<p>Stability: <?php echo $plugin->stability != null ? $plugin->stability : 'Good' ?></p>
<?php if($plugin->aliases != null): ?>
<p>Aliases: <?php echo $plugin->aliases ?></p>
<?php endif;
if($plugin->dependencies != null): ?>
<p>Dependencies: <?php echo $plugin->dependencies ?></p>
<?php endif;
if($plugin->author != null): ?>
<p>Author: <?php echo $plugin->author ?></p>
<?php endif;
if($plugin->homepage != null): ?>
<p>Homepage: <?php echo HTML::anchor($plugin->homepage) ?></p>
<?php endif;
if($plugin->source_url != null): ?>
<p>Download source: <?php echo HTML::anchor($plugin->source_url) ?></p>
<?php endif;
if($plugin->min_version != null): ?>
<p>Min NPP version: <?php echo $plugin->min_version ?></p>
<?php endif;
if($plugin->max_version != null): ?>
<p>Max NPP version: <?php echo $plugin->max_version ?></p>
<?php endif ?>

<?php if($plugin->unicode_version != null): ?>
<div id="unicode_install">
	<h2>Unicode Install</h2>
	<p>Latest version: <?php echo $plugin->unicode_version ?></p>
	<ol>
	<?php foreach($unicode_install_steps as $step):
		if($step->from !== null): ?>
		<li>Copy from: <?php echo $step->from ?> To: <?php echo $step->to ?> <?php if($step->validate) echo 'Validate ' ?> <?php if($step->backup) echo 'Backup ' ?> <?php if($step->is_dir) echo 'Directory ' ?></li>
		<?php elseif($step->url !== null): ?>
		<li>Download <?php echo HTML::anchor($step->url) ?> MD5: <?php echo $step->md5 ?></li>
		<?php elseif($step->run !== null): ?>
		<li>Run <?php echo $step->run ?> Args: <?php echo $step->arguments ?> <?php if($step->outside) echo 'Outside ' ?></li>
		<?php else: ?>
		<li>Delete <?php echo $step->delete ?></li>
		<?php endif;
	endforeach ?>
	</ol>
	<h2>Unicode Uninstall</h2>
	<ol>
	<?php foreach($unicode_uninstall_steps as $step):
		if($step->from !== null): ?>
		<li>Copy from: <?php echo $step->from ?> To: <?php echo $step->to ?> <?php if($step->validate) echo 'Validate ' ?> <?php if($step->backup) echo 'Backup ' ?> <?php if($step->is_dir) echo 'Directory ' ?></li>
		<?php elseif($step->url !== null): ?>
		<li>Download <?php echo HTML::anchor($step->url) ?> MD5: <?php echo $step->md5 ?></li>
		<?php elseif($step->run !== null): ?>
		<li>Run <?php echo $step->run ?> Args: <?php echo $step->arguments ?> <?php if($step->outside) echo 'Outside ' ?></li>
		<?php else: ?>
		<li>Delete <?php echo $step->delete ?></li>
		<?php endif;
	endforeach ?>
	</ol>
</div>
<?php endif ?>

<?php if($plugin->ansi_version != null): ?>
<div id="ansi_install">
	<h2>ANSI Install</h2>
	<p>Latest version: <?php echo $plugin->ansi_version ?></p>
	<ol>
	<?php foreach($ansi_install_steps as $step):
		if($step->from !== null): ?>
		<li>Copy from: <?php echo $step->from ?> To: <?php echo $step->to ?> <?php if($step->validate) echo 'Validate ' ?> <?php if($step->backup) echo 'Backup ' ?> <?php if($step->is_dir) echo 'Directory ' ?></li>
		<?php elseif($step->url !== null): ?>
		<li>Download <?php echo HTML::anchor($step->url) ?> MD5: <?php echo $step->md5 ?></li>
		<?php elseif($step->run !== null): ?>
		<li>Run <?php echo $step->run ?> Args: <?php echo $step->arguments ?> <?php if($step->outside) echo 'Outside ' ?></li>
		<?php else: ?>
		<li>Delete <?php echo $step->delete ?></li>
		<?php endif;
	endforeach ?>
	</ol>
	<h2>ANSI Uninstall</h2>
	<ol>
	<?php foreach($ansi_uninstall_steps as $step):
		if($step->from !== null): ?>
		<li>Copy from: <?php echo $step->from ?> To: <?php echo $step->to ?> <?php if($step->validate) echo 'Validate ' ?> <?php if($step->backup) echo 'Backup ' ?> <?php if($step->is_dir) echo 'Directory ' ?></li>
		<?php elseif($step->url !== null): ?>
		<li>Download <?php echo HTML::anchor($step->url) ?> MD5: <?php echo $step->md5 ?></li>
		<?php elseif($step->run !== null): ?>
		<li>Run <?php echo $step->run ?> Args: <?php echo $step->arguments ?> <?php if($step->outside) echo 'Outside ' ?></li>
		<?php else: ?>
		<li>Delete <?php echo $step->delete ?></li>
		<?php endif;
	endforeach ?>
	</ol>
</div>
<?php endif ?>