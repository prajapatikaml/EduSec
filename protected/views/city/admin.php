<?php
$this->breadcrumbs=array(
	'City'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">

<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Cities</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('city/create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php
//$dataProvider = $model->search();
/*if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else */
//$pageSize = 3; //Yii::app()->params['pageSize'];
//$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('city/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'city_id',
		'city_name',
		
		//'country_id',
	    	array(
		    'name'=>'state_id',
		    'value'=>'State::model()->findByPk($data->state_id)->state_name',
	    	    'filter'=>  State::items(),
		),
		array(
			
            		'name'=>'country_id',
            		'value'=>'Country::model()->findByPk($data->country_id)->name',
            		'filter'=>  Country::items(),
        	),
		 array(
		'class'=>'MyCButtonColumn',
	   ),
		
	),
	
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?></div>
