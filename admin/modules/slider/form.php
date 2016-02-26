<?php
$id = get_id();
if (!empty($_POST)) {
    $fields = array('description', 'status');
    if ($id > 0) {
        table_update('slider', $fields, $_POST, sprintf('id="%d"', $id));
    } else {
        table_insert('slider', $fields, $_POST);
        $id = db_insert_id();
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        upload_image($_FILES['image'], $id, 'slider');
    }
}
$data = table_fetch_row('slider', sprintf('id="%d"', $id));
?>
<form action="" method="post" enctype="multipart/form-data">
    <table>
    <tbody>
    <tr>
        <td valign="top">Description</td>
        <td>
            <textarea name="description" placeholder="Slider description" rows="10"
                      cols="70"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>
        </td>
    </tr>
    <tr>
        <td valign="top">Image</td>
        <td>
            <input type="file" name="image"/>
            <?php
            $image = get_image('slider/' . $id);
            if (!empty($image)) {
                echo sprintf('<p><img src="%s" style="max-width:250px;"/></p>', $image);
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <select name="status" id="">
                <option value="1" <?php echo isset($data['status']) && $data['status'] == 1 ? 'selected' : null; ?>>
                    Enabled
                </option>
                <option value="0" <?php echo isset($data['status']) && $data['status'] == 0 ? 'selected' : null; ?>>
                    Disabled
                </option>
            </select>
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
