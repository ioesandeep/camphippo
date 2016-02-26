<?php
$messages = array();

$table_id = get_id();

if (isset($_POST['save'])) {
    $fields = array('title', 'page_title', 'news_date', 'content', 'meta_keywords', 'meta_description', 'status');

    $date = explode('/', $_POST['news_date']);
    $_POST['news_date'] = $date[2] . '-' . $date[1] . '-' . $date[0];

    if ($_POST['id'] == 0) {
        table_insert('news', $fields, $_POST);
        $messages[] = 'Saved successfully.';
        $table_id = db_insert_id();
    } else {
        table_update('news', $fields, $_POST, 'id=' . get_id());
        $messages[] = 'Saved successfully.';
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        upload_image($_FILES['image'], $table_id, 'news');
    }

    saveRewrite('news', $table_id, '', $_POST['url']);
}

if (!empty($table_id)) {
    $data = table_fetch_row('news', 'id=' . $table_id);
    if ($data !== false) {
        $data['url'] = getRewriteUrl('news', $data['id']);
        $date = explode('-', $data['news_date']);
        $data['news_date'] = $date[2] . '/' . $date[1] . '/' . $date[0];
    }
}

?>
<form class="validate-form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : 0; ?>"/>
    <input name="url" id="url" size="50" type="hidden" value="<?php echo isset($data['url']) ? $data['url'] : ''; ?>"/>
    <table>
        <tr>
            <td colspan="2"><h1><?php echo ($table_id == 0) ? 'Add' : 'Edit'; ?> News</h1></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input name="title" id="title" size="50" type="text"
                       value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>Page Title:</td>
            <td><input name="page_title" id="page_title" size="50" type="text"
                       value="<?php echo isset($data['page_title']) ? $data['page_title'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><input name="news_date" id="news_date" size="50" type="text" class="datepicker"
                       value="<?php echo isset($data['news_date']) ? $data['news_date'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>News image</td>
            <td>
                <input type="file" name="image"/>
                <?php
                if (!empty($data)) {
                    $image = get_image('news/' . $data['id']);
                    if (!empty($image)) {
                        echo sprintf('<p><img src="%s" style="max-width: 250px;"/></p>', $image);
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Content:</td>
            <td><?php show_fckeditor('content', isset($data['content']) ? $data['content'] : ''); ?></td>
        </tr>
        <tr>
            <td valign="top">Meta keywords:</td>
            <td><textarea cols="50" rows="3" name="meta_keywords"
                          id="meta_keywords"><?php echo isset($data['meta_keywords']) ? stripslashes($data['meta_keywords']) : ''; ?></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">Meta Description:</td>
            <td><textarea cols="50" rows="3" name="meta_description"
                          id="meta_description"><?php echo isset($data['meta_description']) ? stripslashes($data['meta_description']) : ''; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select name="status">
                    <option
                        value="1" <?php echo (isset($data['status']) && $data['status'] == 1) ? 'selected="selected"' : ''; ?> >
                        Enable
                    </option>
                    <option
                        value="0" <?php echo (isset($data['status']) && $data['status'] == 0) ? 'selected="selected"' : ''; ?> >
                        Disable
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php show_big_button('save', 'Save'); ?></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(function () {
        $('#title').keyup(function () {
            var val = $('#title').val();

            val = val.toLowerCase();
            val = val.replace(/[^a-z0-9 ]+/g, '');
            val = val.replace('  ', ' ');

            var url = '/news-' + val.replace(/\s/g, '-') + '.html';

            $('#url').val(url);
        });
    });
</script>
