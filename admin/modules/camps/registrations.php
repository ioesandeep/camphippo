<?php
$regs = table_fetch_rows('camp_registration');
if (false == $regs) {
    echo 'No registrations yet.';
    return;
}
?>
<style type="text/css">
    table.table thead tr th {

    }
</style>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Wished name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>School</th>
        <th>Year group</th>
        <th>Selected camp</th>
        <th>Registered date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $camps = array();
    foreach ($regs as $k => $r) {
        if (!isset($camps[$r['camp']])) {
            $camp = table_fetch_row('camps', sprintf('id=%d', $r['camp']));
            $camps[$r['camp']] = $camp;
        } else {
            $camp = $camps[$r['camp']];
        }
        ?>
        <tr>
            <td>
                <a href="?module=camps&action=details&id=<?php echo $r['id']; ?>" title="Click to view details"
                   class="details"><?php echo 1 + $k; ?></a>
            </td>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['wished_name']; ?></td>
            <td><?php echo $r['address']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['mobile']; ?></td>
            <td><?php echo $r['school']; ?></td>
            <td><?php echo $r['year_group']; ?></td>
            <td><?php echo $camp['title']; ?></td>
            <td><?php echo date('m/d/Y', strtotime($r['date_added'])); ?></td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>