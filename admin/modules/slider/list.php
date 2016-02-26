<?php
$sliders = table_fetch_rows('slider');
if (false == $sliders) {
    die('Sliders not added.');
}
?>
<table class="list">
    <thead>
    <tr>
        <th>#</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sliders as $k => $slider) { ?>
        <tr>
            <td><?php echo 1 + $k; ?></td>
            <td><?php echo $slider['description']; ?></td>
            <td><?php echo $slider['status'] == 1 ? 'Enabled' : 'Disabled'; ?></td>
            <td>
                <a href="?module=slider&action=form&id=<?php echo $slider['id']; ?>"
                   class="operation operation-edit"></a>
                <a href="#" class="operation operation-delete" data-id="<?php echo $slider['id']; ?>"></a>
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
                        table: 'slider'
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