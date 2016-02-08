<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Edusec Installation</title>
	<?php $approot = substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT'])); ?>
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
   <div class="content" style="height: 300px; width: 350px; margin: 150px auto; ">
	<div class="header">
		<h1 class="title">Installation Page</h1>
	</div>
	<div class="install-instruct">
	<?php 
		$sql = file_get_contents(Yii::app()->basePath.'/data/db.sql');
		$command=Yii::app()->db->createCommand($sql);
		$command->execute();	

		echo '<span style="float: left; margin-top:10px; color: green; font-size: 15px;">Database configuratin process completed. Please '.CHtml::link('click here', Yii::app()->createUrl('site/createOrg')).' to create an Institute.</span>'; 

	?>
	</div>
     </div>
   </div>
</body>
</html> 
