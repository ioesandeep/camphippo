<?php

function return_date($num, $type)
{
	if (strpos($num, '0') === 0) {
		$num = substr($num, 1);
	}
	
	switch($type){ 
		case 'month': 
			$month_name = array("", "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December");
			return $month_name[$num];
			break; 

		case 'day': 
			$day_name = array('', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'); 
			return $day_name[$num]; 
			break; 
	}
}

function show_checked($x, $y)
{
	echo stripcslashes($x) == stripcslashes($y) ? 'checked="checked"' : '';
}

function show_selected($x, $y)
{
	echo stripcslashes($x) == stripcslashes($y) ? 'selected="selected"' : '';
}

function show_fckeditor($name, $content = '', $width = 590, $height = 400)
{
	require_once 'resources/fckeditor/fckeditor.php';
	$base_path = '/admin/resources/fckeditor/';
	
	$fckeditor = new FCKeditor($name);
	$fckeditor->BasePath = $base_path;
	
	$fckeditor->Config['SkinPath'] = $base_path . 'editor/skins/office2003/' ;
	$fckeditor->Config['AutoDetectLanguage'] = false;
	$fckeditor->Config['DefaultLanguage'] = 'en';
	$fckeditor->Width = $width;
	$fckeditor->Height = $height;
	
	$fckeditor->Value = stripslashes($content);
	$fckeditor->Create();
}

function show_rows($rows, $table, $fields, $operations = array('edit', 'delete'))
{
	foreach ($rows as $row) {
		$id = $row['id'];
		
		printf('<tr table="%s" row_id="%s">', $table, $id);
		
		echo '<td valign="top">';
		foreach ($operations as $operation) {
			printf('<a href="?module=%s&action=%s&id=%d" class="operation-%s operation" value="%d"></a> ', $table, $operation, $id, $operation, $id);
		}
		echo '</td>';
    	
		foreach ($fields as $field) {
			if ($field == 'date') {
				printf('<td valign="top">%s</td>', date('d-m-Y', strtotime($row[$field])));
			} else {
				printf('<td valign="top">%s</td>', htmlentities($row[$field]));
			}
		}
    
		echo '</tr>';
	}
}

function make_get_url($params)
{
	foreach ($params as $key => $val) {
		$url_params[] = sprintf('%s=%s', $key, urlencode($val));
	}
	
	return implode('&', $url_params);
}

function get_id()
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} elseif (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	
	return isset($id) ? $id : NULL;
}

function show_pagination($total_pages, $current_page)
{
	$params = $_GET;
	unset($params['page']);
	
	if ($total_pages > 1) {
		$url = make_get_url($params);
		
		echo '<ul class="pagination">';
		
		if ($current_page > 1) {
			$temp_params = $params;
			$temp_params['page'] = $current_page - 1;
			$url = make_get_url($temp_params);
			
			printf('<li><a class="previous" href="?%s"></a></li>', $url);
		}
		
		$start_page = $current_page;
		
		$start_page = 1;
		if (($current_page - 4) > 0) {
			$start_page = $current_page - 4;
		}
		
		$end_page = $start_page + 8;
		if ($end_page > $total_pages) {
			$end_page = $total_pages;
			
			if (($current_page - 10) > 0) {
				$start_page = $current_page - 10;
			} else {
				$start_page = 1;
			}
		}
		
		for ($page = $start_page; $page <= $end_page; $page++) {
			$link = sprintf('?%s&page=%d', $url, $page);
			
			if ($page == $current_page) {
				printf('<li><a class="selected" href="%s">%d</a></li>', $link, $page);
			} else {
				printf('<li><a href="%s">%d</a></li>', $link, $page);
			}
		}
		
		if ($current_page < $total_pages) {
			$temp_params = $params;
			$temp_params['page'] = $current_page + 1;
			$url = make_get_url($temp_params);
			
			printf('<li><a class="next" href="?%s"></a></li>', $url);
		}
			
		echo '</ul>';
	}
}

function show_id()
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} elseif (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	
	printf('<input type="hidden" name="id" id="id" value="%d" />', $id);
}

function redirect($link)
{
	$location = sprintf('Location: %s', $link);
	header($location);
	die();
}

function show_big_button($name, $text)
{
	$translated_text = $text;
	
	echo <<<HTML
	<button name="{$name}" class="big" type="submit">
		<span class="left"><span class="right"><span class="text">{$translated_text}</span></span></span>
	</button>
HTML;
}

function show_link_btn_arrow($link, $text)
{
	echo <<<HTML
	<a class="button-arrow" href="logout.php">
		<span class="left"><span class="right"><span class="text">{$text}</span></span></span>
	</a>
HTML;
}

function show_messages($errors)
{
	if (count($errors)) {
		echo '<div class="errors">';
		echo '<ul>';
		
		foreach ($errors as $error) {
			printf('<li>%s</li>', $error);
		}
		
		echo '</ul>';
		echo '</div>';
	}
}

function show_errors($errors)
{
	show_messages($errors);
}

?>