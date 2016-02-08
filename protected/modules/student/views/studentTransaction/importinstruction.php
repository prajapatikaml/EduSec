<?php
	echo "</br></br>";
	echo "<b> You Must have to follow the following instruction at the time of importing data</b>"."</br>"."</br>";	
	echo "1. Student Id must be unique."."</br>";
	echo "2. Student Email Address must be unique."."</br>";
	echo "3. Student Enrollment Number must be unique."."</br>";
	echo "4. The field with Red color are the required field."."</br></br>";
	echo "Download the sample format of Excel sheet. ";
	?>&nbsp;
	<?php	
	echo CHtml::link(CHtml::encode('Download'),Yii::app()->baseUrl."/excel_sheet_format/"."studenttransaction.xlsx", $htmlOptions=array("target"=>"_blank"));
	?>
<?php

$this->menu=array(
//	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	
	array('label'=>'', 'url'=>array('/importation/studentTransaction/import'),'linkOptions'=>array('class'=>'remaining_employee','title'=>'Import Student Data')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

