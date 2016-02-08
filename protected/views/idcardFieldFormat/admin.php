<?php
$this->breadcrumbs=array(
	'ID Card Template'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"> <span class="box-title">Manage Manage ID Card Templates</span>
</div>
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'idcard-field-format-grid',
	'dataProvider'=>$dataProvider,
	//'mergeColumn'=>array('idtemplate_name'),
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
            	     'name'=>'stud_emp_type',
          	     'filter'=>array("Student"=>"Student","Employee"=>"Employee")
                ),
		'idtemplate_name',
		'selected_field_label',
		//'label_priority',
		array(
            	     'name'=>'label_priority',
          	     'filter'=>array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6")
                ),
		array(
			'class'=>'MyCButtonColumn',
			'template'=>'{delete}',
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',

		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?></div>
