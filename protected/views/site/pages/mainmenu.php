<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Main Menu',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>430,
                'resizable'=>false,
                'draggable'=>false,
		
	),
));
?>

<b><?php echo CHtml::link("HOME",array('/site/index'));?></b>

<p>
<h3 class="pop-mainorg-link">
<?php
//if(Yii::app()->user->getState('role')=='sadmin')
//{
echo CHtml::link("Create Organization",array('organization/index'));
//}
?></h3>

<h3 class="pop-mainadmin-link">
<?php
//if(Yii::app()->user->getState('role')=='sadmin')
//{
echo CHtml::link("Create Admin",array('user/index'));
//}
?></h3>

<h3 class="pop-mainpanel-link"><?php echo CHtml::link("Control Panel",array('site/page', 'view'=>'menuwindow'));
?></h3></p>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
