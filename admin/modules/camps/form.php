<?php
$id = get_id();
if (!empty($_POST)) {
    $fields = array('title','type', 'venue', 'start_date', 'start_time', 'end_date', 'end_time', 'description', 'price', 'video_url');

    list($d,$m,$y) = explode('/',$_POST['start_date']);
    $_POST['start_date'] = sprintf('%d-%d-%d',$y,$m,$d);

    list($d,$m,$y) = explode('/',$_POST['end_date']);
    $_POST['end_date'] = sprintf('%d-%d-%d',$y,$m,$d);

    if ($id > 0) {
        table_update('camps', $fields, $_POST, sprintf('id="%d"', $id));
    } else {
        table_insert('camps', $fields, $_POST);
        $id = db_insert_id();
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        upload_image($_FILES['image'], $id, 'camps');
    }
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        upload_file($_FILES['file'], $id, 'files');
    }
    saveRewrite('camps', $id, '', $_POST['url']);
}
$data = table_fetch_row('camps', sprintf('id="%d"', $id));
?>
<form action="" method="post">
    <input type="hidden" name="url" value="" id="url"/>
    <table>
        <tbody>
        <tr>
            <td>Camp type</td>
            <td>
                <select name="type" id="">
                    <option value="1" <?php echo isset($data['type']) && $data['type'] == 1 ? 'selected' : null; ?>>
                        Lifegaurding
                    </option>
                    <option value="2" <?php echo isset($data['type']) && $data['type'] == 2 ? 'selected' : null; ?>>Kids
                        Camps
                    </option>
                    <option value="3" <?php echo isset($data['type']) && $data['type'] == 3 ? 'selected' : null; ?>>
                        Triathlons
                    </option>
                    <option value="4" <?php echo isset($data['type']) && $data['type'] == 4 ? 'selected' : null; ?>>
                        Trampolining
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" placeholder="Camp title"
                       value="<?php echo isset($data['title']) ? $data['title'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Venue</td>
            <td>
                <input type="text" name="venue" placeholder="Camp venue"
                       value="<?php echo isset($data['venue']) ? $data['venue'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Start date</td>
            <td>
                <input type="text" class="datepicker" name="start_date" placeholder="Camp start date"
                       value="<?php echo isset($data['start_date']) ? date('d/m/Y',strtotime($data['start_date'])) : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Start time</td>
            <td>
                <input type="text" name="start_time" placeholder="Camp start time"
                       value="<?php echo isset($data['start_time']) ? $data['start_time'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>End date</td>
            <td>
                <input type="text" class="datepicker" name="end_date" placeholder="Camp end date"
                       value="<?php echo isset($data['end_date']) ? date('d/m/Y',strtotime($data['end_date'])) : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>End time</td>
            <td>
                <input type="text" name="end_time" placeholder="Camp end time"
                       value="<?php echo isset($data['end_time']) ? $data['end_time'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Event price</td>
            <td>
                <input type="text" name="price" placeholder="Camp signup url"
                       value="<?php echo isset($data['price']) ? $data['price'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Video URL</td>
            <td>
                <input type="text" name="video_url" placeholder="Camp video url"
                       value="<?php echo isset($data['video_url']) ? $data['video_url'] : null; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Camp information</td>
            <td>
                <input type="file" name="file"/>
                <?php
                $file = get_file($id, 'files');
                if (!empty($file)) {
                    echo $file;
                }
                ?>
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
            <td></td>
            <td>
                <?php show_big_button('save', 'Save'); ?>
            </td>
        </tr>
        </tbody>
    </table>
</form>

<script type="text/javascript">
    $(function () {
        $('[name=title]').live('keyup change input focusout',function () {
            var val = $(this).val();
            val = val.toLowerCase();
            val = val.replace(/[^a-z0-9 ]+/g, '');
            val = val.replace('  ', ' ');
            var url = '/camp-' + val.replace(/\s/g, '-') + '.html';
            $('#url').val(url);
        });
        $('[name=title]').trigger('keyup');
    });
</script>
