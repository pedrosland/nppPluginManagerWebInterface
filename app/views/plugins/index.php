<h1>Plugins</h1>

<div class="menu">
	<?php echo HTML::anchor('plugins/add', 'Add a new plugin') ?> 
	<?php echo HTML::anchor('plugins/add_xml', 'Add a new plugin from XML') ?> 
	<?php echo HTML::anchor('plugins/generate_xml?download=1', 'Download XML file') ?>
	<?php echo HTML::anchor('plugins/generate_sql?download=1', 'Download SQL file') ?>
</div>

<?php if(count($plugins) > 0): ?>
<table class="w100">
	<thead>
		<tr>
			<th rowspan="2"><?php echo HTML::anchor('plugins/?order=lastmod', 'Last Modified') ?></th>
			<th rowspan="2"><?php echo HTML::anchor('plugins/', 'Name') ?></th>
			<th colspan="2">Latest Version</th>
			<th rowspan="2">Description</th>
			<th rowspan="2">Author</th>
	<?php if($logged_in === true): ?>
			<th rowspan="2">Edit</th>
		<?php if($admin === true): ?>
			<th rowspan="2">Delete</th>
		<?php endif ?>
	<?php endif ?>
		</tr>
		<tr>
			<th>ANSI</th>
			<th>Unicode</th>
		</tr>
	</thead>
	<tbody>
<?php foreach($plugins as $plugin): ?>
		<tr>
			<td><?php echo $plugin->last_modified ?></td>
			
			<td><?php echo HTML::anchor('plugins/view/' . $plugin->url, $plugin->name) ?></td>
			<td><?php echo $plugin->ansi_version ?></td>
			<td><?php echo $plugin->unicode_version ?></td>
			<td><?php echo Text::limit_chars($plugin->description, 100) ?></td>
			<td><?php echo $plugin->author ?></td>
	<?php if($logged_in === true): ?>
			<td><?php echo HTML::anchor('plugins/edit/' . $plugin->url, 'Edit') ?></td>
		<?php if($admin === true): ?>
			<td><?php echo HTML::anchor('plugins/delete/' . $plugin->url, 'Delete', array('class'=>'admin confirm')) ?></td>
		<?php endif ?>
	<?php endif ?>
		</tr>
<?php endforeach ?>
	</tbody>
</table>
<?php else: ?>
<p>There are no plugins at the moment.</p>
<?php endif ?>
