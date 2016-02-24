<?php

$domain = parse_url($_SERVER['SERVER_NAME']);

require_once dirname(dirname(__FILE__)) . "/includes/config.php";
require_once dirname(__FILE__) . "/classes.php";

$url = isset($_GET['url']) ? $_GET['url'] : '/home.html';
$url = ($url == '/index.html' || $url == '/') ? '/home.html' : $url;

$rewriteData = getRewriteByURL($url);

$pageData = array();
$pageData['meta_keywords'] = '';
$pageData['meta_description'] = '';
$pageData['title'] = '';
$pageData['content'] = '';
$pageData['blocks'] = '';
$pageData['javascript'] = '';

$parenturl = '';

if ($rewriteData !== false && $rewriteData['table_name'] == 'page') {
    $data = table_fetch_row('page', 'status = 1 AND id = ' . $rewriteData['table_id']);
    if ($data !== false) {
        $pageData = $data;
    }
} elseif ($rewriteData !== false && $rewriteData['table_name'] == 'news') {
    $data = table_fetch_row('news', 'status = 1 AND id = ' . $rewriteData['table_id']);

    if ($data !== false) {
        $pageData = $data;
        $pageData['h1_title'] = $data['title'];
    }
}
