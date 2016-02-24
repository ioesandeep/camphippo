<?php

	require 'application.php';
	
	$messages = array();
	
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$where = sprintf('email = "%s"', mysql_escape_string($email));
		$admin = table_fetch_row(TBL_ADMIN, $where);
		
		if ($admin == false) {
			$messages[] = 'Invalid email, email is not registered.';
		} else {
			$messages[] = 'Email sent successfully to your account.';
			$password = random_word(6);
			
			$fields = array('password');
			$values = array('password' => md5($password));
			$where = sprintf('id = %d', $admin['id']);
			table_update(TBL_ADMIN, $fields, $values, $where);
			
			$to = $email;
			$from = get_settings_value('contact_email');
			$subject = 'Forgot Password?';
			
			$message = <<<MESSAGE
				Email: {$email}
				Password: {$password}
MESSAGE;
		}
		
		
		send_text_email($to, $from, $subject, $message);
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
        	<form id="forgotpassword-form" class="validate-form" method="post" action="forgot-password.php">
            <table>
            <tr>
              <td colspan="3" align="center"><h1>Forgot Password</h1></td>
            </tr>
            <tr>
            	<td colspan="3"><?php show_messages($messages); ?></td>
            </tr>
            <tr>
                <td nowrap="nowrap">Email Address:</td>
                <td><input class="required email" size="35" maxlength="100" type="text" name="email" id="email" value="" /></td>
                <td>
                	<button name="forgot_password" class="big" type="submit">
                        <span class="left"><span class="right"><span class="text">Retrieve</span></span></span>
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><a href="login.php">Click here to Login!</a></td>
            </tr>
            </table>
            </form>
            
        </div>
    </div>
    
</div>

</body>
</html>