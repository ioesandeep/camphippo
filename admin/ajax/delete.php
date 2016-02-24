<?php
	
	require 'init.php';

	$id = $_REQUEST['id'];
	$table = $_REQUEST['table'];
	
	$where = sprintf('id = %d', $id);
	table_delete_row($table, $where);
	
	if ($table == 'home_blocks') {
		$img_path = get_image_path('home_blocks/' . $id, true);
		@unlink($img_path);
	}
	
	if ($table == 'sponsers') {
		$img_path = get_image_path('sponsers/' . $id, true);
		@unlink($img_path);
	}
	
	if ($table == 'photos') {
		$img_path = get_image_path('photos/' . $id, true);
		@unlink($img_path);
	}
	
?>