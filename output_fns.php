<?php

	function do_html_header($title) {

?> // Close php for some easier HTML outputting

	<html>
	<head>
		<title><?php echo $title;?></title>
		<style>
			body {
				font-family: "Tw Cen MT"; 
				font-size: 14px;
				color: #011A8E
			}
			li, td {
				font-family: "Tw Cen MT"; 
				font-size: 14px;
				color: #011A8E			
			}
			hr {
				color #3333cc; 
				width=300px; 
				text-align:left
			}
			a {
				color: #000000		
			}
		</style>
	</head>	
	<body>
	
	<h1>BugTracker</h1>
	<hr />
	<?php
		if ($title) {
			do_html_heading($title);		
		}
	}
		
	function do_html_footer() {
	  // print an HTML footer
	?>
	  </body>
	  </html>
	<?php
	}
	
	function do_html_heading($heading) {
	  // print heading
	?>
	  <h2><?php echo $heading;?></h2>
	<?php
	}

	function display_site_info() {	  
	?>
	  <ul>
	  <li>Keep your projects organized with BugTracker
	  </li>
	  </ul>
	<?php
	}
	
	function display_login_form() {
	?>
	
	<p>
	<a href="register_form.php">Not a member?</a>
	</p>
	<form method="post" action="member.php">
	<table bgcolor="#cccccc">
	<tr>
		<td colspan="2">Members log in here:</td>
	<tr>
		<td>Username:<td>
		<td><input type="text" name="username"/>
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="text" name="password"/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Log in"/>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="forgot_form.php">Forgot your password?</a>
		</td>
	</tr>
	</table>
	</form>	
	<?php
}
	
	
	
	