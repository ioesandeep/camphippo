<?php
	
	$id = get_id();
	$where = sprintf('id = %d', $id);
	
	$messages = array();
	if (isset($_POST['submitted'])) {
		
		$fields = array('parent_id', 'name');
		
		table_update('multi_level_gallery', $fields, $_POST, $where);
		$messages[] = 'Saved successfully.';
	}
	
	$row = table_fetch_row('multi_level_gallery', $where);	
?>

<form class="validate-form" method="post" enctype="multipart/form-data">

<input type="hidden" name="submitted" value="1" />
	
<table>
<tr>
	<td colspan="2"><h1>Edit Multi Level Gallery</h1></td>
</tr>

<tr>
	<td colspan="2"><?php show_messages($messages); ?></td>
</tr>

<tr style="display: none;">
  <td><?php translate('Parent'); ?>:</td>
  <td>
  	<?php
		$first_node = array('id' => -1, 'name' => '--');
		$where = sprintf('id NOT IN (%d)', $id);
		$list = table_fetch_rows('multi_level_gallery', $where, 'parent_id ASC, position ASC');
		
		$tree = get_parent_child_array($list);
		show_tree($tree, 'parent_id', 'select', 'id', 'name', $first_node, array($row['parent_id']));
	?>
  </td>
</tr>
<tr>
	<td>Name:</td>
	<td><input size="50" type="text" id="name" name="name" value="<?php echo stripcslashes($row['name']); ?>" class="required"  /></td>
</tr>


<tr>
	<td></td>
	<td><?php show_big_button('save', 'Save'); ?></td>
</tr>	
</table>
</form>