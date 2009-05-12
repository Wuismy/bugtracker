<?php
	require_once('bookmark_fns.php');
	session_start();		
	
	do_html_header('Adding Bug');
	
	try {
		check_valid_user();
		if (!filled_out($_POST)) {
			throw new Exception('Please fill out all fields');
		}
	
		// Need to automagically add to db: bugID, email, bug_date, bug_time	
		//Add bug, repassing post because the vars are filled out
		$email = $_SESSION['valid_user'];
		add_bug($_POST, $email);
		echo 'Bug Added.';
		
		//Get the bugs the user has access to
		if ($bug_array = $get_user_bugs($_SESSION['valid_user'])) {
			display_user_bugs($bug_array);
		}					
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	display_user_menu();
	do_html_footer();
?>