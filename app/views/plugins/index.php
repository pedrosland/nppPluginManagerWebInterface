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
			<th rowspan="2">Name</th>
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
			<td><a href="/plugins/view/<?php echo $plugin->url ?>"><?php echo $plugin->name ?></a></td>
			<td><?php echo $plugin->ansi_version ?></td>
			<td><?php echo $plugin->unicode_version ?></td>
			<td><?php echo Text::limit_chars($plugin->description, 100) ?></td>
			<td><?php echo $plugin->author ?></td>
	<?php if($logged_in === true): ?>
			<td><a href="/plugins/edit/<?php echo $plugin->url ?>">Edit</a></td>
		<?php if($admin === true): ?>
			<td><a href="/plugins/delete/<?php echo $plugin->url ?>" class="admin confirm">Delete</a></td>
		<?php endif ?>
	<?php endif ?>
		</tr>
<?php endforeach ?>
	</tbody>
</table>
<?php else: ?>
<p>There are no plugins at the moment.</p>
<?php endif ?>