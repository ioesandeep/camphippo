<?php
$data = table_fetch_rows('site_data');
if (false == $data) {
    show_messages(array('Site data not defined.'));
    return;
}
?>
<table class="list">
    <thead>
    <tr>
        <th>Field name</th>
        <th>Field value</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d) {
        echo sprintf('<tr><td>%s</td><td>%s</td></tr>', ucfirst(str_replace('_',' ',$d['name'])), $d['value']);
    } ?>
    </tbody>
</table>
