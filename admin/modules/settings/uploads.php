<?php

function directory_file_list($dir_path)
{
	$arr = array();
	
	$dh = opendir($dir_path);
	
	while (($file = readdir($dh)) !== false) {
		if($file != "." && $file != "..") {
			if (is_dir($dir_path . $file)) {
				$arr[] = $dir_path . $file;
				$arr = array_merge($arr, directory_file_list($dir_path . $file . DIRECTORY_SEPARATOR));
			} else {
				$arr[] = $dir_path . $file;
			}
		}
	}
	
	closedir($dh);
	
	return $arr;
}

$files_to_zip = directory_file_list(UPLOADS_DIR);

for ($i = 0; $i < count($files_to_zip); $i++) {
	$files_to_zip[$i] = str_replace(SITE_DIR, '..' . DIRECTORY_SEPARATOR, $files_to_zip[$i]);
}

$destination_file = ADMIN_DIR . 'temp/uploads.zip';
$zip = new ZipArchive();

if ($zip->open($destination_file, ZipArchive::CREATE) === TRUE) {
	foreach ($files_to_zip as $file) {
		if (is_dir($file)) {
			$zip->addEmptyDir($file);
		} elseif (file_exists($file)) {
			if (basename(basename($file)) !== 'php') {
				$zip->addFile($file, $file);
			}
		}
	}
} else {
	echo 'unable to open zip';
}

ob_end_clean();

header('Pragma: public');
header('Expires: 0');
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=uploads.zip');
header('Content-Transfer-Encoding: binary');

echo readfile($destination_file);

die();

?>