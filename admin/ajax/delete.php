<?php

require 'init.php';

$id = $_REQUEST['id'];
$table = $_REQUEST['table'];

$where = sprintf('id="%d"', $id);
table_delete_row($table, $where);

if ($table == 'home_blocks') {
    $img_path = get_image_path('home_blocks/' . $id, true);
    @unlink($img_path);
} elseif ($table == 'sponsers') {
    $img_path = get_image_path('sponsers/' . $id, true);
    @unlink($img_path);
} elseif ($table == 'photos') {
    $img_path = get_image_path('photos/' . $id, true);
    @unlink($img_path);
} else {
    $img_path = get_image_path($_REQUEST['table'] . '/' . $id, true);
    if (!empty($img_path)) {
        @unlink($img_path);
    }
}
echo true;
?>