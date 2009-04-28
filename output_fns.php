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
		<td>Email Address:<td>
		<td><input type="text" name="email_adr"/>
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


function display_registration_form() {
?>
 <form method="post" action="register_new.php">
 <table bgcolor="#cccccc">
	<tr>
     <td>Name:</td>
     <td><input type="text" name="real_name" size="30" maxlength="100"/></td></tr>   
    <tr>
	<tr>
     <td>Email address:</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>   
   <tr>
     <td>Password:</td>
     <td valign="top"><input type="password" name="password"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>Confirm password:</td>
     <td><input type="password" name="password2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="Register"></td></tr>
 </table></form>
<?php

}
	
	
function display_password_form() {
  // display html change password form
?>
   <br />
   <form action="change_password.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_password"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_password"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_password2"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan="2" align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
   <br />
<?php
}


function display_forgot_form() {
  // display HTML form to reset and email password
?>
   <br />
   <form action="forgot_password.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Enter your email address:</td>
       <td><input type="text" name="email_adr" size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan=2 align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
   <br />

}


