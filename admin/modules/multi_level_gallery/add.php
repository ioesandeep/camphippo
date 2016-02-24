<?php
	
	$messages = array();
	if (isset($_POST['submitted'])) {
		
		$fields = array('parent_id', 'name');
		
		table_insert('multi_level_gallery', $fields, $_POST);
		$messages[] = 'Saved successfully.';
	}
	
?>

<form class="validate-form" method="post" enctype="multipart/form-data">

<input type="hidden" name="submitted" value="1" />
	
<table>
<tr>
	<td colspan="2"><h1>Add Multi Level Gallery</h1></td>
</tr>

<tr>
	<td colspan="2"><?php show_messages($messages); ?></td>
</tr>

<tr style="display: none;">
  <td><?php translate('Parent'); ?>:</td>
  <td>
  	<?php
		$first_node = array('id' => -1, 'name' => '--');
		$list = table_fetch_rows('multi_level_gallery', '', 'parent_id ASC, position ASC');
		
		$tree = get_parent_child_array($list);
		show_tree($tree, 'parent_id', 'select', 'id', 'name', $first_node);
	?>
  </td>
</tr>
<tr>
	<td>Name:</td>
	<td><input size="50" type="text" id="name" name="name" value="" class="required"  /></td>
</tr>


<tr>
	<td></td>
	<td><?php show_big_button('save', 'Save'); ?></td>
</tr>	
</table>
</form>