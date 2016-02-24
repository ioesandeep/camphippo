<table class="width_100_percent">
<thead>
<tr>
	<td colspan="3"><h1>Galleries</h1></td>
</tr>
</thead>
<tbody>
<tr>
	<td colspan="3">
    <div class="category-tree">
    <?php
		$list = table_fetch_rows('multi_level_gallery', '', 'parent_id ASC, position ASC');
		$tree = get_parent_child_array($list);
		
		$operations = array('upload', 'photos', 'edit', 'delete');
		show_category_tree($tree, $operations, 'id', 'name');
	?>
    </div>
    </td>
</tr>
</tbody>
</table>

<script type="text/javascript">
$(function() {
	
	$('.category-row').hover(function() {
		$(this).addClass('hover');
	}, function() {
		$(this).removeClass('hover');
	});
	
	$('.operation').live('click', function() {
		var elm_class = $(this).attr('class'), value = $(this).attr('value');
		
		if (elm_class.indexOf('operation-status-online') > -1) {
			var params = 'table=multi_level_gallery&id=' + value + '&status=OFFLINE';
			
			$(this).removeClass('operation-status-online').addClass('operation-status-offline');
			$.post('ajax/status.php', params);
		} else if (elm_class.indexOf('operation-status-offline') > -1) {
			var params = 'table=multi_level_gallery&id=' + value + '&status=ONLINE';
			
			$(this).removeClass('operation-status-offline').addClass('operation-status-online');
			$.post('ajax/status.php', params);
		} else if (elm_class.indexOf('operation-edit') > -1) {
			var location = 'control-panel.php?module=multi_level_gallery&action=edit&id=' + value;
			window.location = location;
		} else if (elm_class.indexOf('operation-delete') > -1) {
			var $li = $(this).parent().parent().parent();
			
			if (confirm("<?php translate('Are you sure you want to delete this?'); ?>")) {
				$.post('ajax/delete.php', 'id=' + value + '&table=multi_level_gallery', function() {
					$li.remove();
				});
			}
		} else if (elm_class.indexOf('operation-photos') > -1) {
			var value = $(this).attr('value');
			
			window.location = '/admin/control-panel.php?module=multi_level_gallery/photos&action=list&id=' + value;
		} else if (elm_class.indexOf('operation-upload') > -1) {
			var value = $(this).attr('value');
			
			window.location = '/admin/control-panel.php?module=multi_level_gallery/photos&action=add&id=' + value;
		}
		
		return false;
	});
	
	$('.category-tree ul').sortable({
										axis: 'y',
										opacity: 0.5,
										stop: function (evt, ui) {
											var arr = [];
											
											$('.category-tree .category-row').each(function(i) {
												var id = $(this).attr('value');
												arr[arr.length] = 'positions[' + id + ']=' + i;
											});
											
											var params = 'table=multi_level_gallery&' + arr.join('&');
											$.post('ajax/sort-order.php', params, function() {
												
											});
										}
									});
	
});
</script>