<?php

	function db_connect() {
		
		$result = new mysqli('Localhost', 'yourrugb_bleeda', 'DONUTS22', 'yourrugby_BugTracker');
		if (!$result) {
			throw new Exception('Could not connect to database server.');
		}
		else {
			return $result;
		}			
	}
	
?>