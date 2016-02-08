<?php
$error = '';
if($_POST) {

$connect = mysql_connect($_POST['dbHost'], $_POST['dbUser'], $_POST['dbPass']); 

  if($connect) {
	if(mysql_select_db($_POST['dbName'])) {
		//$dir =  $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI']; 
		//$redirectUrl = str_replace("configForm.php","site/index", $dir);
		//print $redirectUrl; exit;
		$dbConf = dirname(__FILE__).'/dbConfig/dbconf.php';
		$handle = fopen($dbConf, 'w') or die('Cannot open file:  '.$dbConf);
		$data = '<?php $userName="'.$_POST['dbUser'].'";'."\n";
		$data .= '$passWord="'.$_POST['dbPass'].'";'."\n";
		$data .= '$dbName="'.$_POST['dbName'].'";'."\n";
		$data .= '$host="'.$_POST['dbHost'].'"; ?>';
		fwrite($handle, $data);
		header('Location: site/index'); 
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
	<?php $approot = substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT'])); ?>
	<link href="<?php echo $_SERVER['REQUEST_URI']?>/../css/installation.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $approot; ?>/themes/EduSec/css/login.css" type="text/css" rel="stylesheet">
    </head>

<body>
<div class ="install-header" >
	<div class="app-logo" style="padding-left: 10px;">
	   <img src="<?php echo $_SERVER['REQUEST_URI']?>/../images/product.png" alt="logo" /> 
	</div>
</div>
   <div class="container">
   <div class="content" style="height: 400px; width: 600px; margin: 100px auto; ">
	<div class="header">
		<h1 class="title">Installation Page</h1>
	</div>

	<div class="install-instruct" style="float: left; height: 350px; width: 205px;">
	    <div class="install-details" style="padding-top: 120px;">
		<span>Welcome to the Edusec application installer! We need to collect a little information before we can get your application up and running.</span>
	 </div>
       </div>
	
	<div class='db-form' style="float: left; width: 350px; margin-top: 20px; background: none repeat scroll 0% 0% rgb(249, 249, 251);">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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

     </div>
  </div>
</body>
</html>
