<script>
$("#student-transaction-grid_c1").hover(function(){
  $("#student-transaction-grid_c1").css("background-color","yellow");
  },function(){
  $("#student-transaction-grid_c1").css("background-color","pink");
}); 
</script>
<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Student Contact</span>
<div class="operation">
<?php echo CHtml::link('Excel', array('ExportToPDFExcel/studentcontactexcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>
</div>

<?php
$dataProvider = $model->allstudent();
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
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		array('name' => 'student_roll_no',
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array('name' => 'student_mobile_no',
	         'value' => '$data->Rel_Stud_Info->student_mobile_no',
		 'filter' => false,
                     ),
		array('name' => 'student_guardian_mobile',
	         'value' => '$data->Rel_Stud_Info->student_guardian_mobile',
		 'filter' => false,
                     ),

		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),

)); ?>
</div>
