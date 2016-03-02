<?php
$regs = table_fetch_rows('camp_registration');
if(false == $regs){
    echo 'No registrations yet.';
    return;
}
?>
<table class="list">
    <thead>
    <tr>
        <th>#</th>
        <th>#</th>
        <th>#</th>
        <th>#</th>
        <th>#</th>
        <th>#</th>
    </tr>
    </thead>
</table>
