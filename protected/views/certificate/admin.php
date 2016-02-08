<?php
$this->breadcrumbs=array(
	'Certificates'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Manage Certificates</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('create'), array('class'=>'btn green'))?>
</div>
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
	'id'=>'certificate-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('certificate/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'certificate_title',
		array(
            	     'name'=>'certificate_type',
          	     'filter'=>array("Student"=>"Student","Employee"=>"Employee")
                ),
	),
	'pager'=>array(

		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?></div>
