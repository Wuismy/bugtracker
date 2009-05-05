<?php

	require_once('bookmark_fns.php');
	session_start();
	
	$old_user = $_SESSION['valid_user'];
	
	// "Store to test if they *were* logged in"
	unset($_SESSION['valid_user']);
	$result_dest = session_destroy();
	
	//Start output html
	do_html_header('Logging Out');
	
	if (!empty($old_user)) {
		if($result_dest) {
			//They were logged in and are now logged out
			echo 'Logged out.<br />';
			do_html_url('login.php', 'Login');
		}
		else {
			//They were logged in but not logged out
			echo 'Couldn\'t log out. <br />';
		}
	}
	else {
		echo 'Not logged in.<br />';
		do_html_url('login.php', 'Login');
	}
	
	do_html_footer();
	
?>