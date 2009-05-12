<?php
	require_once('bookmark_fns.php');
	session_start();
	
	do_html_header('Add Bugs');
	
	check_valid_user();
	display_add_bug_form();
	
	display_user_menu();
	do_html_footer();
	
?>