<?php

	// Test that each variable has a value
	function filled_out($form_vars) {		
		foreach ($form_vars as $key => $value) {
			if ( (!isset($key)) || ($value == '') ) {
				return false;
			}		
		}	
		return true;
	}
	
	//Check if the syntax of the email is valid
	function valid_email($address) {
	// TODO: check mx record for email address, part of PEAR::Net_DNS package in windows, or
	// dns_get_mx(), page 459 in book.
		if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
			return true;
		}
		else {
			return false;
		}	
	}