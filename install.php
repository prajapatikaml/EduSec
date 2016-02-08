<?php
$flag = 0;
$error_list = array();

if(!version_compare(PHP_VERSION, "5.2.2", ">=")) {
  $error_list[] = 'Need atleast or greater version of PHP 5.2.2';
  $flag = 1;
}

$dir = str_replace("dbConfig", "", dirname(__FILE__));

$assestsDir = $dir.'assets';
$collegeDir = $dir.'college_data';
$runtimeDir = $dir.'protected/runtime';
$dbConfigDir = $dir.'dbConfig';

if (!is_writable($assestsDir)) {
  $error_list[] = $assestsDir . ' must be writable!!!';
  $flag = 1;
} 

if (!is_writable($collegeDir)) {
  $error_list[] = $collegeDir . ' must be writable!!!';
  $flag = 1;
} 

if (!is_writable($runtimeDir)) {
  $error_list[] = $runtimeDir . ' must be writable!!!';
  $flag = 1;
} 

if (!is_writable($dbConfigDir)) {
  $error_list[] = $dbConfigDir . ' must be writable!!!';
  $flag = 1;
} 

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Edusec Installation</title>
<?php $approot = str_replace("dbConfig", "", substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT'])));  ?>
<link href="<?php echo $approot; ?>/css/installation.css" type="text/css" rel="stylesheet">
<link href="<?php echo $approot; ?>/themes/EduSec/css/login.css" type="text/css" rel="stylesheet">
    </head>
   <body>
<div class ="install-header" >
	<div class="app-logo" style="padding-left: 10px;">
	   <img src="../images/product.png" alt="logo" /> 
	</div>
</div>
   <div class="container">
      <div class="content" style="min-height: 300px; height: auto; width: 450px; margin: 150px auto; ">
	<div class="header">
		<h1 class="title">Installation Page</h1>
	</div>
	<div class="install-instruct">
		<div class="install-details">
			<span>Welcome to the Edusec application installer! We need to collect a little information before we can get your application up and running.</span>
		</div><br />
	

		<?php if($flag == 1) { ?>
			<div class="require-note">
			<ul class="error-list">
			<h1 class="title">Cannot install Edusec </h1> 
		<?php	
			foreach($error_list as $err)
			   echo "<li>".$err."</li>";
			echo '</ul></div>';
		}

		else {
			if($flag == 0)
			   unlink(dirname(__FILE__).'/install.php');
		    
		    echo '<div class="req-finish">';
		    echo 'System requirement checking successfully completed <a href="../configForm.php">Click here</a> for database connectivity</div>';
		}
		?>
	</div>
     </div>
    </div>
</body>
</html>


