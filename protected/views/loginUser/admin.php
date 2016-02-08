<?php
$this->breadcrumbs=array(
	'Login Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List LoginUser', 'url'=>array('index')),
	array('label'=>'Create LoginUser', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('login-user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Login Users</h1>
<div class="portlet box blue">


 <div class="portlet-title"> Login Users
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
	'id'=>'login-user-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'No',
		'class'=>'IndexColumn',
		),
		'user_id',
		'status',
		'log_in_time',
		'log_out_time',
		
	),
		'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
