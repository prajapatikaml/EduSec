<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Fees Management',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>300,
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
	),
));
?>

<b><i><h4><?php echo CHtml::link("BACK",array('site/page', 'view'=>'menuwindow'));?></i></h4></b>
<p><h3 class="pop-feemaster-link"><?php echo CHtml::link("Fees Master",array('feesMaster/create'));?></p></h3>
<p><h3 class="pop-feetype-link"><?php echo CHtml::link("Fees Type",array('fees/create'));?></p></h3>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
