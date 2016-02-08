
<?php
$this->breadcrumbs=array(
	'Multiple Certificate',	
);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificate-generate',
	
)); ?>
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no-student-found'); ?>
	</div>
	

	
	<div class="row">
		<?php echo CHtml::label('Certificate Type','');?>
		 <?php echo CHtml::dropDownList('certificate_type', null, Certificate::items(),array('empty'=>'----------Select----------','tabindex'=>1));?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Academic Period','');?>
		 <?php echo CHtml::dropDownList('period',null,AcademicTermPeriod::items(),
			array(
			'prompt' => '----------Select-----------','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getCertificateSem'), 
			'update'=>'#sem', //selector to update
			
			))); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Semester','');?>
		 <?php echo CHtml::dropDownList('sem', null, array(),array('empty'=>'----------Select----------','tabindex'=>3));?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Branch','');?>
		 <?php echo CHtml::dropDownList('branch', null, Branch::items(),array('empty'=>'----------Select----------','tabindex'=>4));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit','tabindex'=>5));
		?>
	</div>

<?php		
if(!empty($query))
{
		$index=6;
		$i=1;
		echo "<h6 style='color:red'>".Yii::app()->user->getFlash('no_selected').'</h6>';

	if(!empty($data))
	{
		foreach($data as $list)
		{				
		  	$name_lable = $list['student_first_name'].' '.$list['student_last_name'].' ('.$list['student_enroll_no'].')';
			if($i==4)
			{
				echo "</br>";
				$i=0;
			}
?>
		<div class="row-check" style="float: left;">
			<?php echo CHtml::checkBox('st_id[]',true, array('value'=>$list['student_transaction_id'], 'uncheckValue'=>null, 'tabindex'=>$index)); ?>
			<?php echo "<h5 style='float:left; width:250px; padding-left: 5px; '>".$name_lable."</h5>" ?>				
		</div>
<?php  
			$i +=1;
			$index +=1;			
		}
?><input type="hidden" name='query' value="<?php echo $query;?>">
  <input type="hidden" name='certi' value="<?php echo $certi;?>">
		<div class="row buttons">
		<?php echo CHtml::button('Submit', array('submit'=>'selectedstudent','class'=>'submit','tabindex'=>$index));
		?>
		</div>
<?php
		}
		else
			echo "<h6 style='color:red'> No Student Found.</h6>";	
}

?>
<?php $this->endWidget(); ?>

</div><!-- form -->

