<?php
	require_once('db_fns.php');
	
	
	// Returns an 2D Array, [each_bug][each_bug_attribute]
	
	function get_user_bugs($email) {
	
		$conn = db_connect();		
		
		// Iterate through the rows of bugs, create an array w/ all the info for one Bug, push 
		// into user_bugs_array
		
		$result = $conn->query("select bugID, email, project, project_version, bug_date, bug_time, title, description from Bugs where email = '".$email."'");
		
		if (!$result) {
			return false; //What happens with a false result
		}
		
		$user_bugs_array = array();
	
		// Each row is a given bug, with all the colums, pack each row into an array, then into
		// user_bugs_array
		for ($count = 0; $row = mysql_fetch_assoc($result); $count++) {
			$bug = array('bugID'=>$row['bugID'], 
						'email' => $row['email'], 
						'project' => $row['project'], 
						'project_version' => $row['project_version'],
						'bug_date' => $row['bug_date'], 
						'bug_time' => $row['bug_time'], 
						'title' => $row['title'], 
						'description' => $row['description'], 
						);
			$user_bugs_array[$count] = $bug;						
		}
		
		return $user_bugs_array;
	}
	
	// Adds a new bug to the database
	
	function add_bug($form_vars) {
		// $form_vars contains: project, project_version, title, description
		// Gotta make sure these are written: bugID, email, bug_date, bug_time
		// Throw an exception if it fails
		
		echo "Attempting to add $form_vars['title'] <br />";
		
		
		$email = $_SESSION['valid_user'];
		$project = $form_vars['project'];
		$project_version = $form_vars['project_version'];
		$title = $form_vars['title'];
		$description = $form_vars['title'];
		$conn = db_connect();
		
		//Check for a repeat entry by checking the title description, and project_version
		
		$result = $conn-query("select * from Bugs
							   where email='$email' and
							   title='$title' and
							   description='$description' and
							   project_version='$project_version'");
								
		if ($result && ($result->num_rows > 0)) {
			throw new Exception('Bug aleady exists.');
		}
		
		// Create additional bug vars						
		$bug_date = date('c'); //Returns the date in ISO 8601, to fit into MySQL
		$bug_time = time(); // The # of seconds since the epoch
		
		
		//Insert the bug, using double single quotes for bugID, which autoincrements		
		if(!$conn->query("insert into Bugs values '', 
						'$email', '$project', 
						'$project_version', '$bug_date',
						'$bug_time', '$title', 
						'$description' ")) {
		
			throw new Exception('Bug could\'t be inserted, please try again.');
		}
		
		
		
		return true;
	}
	
	//bugID might be tricky, I GUESS WE'LL HAVE TO WAIT AND SEE
	function delete_bug($email, $bugID) {
		
		$conn = db_connect();
		
		if (!$conn->query("delete from Bugs where 
						  email='$email' and
						  bugID='$bugID'")) {
			
			throw new Exception('Bug couldn\'t be deleted.');
		}
		
		return true;		
	}
	
	
	