<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'daywise-student-form',
	'enableAjaxValidation'=>true,

)); ?>

<?php
$months = array();

for( $i = 1; $i <= 12; $i++ ) {
    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ) );
}
?>
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_enroll_no'); ?>
		<?php echo $form->textField($model,'student_enroll_no',array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_enroll_no'); ?>
	</div>

	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month'); ?>

	<?php
		echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select Month','tabindex'=>2));
	?>
	</div>
	
<div class="row buttons">
	<?php //echo CHtml::submitButton('Search', array('en_no'=>$model->student_enroll_no,'class'=>'submit','name'=>'search','tabindex'=>4)); 
		echo CHtml::button('Search', array('submit'=>array('Monthwise_attend_report'),'class'=>'submit','name'=>'search','tabindex'=>3));
	?>
</div>

<?php $this->endWidget(); ?>
</div>


