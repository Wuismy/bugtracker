<?php

	require_once('bookmark_fns.php');
	session_start();
	do_html_header('Changing password');
	
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$new_password2 = $_POST['new_password2'];
	
	try {
		check_valid_user();
		
		if(!filled_out($_POST)) {
			throw new Exception('Please fill out the form completely.')
		}
		if($new_password != $new_password2) {
			throw new Exception('Passwords were not the same, please retry.');
		}
		if((strlen($new_password) > 16) || (strlen($new_password) < 6)) {
			throw new Exception('Please enter a password between 6 and 16 characters.');
		}
		
		//Attempt to update the password
		change_password($_SESSION['valid_user'], $old_password, $new_password);
		//At this point change_password is a success
		echo 'Password Changed.';	
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	
	//TODO: Potentially have to rewrite this function
	display_user_menu();
	do_html_footer();

?>
	