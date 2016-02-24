<?php

function send_html_email($to, $to_name, $from, $from_name, $subject, $message)
{
	
	$arr = array();
	
	if (strpos($to, ',') !== false) {
		$arr = explode(',', $to);
	} else {
		$arr = array($to);
	}
	
	record_form($subject, $message, 1);
	
	foreach ($arr as $to) {
		
		$to = trim($to);
		
		$mail = new PHPMailer();
			
		$mail->AddReplyTo($from, $from_name);
		$mail->SetFrom($from, $from_name);
		
		$mail->AddAddress($to);
		
		$mail->Subject = $subject;
		
		$mail->AltBody = "If you want to view the message, use an HTML compatible email viewer!"; 
		
		$mail->MsgHTML($message);
		
		$mail->Send();
		
	}
}

function send_text_email($to, $from, $subject, $message)
{
	$arr = array();
	
	if (strpos($to, ',') !== false) {
		$arr = explode(',', $to);
	} else {
		$arr = array($to);
	}
	
	record_form($subject, $message, 0);
	
	$message = nl2br($message);
	
	foreach ($arr as $to) {
		
		$mail = new PHPMailer();
		
		$mail->AddReplyTo($from);
		$mail->SetFrom($from);
		
		$mail->AddAddress($to);
		
		$mail->Subject = $subject;
		
		$mail->AltBody = "If you want to view the message, use an HTML compatible email viewer!";
		
		$mail->MsgHTML($message);
		
		$mail->Send();
		
	}
}

function validate_email($email)
{
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		return false;
	}
	
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
		  return false;
		}
	}
	
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false;
		}
		
		for ($i = 0; $i < sizeof($domain_array); $i++) {
		  if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
			return false;
		  }
		}
	}
	
	return true;
}

?>