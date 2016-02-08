<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Edusec Installation</title>
	<link href="<?php echo Yii::app()->baseUrl; ?>/css/installation.css" type="text/css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" type="text/css" rel="stylesheet">
    </head>
<body>
	<div class ="install-header" >
		<div class="app-logo" style="padding-left: 10px;">
		   <img src="<?php echo Yii::app()->baseUrl; ?>/images/product.png" alt="logo" /> 
		</div>
	</div>
	<div class="container">
	 <div class="content" style="height: 565px; width: 700px; margin:10px auto;">
		<?php
		echo $content;
		?>
          </div>
        </div>
</body>
</html> 
