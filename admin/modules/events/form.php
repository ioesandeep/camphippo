<?php
$id = get_id();
if (!empty($_POST)) {
    $fields = array('title', 'venue', 'start_date', 'start_time', 'end_date', 'end_time', 'description');
    if ($id > 0) {
        table_update('events', $fields, $_POST, sprintf('id="%d"', $id));
    } else {
        table_insert('events', $fields, $_POST);
        $id = db_insert_id();
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        upload_image($_FILES['image'], $id, 'events');
    }
    saveRewrite('events', $id, '', $_POST['url']);
}
$data = table_fetch_row('events', sprintf('id="%d"', $id));
?>
<form action="" method="post">
    <input type="hidden" name="url" value="" id="url"/>
    <table>
        <tbody>
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" placeholder="Event title"
                       value="<?php echo isset($data['title']) ? $data['title'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Venue</td>
            <td>
                <input type="text" name="venue" placeholder="Event venue"
                       value="<?php echo isset($data['venue']) ? $data['venue'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Start date</td>
            <td>
                <input type="text" class="datepicker" name="start_date" placeholder="Event start date"
                       value="<?php echo isset($data['start_date']) ? $data['start_date'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Start time</td>
            <td>
                <input type="text" name="start_time" placeholder="Event start time"
                       value="<?php echo isset($data['start_time']) ? $data['start_time'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>End date</td>
            <td>
                <input type="text" class="datepicker" name="end_date" placeholder="Event end date"
                       value="<?php echo isset($data['end_date']) ? $data['end_date'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>End time</td>
            <td>
                <input type="text" name="end_time" placeholder="Event end time"
                       value="<?php echo isset($data['end_time']) ? $data['end_time'] : null; ?>"/>
            </td>
        </tr>
        <tr valign="top">
            <td>Image</td>
            <td>
                <input type="file" name="image"/>
                <?php
                $image = get_image('events/' . $id);
                if (!empty($image)) {
                    echo sprintf('<p><img src="%s" style="max-width:250px;"/></p>', $image);
                }
                ?>
            </td>
        </tr>
        <tr valign="top">
            <td>Description</td>
            <td>
                <?php show_fckeditor('description', isset($data['description']) ? $data['description'] : null); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php show_big_button('save', 'Save'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</form>

<script type="text/javascript">
    $(function () {
        $('#title').keyup(function () {
            var val = $(this).val();
            val = val.toLowerCase();
            val = val.replace(/[^a-z0-9 ]+/g, '');
            val = val.replace('  ', ' ');
            var url = '/event-' + val.replace(/\s/g, '-') + '.html';
            $('#url').val(url);
        });
        $('#title').trigger('keyup');
    });
</script>