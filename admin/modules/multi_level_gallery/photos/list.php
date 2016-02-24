<table>
<tr>
	<td colspan="2"><h1>Photos</h1></td>
</tr>
<tr>
	<td colspan="2">
    
	<?php
    if (isset($_GET['id'])) {
		$where = sprintf('multi_level_gallery_id = %d', $_GET['id']);
        $gallery = table_fetch_rows('multi_level_gallery_photos', $where, 'position ASC');
        
        if (count($gallery) == 0) {
			$messages = array('No record found');
            show_messages($messages);
        } else {
    ?>
        
    <ul id="gallery">
    
    <?php 
		foreach ($gallery as $photo) { 
			$img_path = get_image_path('multi_level_gallery_photos/' . $photo['id'], false);
	?>
    	<li row_id='<?php echo $photo['id']; ?>'>
        	<div>
            	<img src='/admin/generate-thumbnail.php?file=../uploads/<?php echo $img_path; ?>&width=100&height=75' />
            	<div class='edit'></div>
                <div class='delete'></div>
            </div>
        </li>
    <?php } ?>
        
	</ul>
    
    <?php
        }
    }
    ?>
    </td>
</tr>
</table>

<div id="photo-edit-box">
<form id="photo-edit-form" class="hidden" method="post" action="ajax/edit.php">
	<input type="hidden" name="table" value="multi_level_gallery_photos" />
    <input type="hidden" name="fields" value="title,description" />
    <input type="hidden" name="id" value="" />
    <table>
    <tr>
        <td>Title:</td>
        <td><input class="required" name="title" id="title" size="50" type="text" value="" /></td>
    </tr>
    <tr>
        <td valign="top">Description:</td>
        <td><textarea class="required" name="description" cols="47" rows="5" type="text"></textarea></td>
    </tr>
    </table>
</form>
</div>

<script type="text/javascript">
$(function() {
	
	$('.edit').click(function() {
		var $li = $(this).parents('li');
		var row_id = $li.attr('row_id');
		
		$.post('ajax/get.php', 'table=multi_level_gallery_photos&id=' + row_id, function(r) {
			$('#photo-edit-form input[name=id]').val(r.id);
			$('#photo-edit-form input[name=title]').val(r.title);
			$('#photo-edit-form textarea[name=description]').val(r.description);
			
			$('#photo-edit-box').dialog('open');
		}, 'json');
	});
	
	$('#photo-edit-box').dialog({
		title: 'Edit Photograph',
		autoOpen: false,
		width: 500,
		height: 250,
		buttons: {
			'Save': function(evt, ui) {
				$.post('ajax/update.php', $('#photo-edit-form').serialize(), function() {
					$(this).dialog('close');
				});
			},
			'Cancel': function(evt, ui) {
				$(this).dialog('close');
			}
		}
	});
	
	$('#gallery').sortable({
		stop: function(evt, ui) {
			var arr = [];
			
			$('#gallery > li').each(function(i) {
				arr[arr.length] = 'positions[' + $(this).attr('row_id') + ']=' + i;
			});
			arr[arr.length] = 'table=multi_level_gallery_photos';
			
			var params = arr.join('&');
			$.post('ajax/sort-order.php', params, function() {
				
			});
		}
	}).disableSelection();
	
	$('.delete').click(function() {
		
		if (confirm('Are you sure you want to delete this?')) {
			var $li = $(this).parents('li');
			var row_id = $li.attr('row_id'), table = 'multi_level_gallery_photos';
			
			$.post('ajax/delete.php', 'id=' + row_id + '&table=' + table, function() {
				$li.remove();
			});
			
			return false;
		}
	});
	
});
</script>