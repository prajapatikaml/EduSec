<?php
	$status = $_REQUEST['status'];
	if($status == 'success')
	  echo "<p style='color:white;'>Password sent to your registered email address.</p><br /><a href='login'>Click here to Login </a>";
	else if($status == 'user_not_exist')
	  echo "<p style='color:white;'>Please enter valid email address. This email address does not exist.</p><br /><a href='login'>Click here to Login </a>";
	else if($status == 'getway-error')
	  echo "<p style='color:white;'>SMS getway error occured..</p><br /><a href='login'>Click here to Login </a>";

?>
