<input type="hidden" name="multi_level_gallery_id" id="multi_level_gallery_id" value="<?php echo $_GET['id']; ?>" />
<table>
<tr>
	<td colspan="2"><h1>Add Photos</h1></td>
</tr>
<?php show_upload_component('multi_level_gallery_photos', 'multi_level_gallery_id', 'multi_level_gallery_photos'); ?>
</table>