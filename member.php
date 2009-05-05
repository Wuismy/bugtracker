<?php
	
	// This page is displayed after a user logs in at login.php.. it is the main page(I think)

	require_once('bookmark_fns.php');
	session_start();
	
	//Create variable names from POST
	$email = $_POST['email_adr'];
	$password = $_POST['password'];
		
	if($email && $password) {
	// They are visiting the page after just having logged in
		try {
			login($username, $password);
			// login throws an exception on fail, so at this point we know it worked
			$_SESSION['valid_user'] = $username;
		}
		catch(Exception $e) {
			do_html_header('Login Error');
			$e->getMessage();
			do_html_url('login.php', 'Login');
			do_html_footer();
			exit;
		}			
	}		
	
	do_html_header('Home');
	//Check if the are visiting the page in the midst of being logged in
	check_valid_user();
	// TODO: Get the bugs this user has access to
	// TODO: Write these functions
	if ($bug_array = $get_user_bugs($_SESSION['valid_user'])) {
		display_user_bugs($bug_array);	
	}
	
	// TODO: Display User options
	display_user_menu();
	
	do_html_footer();
?>