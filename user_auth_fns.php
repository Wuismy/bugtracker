<?php

	require_once('db_fns.php');

	//Register a new person w/ the DB
	function register($email, $real_name, $password) {
		
		//Connect to DB
		$conn = db_connect();
		
		//Check if email_adr is unique
		$result = $conn->query("select * from User where email='".$email."'");
		
		//Check if the SQL statement was excecuted
		if (!$result) {
			throw new Exception('SQL Error, couldn\'t test email address.');		
		}
		
		//Check if email address is already taken
		if ($result->num_rows > 0) {
			throw new Exception('Email address is already in use, please login or use another address.');				
		}
		
		//At this point, it's OK, so put in DB
		$result = $conn->query("insert into User values 
								('".$real_name."', sha1('".$password."'), '".$email."')");
								
		//Check if the SQL statement was excecuted
		if (!$result) {
			throw new Exception('Couldn\'t register account, please try again.');
		}
		
		return true;
						
	}
	
	
	
	
	
	function login($email, $password) {
	// check emailand password with db
	// if yes, return true
	// else throw exception

	  // connect to DB
	  $conn = db_connect();

	  // check if email is unique
	  $result = $conn->query("select * from User
	                         where email='".$email."'
	                         and password = sha1('".$password."')");
	  if (!$result) {
	     throw new Exception('Could not log you in, please try again');
	  }

	  if ($result->num_rows>0) {
	     return true;
	  } else {
	     throw new Exception('Could not find user, please try again.');
	  }
	}


	function check_valid_user() {
	// see if somebody is logged in and notify them if not
	
	  if (isset($_SESSION['valid_user']))  {
	      echo "Logged in as ".$_SESSION['valid_user'].".<br />";
		  //TODO: Get real_name from email address...maybe
	  } else {
	     // they are not logged in
	     do_html_heading('Not Logged In');
	     echo 'You are not logged in.<br />';
	     do_html_url('login.php', 'Login');
	     do_html_footer();
	     exit;
	  }
	}



	function change_password($email, $old_password, $new_password) {
	// change password for email/old_password to new_password
	

	  // if the old password is right
	  // change their password to new_password and return true
	  // else throw an exception
	  
	  login($email, $old_password);
	  $conn = db_connect();
	  $result = $conn->query("update User
	                          set password = sha1('".$new_password."')
	                          where email = '".$email."'");
	  if (!$result) {
	    throw new Exception('Password could not be changed.');
	  } else {
	    return true;  // changed successfully
	  }
	}
	
		
	// TODO:  figure out the dictionary
	function get_random_word($min_length, $max_length) {
	// grab a random word from dictionary between the two lengths
	// and return it

	   // generate a random word
	  $word = '';
	  // remember to change this path to suit your system
	  $dictionary = './dict.txt';  // the ispell dictionary
	  $fp = @fopen($dictionary, 'r');
	  if(!$fp) {
	    return false;
	  }
	  $size = filesize($dictionary);

	  // go to a random location in dictionary
	  $rand_location = rand(0, $size);
	  fseek($fp, $rand_location);

	  // get the next whole word of the right length in the file
	  while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
	     if (feof($fp)) {
	        fseek($fp, 0);        // if at end, go to start
	     }
	     $word = fgets($fp, 80);  // skip first word as it could be partial
	     $word = fgets($fp, 80);  // the potential password
	  }
	  $word = trim($word); // trim the trailing \n from fgets
	  return $word;
	}


	
	function reset_password($email) {
	// set password for user to a random value
	// return the new password or false on failure
	// get a random dictionary word b/w 6 and 13 chars in length
	  
	  $new_password = get_random_word(6, 12);

	  if($new_password == false) {
	    throw new Exception('Could not generate new password.');
	  }

	  // add a number  between 0 and 999 to it
	  
	  $rand_number = rand(0, 999);
	  $new_password .= $rand_number;


	  // set user's password to this in database or return false
	  $conn = db_connect();
	  $result = $conn->query("update User
	                          set password = sha1('".$new_password."')
	                          where email = '".$email."'");
	  if (!$result) {
	    throw new Exception('Could not change password.');  // not changed
	  } else {
	    return $new_password;  // changed successfully
	  }
	}

function notify_password($email, $password) {
// notify the user that their password has been changed

// CommentedCuz: Shouldn't have to look up email because it's sent in aleady

/*
    $conn = db_connect();
    $result = $conn->query("select email from User
                            where email='".$email."'");
    if (!$result) {
      throw new Exception('SQL Error: Couldn\'t find email address');
    } else if ($result->num_rows == 0) {
      throw new Exception('User not in database.');
      // username not in db
    } else {	
	  $row = $result->fetch_object();
	  $email = $row->email;
	*/ 
	
	  $from = "From: andrew@ProjectMayhem.com \r\n";
	  $mesg = "Your BugTracker password has been changed to ".$password."\r\n"
			  ."Please change it next time you log in.\r\n";

	  if (mail($email, 'BugTracker login information', $mesg, $from)) {
		return true;
	  } else {
		throw new Exception('Could not send email.');
	  }
    }
}

?>


