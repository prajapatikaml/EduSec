<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Master',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>550,
                'resizable'=>false,
                'draggable'=>false,
	),
));
?>

<b><h4><?php echo CHtml::link("BACK",array('site/page', 'view'=>'menuwindow'));?></h4></b>
<div class="master1">

<p><h4 class="pop-batch-link"><?php echo CHtml::link("Batch",array('batch/admin'));?></p></h4>


<p><h4 class="pop-branch-link"><?php echo CHtml::link("Branch",array('branch/admin'));?></p></h4>


<p><h4 class="pop-category-link"><?php echo CHtml::link("Category",array('category/admin'));?></p></h4>


<p><h4 class="pop-department-link"><?php echo CHtml::link("Department",array('department/admin'));?></p></h4>

</div>

<div class="master2">



<p><h4 class="pop-division-link"><?php echo CHtml::link("Division",array('division/admin'));?></p></h4>



<p><h4 class="pop-empdesi-link"><?php echo CHtml::link("Employee Designation",array('employeeDesignation/admin'));?></p></h4>



<p><h4 class="pop-nationality-link"><?php echo CHtml::link("Nationality",array('nationality/admin'));?></p></h4>



<p><h4 class="pop-org-link"><?php echo CHtml::link("Organization",array('organization/admin'));?></p></h4>


<p><h4 class="pop-quota-link"><?php echo CHtml::link("Quota",array('quota/admin'));?></p></h4>



<p><h4 class="pop-religion-link"><?php echo CHtml::link("Religion",array('religion/admin'));?></p></h4>



<p><h4 class="pop-shift-link"><?php echo CHtml::link("Shift",array('shift/admin'));?></p></h4>

</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>





