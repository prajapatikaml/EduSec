<?php
	$status = $_REQUEST['status'];
	if($status == 'success')
	  echo "<p style='color:#000;'>Password sent to your registered Email.</p><br /><a href='login'>Click here to Login </a>";
	else if($status == 'user_not_exist')
	  echo "<p style='color:#000;'>Please enter valid email address. This email address does not exist.</p><br /><a href='login'>Click here to Login </a>";
	else if($status == 'getway-error')
	  echo "<p style='color:#000;'>SMS getway error occured..</p><br /><a href='login'>Click here to Login </a>";

?>
