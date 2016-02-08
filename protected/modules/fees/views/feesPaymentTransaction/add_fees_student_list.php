<?php
$this->breadcrumbs=array(
	'Fees Collection',
);
?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Student List</span>
</div>

<?php
$dataProvider = $stud_model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$stud_model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/fees/feesPaymentTransaction/create', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'ajaxUpdate'=>false,
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
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$stud_model->count(),
		'header'=>''
	    ),

)); ?>
</div>
