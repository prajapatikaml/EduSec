<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Control Panel',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>500,
                'resizable'=>false,
                'draggable'=>false,
		
	),
));
?>

<!--<?php CHtml::link('<img alt = "/site/page/master" src ="' . Yii::app()->request->baseUrl.'/images/Configuration_mgnt.png');?>-->
<b><?php echo CHtml::link("BACK",array('site/page', 'view'=>'mainmenu'));?></b>

<!--<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/Employee_info.png', 'Employee'); ?>-->
<div class="master1">
<div class="pop-master-link">
<p><?php echo CHtml::link("Master",array('/site/page', 'view'=>'master'));?>
</div>


<div class="pop-emp-link">
<p><?php echo CHtml::link("Employee",array('employeeTransaction/create'));?></p>
</div>
</div>
<div class="master1">
<div class="pop-stud-link">
<p><?php echo CHtml::link("Student",array('/site/page', 'view'=>'student'));?></p>
</div>

<div class="pop-fee-link">
<p><?php echo CHtml::link("Fees",array('/site/page', 'view'=>'fees'));?></p></h3>
</div>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>





