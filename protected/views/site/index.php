<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Edusec Installation</title>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/installation.css" type="text/css" rel="stylesheet">
    </head>
   <div class="container">
   <div class="content">
	<div class="header">
		<div class="app-logo">
		   <img src="<?php echo Yii::app()->baseUrl; ?>/images/product.png" alt="logo" /> 
		</div>
	</div>


<?php 

	$sql = file_get_contents(Yii::app()->basePath.'/data/db.sql');
	$command=Yii::app()->db->createCommand($sql);
	$command->execute();	

echo '<span style="float: left; margin-top:10px; color: green; font-size: 15px;">Database configuratin process completed. Please '.CHtml::link('click here', 'createOrg').' to create an Institute.</span>'; 

?>

</div>
</div></body>
</html> 
