<?php
$this->breadcrumbs=array('StudentTransaction',
	'Student Multiple Division-Batch Assign',
	);
?>
<fieldset style="min-width: 360px ! important; width: 425px;float:left; border: 1px solid rgb(204, 204, 204); border-radius: 5px 5px 5px 5px;padding: 15px;margin-right: 25px;margin-bottom: 10px;"> <legend >Student</legend>
<div class="form" >
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<div id="loading" style="display:none;"><img src="http://localhost/edusec/edusec/images/loading.gif" alt="" /></div>

<?php $org_id = Yii::app()->user->getState('org_id'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'student_transaction_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_transaction_branch_id', CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.$org_id)),'branch_id','branch_name'), array('tabindex'=>2,'empty' => 'Select Branch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_transaction_branch_id'); ?>		
	 </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'student_academic_term_name_id'); ?>
		<?php echo $form->dropDownList($model,'student_academic_term_name_id',CHtml::listData(AcademicTerm::model()->findAll('current_sem = 1 AND academic_term_organization_id ='.$org_id), 'academic_term_id', 'academic_term_name'),array('tabindex'=>3,'empty' => 'Select Semester'));  ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_academic_term_name_id'); ?>
	</div>

	<div class="row buttons">
	<?php echo CHtml::button('Submit',  array('submit' => array('studentTransaction/studentMultipleDivisionAssign'), 'class'=>'submit')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
</fieldset>
<?php $div = new Division; $batch = new Batch; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'division-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<fieldset style="min-width: 360px ! important; width: 425px; border: 1px solid rgb(204, 204, 204); border-radius: 5px 5px 5px 5px;padding: 15px;"> <legend>Assign Division & Batch</legend>
	<div class="row">	
		<?php echo $form->labelEx($div,'division_name'); ?>
		<?php if(!empty($_REQUEST['StudentTransaction']['student_transaction_branch_id']) && !empty($_REQUEST['StudentTransaction']['student_academic_term_name_id'])) { ?>
		<?php echo $form->dropDownList($div,'division_name', CHtml::listData(Division::model()->findAll('branch_id ='.$_REQUEST['StudentTransaction']['student_transaction_branch_id'].' AND academic_name_id ='.$_REQUEST['StudentTransaction']['student_academic_term_name_id']),'division_id','division_code'), array('tabindex'=>4,
					'prompt' => 'Select Division',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getAssignBatch'), 
					'update'=>'#Batch_batch_name'
					))); ?><span class="status">&nbsp;</span>
		<?php }
		else { ?>
		<?php echo $form->dropDownList($div,'division_name', array(), array('empty'=>'Select Division')); }?><span class="status">&nbsp;</span> 
		<?php echo $form->error($div,'division_name'); ?>		
	 </div>
	<div class="row">
		<?php echo $form->labelEx($batch,'batch_name'); ?>
		<?php echo $form->dropDownList($batch,'batch_name', array(), array('empty' => 'Select Batch','tabindex'=>4)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($batch,'batch_name'); ?>		
	 </div>
</fieldset>

<?php
$dataProvider = $model->multipleDivBatchAssign();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'columns'=>array(
		   array(
		       'class'=>'ext.ECheckBoxColumn',
	   	       'selectableRows' => '2', // 2 is for multi check[check all] 1 for single  
	  	       'id'=>'student_list', // the columnID for getChecked
		 	         ),
		 array('name' => 'student_enroll_no',
	              'value' => '(!empty($data->Rel_Stud_Info->student_enroll_no)?$data->Rel_Stud_Info->student_enroll_no:"Not Set")',
                     ),
		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),
		array('name' => 'student_middle_name',
	              'value' => '$data->Rel_Stud_Info->student_middle_name',
                     ),
		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array('name'=>'student_transaction_branch_id',
			'value'=>'Branch::model()->findByPk($data->student_transaction_branch_id)->branch_name',
			'filter' =>CHtml::listData(Branch::model()->findAll(array('condition'=>'branch_organization_id='.Yii::app()->user->getState('org_id'))),'branch_id','branch_name'),
			),
		array('name'=>'student_academic_term_period_tran_id',
			'value'=>'AcademicTermPeriod::model()->findByPk($data->student_academic_term_period_tran_id)->academic_term_period',
		), 
 
		array('name'=>'student_academic_term_name_id',
			'value'=>'AcademicTerm::model()->findByPk($data->student_academic_term_name_id)->academic_term_name',
			'filter' =>CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'current_sem=1 and academic_term_organization_id='.Yii::app()->user->getState('org_id'))),'academic_term_id','academic_term_name'),
		), 
		array('name'=>'student_transaction_division_id',
			'value'=>'isset($data->Rel_Division->division_name) ? $data->Rel_Division->division_code : "N/A" ',
		), 
		array('name'=>'student_transaction_batch_id',
			'value'=>'isset($data->Rel_Batch->batch_code) ? $data->Rel_Batch->batch_code : "N/A" ',
		), 

	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
	<div class="row buttons" style="padding-bottom: 20px;">
		<?php echo CHtml::button('Submit',  array('submit' => array('studentTransaction/assignDivBatch'), 'class'=>'submit')); ?>

	</div>

	<?php $this->endWidget(); ?>
</div>

