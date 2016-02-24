<div id="breadcrumb">
	<div id="breadcrumb-path">
    	
        You are here &nbsp; 
        
    	<?php
			
			if (!isset($_GET['module'])) {
				echo 'Home';
			} else {
				$link = sprintf('?module=%s&action=%s', $_GET['module'], $_GET['action']);
				printf('%s &gt; <a href="%s">%s</a>', 
						ucfirst(str_replace('_', ' ', $_GET['module'])),
						$link,
						ucfirst(str_replace('_', ' ', $_GET['action'])));
			}
		?>
    </div>
</div>