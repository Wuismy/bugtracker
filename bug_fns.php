<?php
	require_once('db_fns.php');
	
	
	// Returns an 2D Array, [each_bug][each_bug_attribute]
	
	function get_user_bugs($email) {
	
		$conn = db_connect();		
		
		// Iterate through the rows of bugs, create an array w/ all the info for one Bug, push 
		// into BUGS array
		
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
		
	}
	
	// Adds a new bug to the database
	function add_bug($_POST) {
		// POST contains: 
	}
	
	
	