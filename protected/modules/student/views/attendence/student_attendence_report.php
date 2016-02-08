<script>
function valuealert1()
{
	$('#Attendence_end_date').attr("disabled",false);
	$('#Attendence_start_date').attr("disabled",false);
	$('#months').attr("disabled",true);	
}
function valuealert2()
{
	$('#Attendence_end_date').attr("disabled",true);
	$('#Attendence_start_date').attr("disabled",true);
	$('#months').attr("disabled",false);	
}
</script>
<style>
div.form label
{
	width:80px !important;
}
</style>
<?php
$this->breadcrumbs=array(
	'Student Attendance Report',
	
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<div class="form" style="float:left;width:50%;margin-left:10px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentwise-form',
	'enableAjaxValidation'=>true,

)); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no_student_found'); ?>
		
	</div>
	<p class="note">Select any radio-button to enable Date or Month criteria.<span class="required">*</span></p>


	<div class="row">
		<div  style=" float:left; margin-right:10px;">
		<input type="radio" name="studentradio" id="btn1" value="1" onclick="valuealert1()"/>
		<?php echo $form->labelEx($model,'start_date', array('style'=>'width: 126px;')); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'start_date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			    'yearRange'=>'1900:'.date('Y'),
			),
			'htmlOptions'=>array('disabled'=>'disabled',
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;'

			)
		    )
		);
	?>   
		</div>
		<div style=" float:left;">
		 <?php echo $form->labelEx($model,'end_date', array('style'=>'width: 60px;')); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'end_date',
			'language' => 'en',
			'options' => array(
			    'dateFormat'=>'dd-mm-yy',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			    'yearRange'=>'1900:'.date('Y'),
			),
			'htmlOptions'=>array('disabled'=>'disabled',
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;'

			)
		    )
		);
	?>
		</div>
</div>



	<?php
	$months = array();

	for( $i = 1; $i <= 12; $i++ ) {
	    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ) );
	} ?>
	<div class="row">
	<input type="radio" name="studentradio" id="btn2" value="2" onclick="valuealert2()"/>
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month',  array('style'=>'width: 126px;')); ?>

	<?php
		echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select Month','disabled'=>'disabled'));
	?>
	</div>


<div class="row buttons">
	<?php echo CHtml::submitButton('Search', array('class'=>'submit','name'=>'search','style'=>'margin-bottom:30px;')); ?>
</div>

<?php $this->endWidget(); ?>
</div>
</div>

