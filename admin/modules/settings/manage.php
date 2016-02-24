<?php
	
	$messages = array();
	if (isset($_POST['save'])) {
		
		foreach ($_POST as $name => $value) {
			if (strpos($name, 'setting-') !== false) {
				save_setting($name, $value);
			}
		}
		
		$messages[] = 'Saved successfully.';
	}
	
?>

<form class="validate-form" method="post">
<table>
<thead>
<tr>
	<th colspan="2"><h1>Settings</h1></th>
</tr>
<tr>
    <td colspan="2"><?php show_messages($messages); ?></td>
</tr>
</thead>
<tbody>
<?php
	$rows = table_fetch_rows(TBL_SETTINGS, '', 'id ASC');
	
	foreach ($rows as $row) {
?>
<tr>
	<td><?php translate($row['label']); ?>:</td>
    <td><?php draw_settings_control($row); ?></td>
</tr>
<?php
	}
?>
</tbody>
<tfoot>
<tr>
	<td></td>
    <td><?php show_big_button('save', 'Save'); ?></td>
</tr>
</tfoot>
</table>
</form>