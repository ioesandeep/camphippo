<?php 
	require 'application.php';
	
	if (!isset($_SESSION['admin'])) {
		redirect('login.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Login : <?php echo APP_TITLE; ?></title>
<?php require 'includes/head.php'; ?>
</head>
<body>

<div id="wrapper">
	<?php require 'includes/header.php'; ?>
    
    <div id="content">
        <?php 
			require 'includes/menu.php'; 
			require 'includes/breadcrumb.php'; 
		?>
        <div id="content-area">
        <?php
			if (isset($_GET['module'])) {
				$path = sprintf('modules/%s/%s.php', $_GET['module'], $_GET['action']);
				require $path;
			}
        ?>
        </div>
    </div>
    
    <div class="clear">&nbsp;</div>
</div>

<?php require 'includes/footer.php'; ?>

</body>
</html>