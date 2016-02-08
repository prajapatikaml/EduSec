<?php
$this->breadcrumbs=array(
	'Error',
);
	echo '<br />';
	echo '<br />';
	echo $error."<br />";
echo CHtml::link('GO BACK',Yii::app()->createUrl('/student/studentSmsEmailDetails/studentbulksmsemail'));
?>

