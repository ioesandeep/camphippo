<?php

function table_row_count($table, $where = '')
{
	global $db;
	
	if (strlen($where) == 0) {
		$sql = sprintf('SELECT COUNT(*) as total FROM %s', $table);
	} else {
		$sql = sprintf('SELECT COUNT(*) as total FROM %s WHERE %s', $table, $where);
	}
	
	$r = mysql_query($sql, $db) or die(mysql_error($db));
	$row = mysql_fetch_assoc($r);
	
	return $row['total'];
}

function table_fetch_row($table, $where, $order_by = '')
{
	global $db;
	
	$sql = sprintf('SELECT * FROM %s', $table);
	if (strlen($where) > 0) {
		$sql .= sprintf(' WHERE %s', $where);
	}
	
	if (strlen($order_by) > 0) {
		$sql .= sprintf(' ORDER BY %s', $order_by);
	}
	
	$sql .= ' LIMIT 0,1';

	$r = mysql_query($sql, $db) or die(mysql_error($db));
	
	if (mysql_num_rows($r) == 0) {
		return false;
	} else {
		return mysql_fetch_assoc($r);
	}
}

function table_fetch_rows($table, $where = '', $order_by = '', $limit_from = 0, $limit_to = 0)
{
	global $db;
	
	$sql = sprintf('SELECT * FROM %s', $table);
	
	if (strlen($where) > 0) {
		$sql .= sprintf(' WHERE %s', $where);
	}
	
	if (strlen($order_by) > 0) {
		$sql .= sprintf(' ORDER BY %s', $order_by);
	}
	
	if ($limit_from > 0 || $limit_to > 0) {
		$sql .= sprintf(' LIMIT %d, %d', $limit_from, $limit_to);
	}

	$r = mysql_query($sql, $db) or die(mysql_error($db));
	$rows = array();
	
	while ($row = mysql_fetch_assoc($r)) {
		$rows[] = $row;
	}
	
	return $rows;
}

function table_fetch_distinct_rows($table, $columns, $where = '', $order_by = '')
{
	global $db;
	
	$sql = sprintf('SELECT DISTINCT %s FROM %s', implode(', ', $columns), $table);
	
	if (strlen($where) > 0) {
		$sql .= sprintf(' WHERE %s', $where);
	}
	
	if (strlen($order_by) > 0) {
		$sql .= sprintf(' ORDER BY %s', $order_by);
	}
	
	$r = mysql_query($sql, $db) or die(mysql_error($db));
	$rows = array();
	
	while ($row = mysql_fetch_assoc($r)) {
		$rows[] = $row;
	}
	
	return $rows;
}

function db_affected_rows()
{
	global $db;
	return mysql_affected_rows($db);
}

function db_insert_id()
{
	global $db;
	return mysql_insert_id($db);
}

function get_table_fields($table)
{
	global $db;
	
	$sql = sprintf('SHOW COLUMNS FROM %s', $table);
	$r = mysql_query($sql, $db) or die(mysql_error($db));
	
	$fields = array();
	while ($row = mysql_fetch_assoc($r)) {
		$fields[$row['Field']] = $row['Type'];
	}
	
	return $fields;
}

function format_field($table_fields, $field, $values)
{
	$type = $table_fields[$field];
	
	if ((strpos($type, 'int') !== false) || (strpos($type, 'float') !== false) || (strpos($type, 'decimal') !== false) || (strpos($type, 'double') !== false)) {
		return $values[$field];
	} else {
		return '"' . mysql_escape_string($values[$field]) . '"';
	}
}

function table_insert($table, $fields, $values)
{
	global $db;
	
	$table_fields = get_table_fields($table);
	
	$value_params = array();
	foreach ($fields as $field) {
			$value_params[] = '"' . mysql_escape_string($values[$field]) . '"'; //format_field($table_fields, $field, $values);
	}
	
	$sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', $fields), implode(', ', $value_params));
	$r = mysql_query($sql, $db) or die(mysql_error($db) . ' : ' . $sql);
	
	return db_affected_rows();
}

function table_update($table, $fields, $values, $where)
{
	global $db;
	$table_fields = get_table_fields($table);
	
	$params = array();
	foreach ($fields as $field) {
		//$params[] = sprintf('%s = %s', $field, format_field($table_fields, $field, $values));
		$params[] = sprintf('%s = "%s"', $field, mysql_escape_string($values[$field]));
	}
	
	$sql = sprintf('UPDATE %s SET %s WHERE %s', $table, implode(', ', $params), $where);
	$r = mysql_query($sql, $db) or die(mysql_error($db) . ' : ' . $sql);
	
	return db_affected_rows();
}

function table_delete_row($table, $where)
{
	global $db;
	
	$sql = sprintf('DELETE FROM %s WHERE %s', $table, $where);
	$r = mysql_query($sql, $db) or die(mysql_error($db));
	
	return db_affected_rows();
}

?>