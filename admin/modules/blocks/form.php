<?php

    /*
    * To change this template, choose Tools | Templates
    * and open the template in the editor.
    */
    $messages = array();
    
    $table_id = get_id();
    
    if(isset($_POST['save']))
    {
        $fields = array('title','content','type');

        if($_POST['id'] == 0) 
        {
            table_insert('blocks', $fields, $_POST);
            $messages[] = 'Saved successfully.';
        }
        else 
        {
            table_update('blocks', $fields, $_POST, 'id=' . get_id());
            $messages[] = 'Saved successfully.';
        }   
    }
    
    if(!empty($table_id)) {
        $data = table_fetch_row('blocks', 'id=' . $table_id); 
    }
    
?>
<form class="validate-form" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $table_id; ?>" />
<table>
    <tr>
        <td colspan="2"><h1><?php echo ($table_id == 0) ? 'Add' : 'Edit'; ?> Blocks</h1></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input class="required" name="title" id="title" size="100" type="text" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" /></td>
    </tr>
    <tr>
        <td>Type</td>
        <td>
            <select name="type">
                <option value="LEFT" <?php echo (isset($data['type']) && $data['type'] == 'LEFT' ) ? 'selected="select"' : ''; ?> >Left</option>
                <option value="MIDDLE" <?php echo (isset($data['type']) && $data['type'] == 'MIDDLE' ) ? 'selected="select"' : ''; ?> >Middle</option>
                <option value="RIGHT" <?php echo (isset($data['type']) && $data['type'] == 'RIGHT' ) ? 'selected="select"' : ''; ?> >Right</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Content</td>
        <td><?php show_fckeditor('content', isset($data['content']) ? $data['content'] : '' ); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php show_big_button('save', 'Save'); ?></td>
    </tr>
</table>
</form>
<script type="text/javascript">
$(function() {

});
</script>
