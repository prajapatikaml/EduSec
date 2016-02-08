<?php
$this->breadcrumbs=array(
	'Not Authorised',
);
echo CHtml::link("GO BACK",array('studentTransaction/update','id'=>Yii::app()->user->getState('stud_id')));

echo "</br>";
echo "<h4>You are not authorised to perform this action</h4>"; 

?>
