<div class="form">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Students Preferred Branches',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("student/studentRegistrationInfo/admin").'"; }'
	),
));
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-approve-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<?php
	$branch = unserialize($model->student_branch_id);
	foreach($branch as $k=>$v){
?>
		<div class = 'row'>
<?php
		echo Branch::model()->findByPk($v)->branch_name;
		echo $form->radioButton($model, 'student_branch_id', array(
		    'value'=>$v,
		    'uncheckValue'=>null,
		    'checked'=>false,
		    'onchange'=>'this.form.submit()',
		));
?>
		</div>
		</br>
<?php
	}
?>

<?php $this->endWidget(); ?>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div><!-- form -->
