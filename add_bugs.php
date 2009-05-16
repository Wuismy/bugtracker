<?php
	require_once('bookmark_fns.php');
	session_start();		
	
	do_html_header('Adding Bug');
	
	try {
		check_valid_user();
		if (!filled_out($_POST)) {
			throw new Exception('Please fill out all fields');
		}
	
		
		
	
		$form_vars = array(	'project' => $_POST['project'], 
							'project_version' => $_POST['project_version'], 
							'title' => $_POST['title'], 
							'description' => $_POST['description'], 
							);
		
		// Make the form input safe for db entry
		foreach($form_vars as $key => $value) {
			$value = addslashes(htmlspecialchars(strip_tags($value)));
		}
		
		
		add_bug($form_vars);
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