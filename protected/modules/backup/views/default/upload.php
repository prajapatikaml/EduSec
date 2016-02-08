<?php
$this->breadcrumbs=array(
	'backup'=>array('index'),
	'Upload',
);?>
<h1><?php echo $this->action->id; ?></h1>

<div class="form">


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'install-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
		<div class="row">
		<?php echo $form->labelEx($model,'upload_file'); ?>
		<?php echo $form->fileField($model,'upload_file'); ?>
		<?php echo $form->error($model,'upload_file'); ?>
		</div><!-- row -->	
<?php
	echo CHtml::submitButton(Yii::t('app', 'Save'),array('class'=>'submit'));
	$this->endWidget();
?>
</div><!-- form -->
