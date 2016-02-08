<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Student Information',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>300,
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
	),
));
?>

<b><h4><?php echo CHtml::link("BACK",array('site/page', 'view'=>'menuwindow'));?></h4></b>
<p><h3 class="pop-studadd-link"><?php echo CHtml::link("Add Student",array('studentTransaction/create'));?></p></h3>
<p><h3 class="pop-studaddfee-link"><?php echo CHtml::link("Add Student Fees",array('site/test'));?></p></h3>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
