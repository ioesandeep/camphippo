<?php
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
$messages = array();

$table_id = get_id();

if (isset($_POST['save'])) {
    $fields = array('blocks', 'parent_id', 'menu_title', 'page_title', 'h1_title', 'content', 'meta_keywords', 'meta_description', 'status', 'top_nav', 'footer_nav');
    $_POST['top_nav'] = isset($_POST['top_nav']) ? 1 : 0;
    $_POST['footer_nav'] = isset($_POST['footer_nav']) ? 1 : 0;
    if (isset($_POST['blocks'])) {
        $_POST['blocks'] = implode(',', $_POST['blocks']);
    } else {
        $_POST['blocks'] = '';
    }

    if ($_POST['id'] == 0) {
        table_insert('page', $fields, $_POST);
        $messages[] = 'Saved successfully.';
        $table_id = mysql_insert_id();
    } else {
        table_update('page', $fields, $_POST, 'id=' . get_id());
        $messages[] = 'Saved successfully.';
    }

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $image) {
            if (file_exists('../' . $image)) {
                unlink('../' . $image);
            }
        }
    }

    upload_image($_FILES['header_image'], $table_id . '-header-image', 'page');
    upload_image($_FILES['banner_image'], $table_id, 'page');

    saveRewrite(TBL_PAGE, $table_id, '', $_POST['url']);
}

if (!empty($table_id)) {
    $data = table_fetch_row('page', 'id=' . $table_id);

    if ($data !== false) {
        $data['url'] = getRewriteUrl(TBL_PAGE, $data['id']);
        $data['blocks'] = explode(',', $data['blocks']);
    }
}

?>
<style type="text/css">
    img{
        max-width: 640px;
    }
</style>
<form class="validate-form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $table_id; ?>"/>
    <table>
        <tr>
            <td colspan="2"><h1><?php echo ($table_id == 0) ? 'Add' : 'Edit'; ?> Page</h1></td>
        </tr>
        <tr>
            <td colspan="2"><?php show_messages($messages); ?></td>
        </tr>
        <tr>
            <td>Parent:</td>
            <td>
                <?php
                $first_node = array('id' => -1, 'menu_title' => '--');
                $list = table_fetch_rows(TBL_PAGE, '', 'parent_id ASC, position ASC');

                $tree = get_parent_child_array($list);
                show_tree($tree, 'parent_id', 'select', 'id', 'menu_title', $first_node, isset($data['parent_id']) ? $data['parent_id'] : -1);
                ?>
            </td>
        </tr>
        <tr>
            <td>Menu Title:</td>
            <td><input class="required" name="menu_title" id="menu_title" size="100" type="text"
                       value="<?php echo isset($data['menu_title']) ? $data['menu_title'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>URL:</td>
            <td><input class="required" name="url" id="url" size="100" type="text"
                       value="<?php echo isset($data['url']) ? $data['url'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>Page Title:</td>
            <td><input name="page_title" id="page_title" size="100" type="text"
                       value="<?php echo isset($data['page_title']) ? $data['page_title'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>H1 Title:</td>
            <td><input name="h1_title" id="h1_title" size="100" type="text"
                       value="<?php echo isset($data['h1_title']) ? $data['h1_title'] : ''; ?>"/></td>
        </tr>
        <tr>
            <td>Header Image:</td>
            <td><input size="40" type="file" id="header_image" name="header_image" value="" class=""/></td>
        </tr>
        <?php
        if (isset($data['id'])) :

            $path = get_image('page/' . $data['id'] . '-header-image');

            if (strlen($path) > 0):
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?php show_image('page/' . $data['id'] . '-header-image'); ?>
                        <label><input type="checkbox" name="delete[]" value="<?php echo $path; ?>"/>&nbsp;Delete</label>
                    </td>
                </tr>
            <?php endif; endif; ?>
        <tr>
            <td>Banner Image:</td>
            <td><input size="40" type="file" id="banner_image" name="banner_image" value="" class=""/></td>
        </tr>
        <?php
        if (isset($data['id'])) :

            $path = get_image('page/' . $data['id']);

            if (strlen($path) > 0):
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?php show_image('page/' . $data['id']); ?>
                        <label><input type="checkbox" name="delete[]" value="<?php echo $path; ?>"/>&nbsp;Delete</label>
                    </td>
                </tr>
            <?php endif; endif; ?>
        <tr>
            <td valign="top">Show Link:</td>
            <td>
                <label><input type="checkbox" name="top_nav"
                              value="1" <?php echo (isset($data['footer_nav']) && $data['top_nav'] == 1) ? 'checked="checked"' : ''; ?> />&nbsp;Main
                    Navigation</label>
                <label><input type="checkbox" name="footer_nav"
                              value="1" <?php echo (isset($data['footer_nav']) && $data['footer_nav'] == 1) ? 'checked="checked"' : ''; ?> />&nbsp;Footer
                    Navigation</label>
            </td>
        </tr>
        <tr>
            <td valign="top">Blocks<br/>(Before the content):</td>
            <td>
                <?php
                $blocks = table_fetch_rows('blocks', '', 'position ASC');
                foreach ($blocks as $block):
                    ?>
                    <label style="display:block;padding:3px 0px;"><input type="checkbox" name="blocks[]"
                                                                         value="<?php echo $block['id']; ?>" <?php echo (isset($data['blocks']) && in_array($block['id'], $data['blocks'])) ? 'checked="checked"' : ''; ?> />&nbsp;<?php echo $block['title'] ?>
                    </label>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td valign="top">Content:</td>
            <td><?php show_fckeditor('content', isset($data['content']) ? $data['content'] : ''); ?></td>
        </tr>
        <tr>
            <td valign="top">Meta keywords:</td>
            <td><textarea cols="50" rows="3" name="meta_keywords"
                          id="meta_keywords"><?php echo isset($data['meta_keywords']) ? $data['meta_keywords'] : ''; ?></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">Meta Description:</td>
            <td><textarea cols="50" rows="3" name="meta_description"
                          id="meta_description"><?php echo isset($data['meta_description']) ? $data['meta_description'] : ''; ?></textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">Status:</td>
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
        $('#menu_title').keyup(function () {
            var val = $(this).val();
            $('#page_title,#h1_title').val(val);

            val = val.toLowerCase();
            val = val.replace(/[^a-z0-9 ]+/g, '');
            val = val.replace('  ', ' ');

            var url = '/' + val.replace(/\s/g, '-') + '.html';
            $('#url').val(url);
        });
    });
</script>
