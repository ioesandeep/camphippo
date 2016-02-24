<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    //error_reporting(0);
    date_default_timezone_set ('Europe/London');
    require_once("admin/application.php");
    
	function get_paragraphed_content($content, $paragraph_number = 0)
	{
	    if ($paragraph_number == 0) {
	        return $content;
	    }
	    if (strpos($content, '</p>')) {
	        $paragraphs = explode('</p>', $content);
	        $remove = '<p>';
	    } elseif (strpos($content, '\n')) {
	        $paragraphs = explode('\n', $content);
	    } elseif (strpos($content, '<br/>')) {
	        $paragraphs = exp('<br/>', $content);
	    }

	    if (!isset($paragraphs[$paragraph_number - 1])) {
	        return false;
	    }

	    return isset($remove) ? str_replace($remove, '',
	        $paragraphs[$paragraph_number - 1]) : $paragraphs[$paragraph_number - 1];
	}


	function get_sentence($content, $num = 1)
	{
	    $content = explode('.',strip_tags($content));
	    $content = array_chunk($content, $num);
	    $content = $content[0];
	    return implode('. ', $content).'.';
	}

?>
