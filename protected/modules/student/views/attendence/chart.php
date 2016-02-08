<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select'); ?>
	</div>

	
	<div class="row">
	<div>
        <?php echo $form->labelEx($model,'acdm_period'); ?>
        <?php //echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(), array('empty' => '-----------Select---------','tabindex'=>17)); ?>
	<?php
			echo $form->dropDownList($model,'acdm_period',AcademicTermPeriod::items(),
			array(
			'prompt' => 'Select Year','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Attendence/getItemName1'), 
			'update'=>'#Attendence_acdm_name', //selector to update
			
			))); 
			 
			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'acdm_period'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'acdm_name'); ?>
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php 
			
			if(isset($model->acdm_name))
				echo $form->dropDownList($model,'acdm_name', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_id='.$model->acdm_name)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'acdm_name',array('prompt' => 'Select Semester'),array('tabindex'=>3)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'acdm_name'); ?>
	</div>	


    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch'); ?>
		<?php //echo $form->dropDownList($model,'branch',Branch::items(), array('empty' => '---------------Select-------------','tabindex'=>4)); ?>
		<?php
			echo $form->dropDownList($model,'branch',Branch::items(),
			array(
			'prompt' => 'Select Branch','tabindex'=>2,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('Attendence/getItemBranch'), 
			'update'=>'#Attendence_div', //selector to update
			
			))); 			 
			?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'div'); ?>		
		<?php //echo $form->dropDownList($model,'div',Division::items(), array('empty' => '---------------Select-------------','tabindex'=>5)); ?>
		<?php 
			
			if(isset($model->div))
				echo $form->dropDownList($model,'div', CHtml::listData(Division::model()->findAll(array('condition'=>'division_id='.$model->div)), 'division_id', 'division_name'));
			else
				echo $form->dropDownList($model,'div',array('prompt' => 'Select Division'),array('tabindex'=>3)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'div'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'batch'); ?>
		<?php echo $form->dropDownList($model,'batch',Batch::items(), array('empty' => '---------------Select-------------','tabindex'=>7)); ?>
		<!--<?php 
			
			if(isset($model->batch))
				echo $form->dropDownList($model,'batch', CHtml::listData(Division::model()->findAll(array('condition'=>'batch_id='.$model->batch)), 'batch_id', 'batch_name'));
			else
				echo $form->dropDownList($model,'batch',array('prompt' => '---------------Select-------------'),array('tabindex'=>3)); 
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'batch'); ?>
    	</div>-->
	
	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->dropDownList($model,'subject',SubjectMaster::items(), array('empty' => 'Select Subject','tabindex'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::button('Search', array('class'=>'submit','submit' => array('Viewchart'),'tabindex'=>9)); ?>
	</div>
	<!--<div class="row">
<?php 

if(!empty($xaxis))
{
	echo "<div id=\"container\" style=\"min-width: 00px; height: 400px; margin: 0 auto\"></div>";
 
//print_r($xaxis);
//print_r($yaxis);

for($i=0;$i<count($xaxis);$i++)
{
	$t=0;
	$n[$i][$t]=$xaxis[$i];
	$n[$i][$t+1]= $yaxis[$i];
}
//$n=array_merge($xaxis,$yaxis);


//print_r($n);
//print_r($m);
	//echo $m;
	//echo $key;

//print_r($m);

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
        'title'=> array(
			'text'=> 'Branch Wise Attendence'
		      ),
	
	 'xAxis' => array(
        		 'categories' => $xaxis	
     			 ),
	'yAxis'=> array(
			'min'=> 0,
			'max'=> 100,
			'title'=> array(
				'text'=> 'Attendence'
				       )				
			),
	'legend'=> array(
			'layout'=> 'vertical',
			'backgroundColor'=> '#FFFFFF',
			'align'=> 'left',
			'verticalAlign'=> 'top',
			'x'=> 100,
			'y'=> 70,
			'floating'=> true,
			'shadow'=> true
			),
	'tooltip'=>array(
		        'formatter'=>'js:function() { return "<b>"+ this.x +"</b>: "+ this.y +" Per"; }'
		        ),
	'plotOptions'=> array (
			'column'=> array(
				'pointPadding'=> 0.2,
				'borderWidth'=> 0
			)
		),	
	'series' => array(
		    array('name'=>$xaxis,'data'=>$n),
		)	
 )));
}	
?>

	</div>-->
<?php $this->endWidget(); ?>
</div><!-- form finish-->

