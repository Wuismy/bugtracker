<?php
	
	require_once("bookmark_fns.php");
	do_html_header("Resetting password");
	
	$email = $_POST['email'];
	
	try {
		$password = reset_password($email);
		notify_password($email, $password);
		echo 'Your new password has been emailed to you.<br />';
	}
	catch (Exception $e) {
		echo $e->getMessage().' please try again.';
	}
	do_html_url('login.php', 'Login');
	do_html_footer();
	
?>