<?php

    $domain = parse_url($_SERVER['SERVER_NAME']);

    require_once("includes/config.php");
	
    $url = isset($_GET['url']) ? $_GET['url'] : '/home.html';
    $url = ($url == '/index.html') ? '/home.html' : $url;

    $rewriteData = getRewriteByURL($url);

    $pageData = array();
    $pageData['meta_keywords'] = '';
    $pageData['meta_description'] = '';
    $pageData['title'] = '';
    $pageData['content'] = '';
    $pageData['blocks'] = '';
    $pageData['javascript'] = '';

    $parenturl = '';

    if($rewriteData !== false && $rewriteData['table_name'] == 'page') 
    {
        $data = table_fetch_row('page', 'status = 1 AND id = ' . $rewriteData['table_id']);
        
        if($data !== false)
        {

		$absParentId = get_absolute_parent_pageid($data['id']);
        $parenturl = getRewriteUrl('page', $absParentId, '', false);
        $mainParent = NULL;

		$pageData = $data;
		$pageData['title'] = $data['page_title'];
        }
        else {
            header('Location: /home.html');
        }
    }
    elseif($rewriteData !== false && $rewriteData['table_name'] == 'news') 
    {
        $data = table_fetch_row('news', 'status = 1 AND id = ' . $rewriteData['table_id']);
        
        if($data !== false)
        {
		$pageData = $data;
		$pageData['h1_title'] = $data['title'];
        }
        else {
            header('Location: /home.html');
        }
    }
    elseif($rewriteData !== false && $rewriteData['table_name'] == 'testimonials') 
    {
        $data = table_fetch_row('testimonials', 'status = 1 AND id = ' . $rewriteData['table_id']);
        
        if($data !== false)
        {
		$pageData = $data;
		$pageData['h1_title'] = $data['title'];
        }
        else {
            header('Location: /home.html');
        }
    }
    elseif($rewriteData !== false && $rewriteData['table_name'] == 'event_diary') 
    {
        $data = table_fetch_row('event_diary', 'id = ' . $rewriteData['table_id']);
        
        if($data !== false)
        {
            $pageData = $data;
            $pageData['h1_title'] = $data['title'];
            $pageData['mini_sites'] = 0;
        }
        else {
            header('Location: /home.html');
        }
    }
    elseif($rewriteData !== false && $rewriteData['table_name'] == 'projects') 
    {
        $data = table_fetch_row('projects', 'status = 1 AND id = ' . $rewriteData['table_id']);
        
        if($data !== false)
        {
		$pageData = $data;
		$pageData['h1_title'] = $data['title'];
        }
        else {
            header('Location: /home.html');
        }
    }
    else {
        header('Location: /404.html');
    }

    if($pageData['mini_sites'] == 0)
    {
        $areaClass = 'showground';
        $nav = 'nav2';
    }
    elseif($pageData['mini_sites'] == 1)
    {
        $areaClass = 'show';
        $nav = 'nav1';
    }
    elseif($pageData['mini_sites'] == 2)
    {
        $areaClass = 'agri';
        $nav = 'nav3';
    }
    elseif($pageData['mini_sites'] == 3)
    {
        $areaClass = 'fair';
        $nav = 'nav1';
    }
    elseif($pageData['mini_sites'] == 4)
    {
        $areaClass = 'events';
        $nav = 'nav2';
    }
   
?>
