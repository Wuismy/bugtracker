<?php

	require_once('bookmark_fns.php');
	
	//Create variables from the form
	$email = $_POST['email'];
	$real_name = $_POST['real_name'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	
	//Start the session now because it must go before headers
	session_start();
	
	try {
		// Make sure the forms are filled in
		if (!filled_out($_POST)) {
			throw new Exception('Please fill out all required forms.');		
		}
				
		//Make sure the email address is valid
		if (!valid_email($email)) {
			throw new Exception('Please use a valid email address');				
		}
		
		//Make sure the passwords are the same
		if ($password != $password2) {
			throw new Exception('Passwords not the same, please retry.');		
		}
		
		//Check password length
		if ((strlen($password) < 6) || (strlen($password2) >16)) {
			throw new Exception('Please enter a password between 6 and 16 characters.');					
		}
		
		// Try to register (this function can throw an exception)
		register($email, $real_name, $password);
		// "Register session variable"
		$_SESSION['valid_user'] = $email; // Use email instead of username (like in the book) because it's 
										  // easier for users to remember an email address across diff sites
		
		
		//Provide link to members page
		do_html_header('Registration successful');
		echo 'Your registration was successful!';
		do_html_url('member.php', 'Get Started!');
		
		do_html_footer();		
	}
	catch (Exception $e) {
		do_html_header('Oops!');
		echo $e->getMessage();
		do_html_footer();
		exit;		
	}
	
?>