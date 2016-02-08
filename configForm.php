<?php
if($_POST) {
$connect = mysql_connect($_POST['dbHost'], $_POST['dbUser'], $_POST['dbPass']); 

  if($connect) {
	if(mysql_select_db($_POST['dbName'])) {
		$dbConf = 'dbconf.php';
		$handle = fopen($dbConf, 'w') or die('Cannot open file:  '.$dbConf);
		$data = '<?php $userName="'.$_POST['dbUser'].'";'."\n";
		$data .= '$passWord="'.$_POST['dbPass'].'";'."\n";
		$data .= '$dbName="'.$_POST['dbName'].'";'."\n";
		$data .= '$host="'.$_POST['dbHost'].'"; ?>';
		fwrite($handle, $data);
    		
		header('Location: ' . 'site/index');
	}
	else {
	  $error = 'Could not select database.';
	}
    }
  else
   $error = 'Not connected';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Edusec Installation</title>
<link href="<?php echo $_SERVER['REQUEST_URI']?>/../css/installation.css" type="text/css" rel="stylesheet">
    </head>
   <div class="container">
   <div class="content">
	<div class="header">
		<div class="app-logo">
		   <img src="<?php echo $_SERVER['REQUEST_URI']?>/../images/product.png" alt="logo" /> 
		</div>
		<h1 class="title">Installation Page</h1>
		<span>Welcome to the Edusec application installer! We need to collect a little information before we can get your application up and running.</span>
	</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div id="db-form-box">
        <div class="row"><label for="dbHost">Host Name</label><input type="text" id="dbHost" name="dbHost"></div>
        <div class="row"><label for="dbUser">Username</label><input type="text" id="dbUser" name="dbUser"></div>
        <div class="row"><label for="dbPass">Password</label><input type="password" id="dbPass" name="dbPass"></div>
        <div class="row"><label for="dbName">Database Name</label><input type="text" id="dbName" name="dbName"></div>

    </div>
<input type="submit" value="Save" class="btnblue">
</form>
<div class="check-db-status">
   <?php echo $error; ?>
</div>
</div>
</div></body>
</html>
