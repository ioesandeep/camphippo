<?php
$data = table_fetch_rows('events');
if (false == $data) {
    die('Events have not been added.');
}
?>
<table class="list">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Venue</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $k => $d) { ?>
        <tr>
            <td><?php echo 1 + $k; ?></td>
            <td><?php echo $d['title']; ?></td>
            <td><?php echo $d['venue']; ?></td>
            <td><?php echo $d['start_date']; ?></td>
            <td><?php echo $d['end_date']; ?></td>
            <td>
                <a href="?module=events&action=form&id=<?php echo $d['id']; ?>" class="operation operation-edit"></a>
                <a href="#" data-id="<?php echo $d['id']; ?>" class="operation operation-delete"></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(function () {
        $('.operation-delete').click(function (e) {
            e.preventDefault();
            var that = $(this);
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/delete.php',
                    data: $.param({
                        id: $(this).data('id'),
                        table: 'events'
                    }),
                    success: function (res) {
                        that.parent().parent().remove();
                    },
                    error: function () {
                        alert('Could not delete. Please try later.');
                    }
                })
            }
        })
    });
</script>