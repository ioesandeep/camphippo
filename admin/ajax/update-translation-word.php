<?php
	
	require 'init.php';

	$id = $_REQUEST['id'];
	$table = TBL_TRANSLATIONS;
	
	$fields = array('translation');
	$values = array('translation' => $_REQUEST['translation']);
	
	$where = sprintf('id = %d', $id);
	table_update($table, $fields, $values, $where)

?>