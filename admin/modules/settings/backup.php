<?php

ob_end_clean();

header('Pragma: public');
header('Expires: 0');
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=backup.sql');
header('Content-Transfer-Encoding: binary');

$output = '';
$tables = array();
		
$r = mysql_query("SHOW TABLES FROM `" . DB_DATABASE . "`", $db);

while ($result = mysql_fetch_assoc($r)) {
	$tables[] = $result['Tables_in_' . DB_DATABASE];
}


foreach ($tables as $table) {
	
	$output .= 'TRUNCATE TABLE `' . $table . '`;' . "\n\n";
	$rows = table_fetch_rows($table);
	
	foreach ($rows as $result) {
		$fields = '';
		
		foreach (array_keys($result) as $value) {
			$fields .= '`' . $value . '`, ';
		}
		
		$values = '';
		
		foreach (array_values($result) as $value) {
			$value = str_replace(array("\x00", "\x0a", "\x0d", "\x1a"), array('\0', '\n', '\r', '\Z'), $value);
			$value = str_replace(array("\n", "\r", "\t"), array('\n', '\r', '\t'), $value);
			$value = str_replace('\\', '\\\\',	$value);
			$value = str_replace('\'', '\\\'',	$value);
			$value = str_replace('\\\n', '\n',	$value);
			$value = str_replace('\\\r', '\r',	$value);
			$value = str_replace('\\\t', '\t',	$value);			
			
			$values .= '\'' . $value . '\', ';
		}
		
		$output .= 'INSERT INTO `' . $table . '` (' . preg_replace('/, $/', '', $fields) . ') VALUES (' . preg_replace('/, $/', '', $values) . ');' . "\n";
	}
	
	$output .= "\n\n";
}

echo $output;

die();

?>