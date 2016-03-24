<?php 
	require 'application.php';
	
	$messages = array();
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if (login($email, $password)) {
			$_SESSION['admin'] = get_admin($email);
			
			$fields = array('last_login');
			$values = array('last_login' => date('Y-m-d H:i:s'));
			$where = sprintf('id=%d', $_SESSION['admin']['id']);			
			
			table_update(TBL_ADMIN, $fields, $values, $where);
			redirect('control-panel.php?module=admin&action=list');
		} else {
			$messages[] = 'Invalid login, incorrect email or password specified.';
		}
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
    	<div id="login-box">
        	<form id="login-form" class="validate-form" method="post" action="login.php">
            <table>
            <tr>
              <td colspan="2" align="center"><h1>Administrator Login</h1></td>
            </tr>
            <tr>
            	<td colspan="2"><?php show_messages($messages); ?></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input class="required email" size="35" maxlength="100" type="text" name="email" id="email" value="" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input class="required" size="35" maxlength="35" type="password" name="password" id="password" value="" /></td>
            </tr>
            <tr>
                <td nowrap="nowrap"><a href="forgot-password.php">Forgot Password?</a></td>
                <td><?php show_big_button('login', 'Login'); ?></td>
            </tr>
            </table>
            </form>
            
        </div>
    </div>
    
    <div class="clear">&nbsp;</div>
</div>

<?php require 'includes/footer.php'; ?>

</body>
</html>