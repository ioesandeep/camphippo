<?php

require '../application.php';

if (!empty($_FILES)) {
	
	$temp_file = $_FILES['Filedata']['tmp_name'];
	$target_path = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'];

	$ref_id = $_REQUEST['ref_id'];
	$table = $_REQUEST['table'];
	$field = $_REQUEST['field'];

	$restricted_mime_types = array(
									'txt' => 'text/plain',
									'htm' => 'text/html',
									'html' => 'text/html',
									'php' => 'application/octet-stream',
									'css' => 'text/css',
									'js' => 'application/javascript',
									'json' => 'application/json',
									'xml' => 'application/xml',
									'swf' => 'application/x-shockwave-flash',
									'flv' => 'video/x-flv',
									
									// archives
									'zip' => 'application/zip',
									'rar' => 'application/x-rar-compressed',
									'exe' => 'application/x-msdownload',
									'msi' => 'application/x-msdownload',
									'cab' => 'application/vnd.ms-cab-compressed'
								);
	
	$image = getimagesize($_FILES['Filedata']['tmp_name']);	
	$mime_type = $image['mime'];
	
	if (!$mime_type || in_array($mime_type, $restricted_mime_types)) {
		echo 1;
		die();
	}
	
	$sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $field, $ref_id);
	mysql_query($sql, $db);
	$id = mysql_insert_id($db);
	
	$ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);
	$target_file =  $target_path . $id . '.' . strtolower($ext);
	
	move_uploaded_file($temp_file, $target_file);
}

echo 1;

?>