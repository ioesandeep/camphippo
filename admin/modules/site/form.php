<?php
if (!empty($_POST)) {
    $fields = array('name', 'value');
    foreach ($_POST['names'] as $name) {
        $data = array('name' => $name, 'value' => $_POST['values'][$name]);
        if (table_fetch_row('site_data', sprintf('LOWER(name)="%s"', strtolower($name)))) {
            table_update('site_data', array_keys($data), $data, sprintf('LOWER(name)="%s"', strtolower($name)));
        } else {
            table_insert('site_data', array_keys($data), $data);
        }
    }
    show_messages(array('Data saved.'));
}
$data = table_fetch_rows('site_data');
?>
<style type="text/css">
    input {
        width: 480px;
    }
</style>
<form action="" method="post">
    <table>
        <tbody>
        <?php if (false != $data) {
            foreach ($data as $d) {
                ?>
                <tr>
                    <td>
                        <?php echo ucfirst(str_replace('_', ' ', $d['name'])); ?>
                        <input type="hidden" name="names[<?php echo $d['name']; ?>]" value="<?php echo $d['name']; ?>"
                               class="name" placeholder="Field name"/>
                    </td>
                    <td>
                        <input type="text" name="values[<?php echo $d['name']; ?>]" value="<?php echo $d['value']; ?>"
                               class="value" placeholder="Field value"/>
                    </td>
                </tr>
            <?php }
        }
        ?>
        <tr>
            <td><a href="#" id="add-more">Add more</a></td>
        </tr>
        <tr>
            <td><?php show_big_button('save', 'Save'); ?></td>
        </tr>
        </tbody>
    </table>
</form>
<script type="text/javascript">
    $(function () {
        $('#add-more').click(function (e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').before('<tr><td><input type="text" name="names" class="name" placeholder="Field name"/></td><td><input type="text" name="values" class="value" placeholder="Field value"/></td></tr>');
            $('.name').unbind('keyup').bind('keyup', function () {
                var i = $(this).index('.name');
                $(this).attr('name', 'names[' + $(this).val().toLowerCase() + ']');
                $('.value').eq(i).attr('name', 'values[' + $(this).val().toLowerCase() + ']');
            });
        });
    });
</script>