<?php
$this->breadcrumbs=array(
	'Message Of The Day'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Message Of The Day</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', array('messageOfDay/create'), array('class'=>'btn green'))?>
<?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
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
	'id'=>'message-of-day-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('messageOfDay/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
//		'id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		'message',
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'message_of_day_active', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Yes','0' => 'No'), // filter
		    'action'=>'switch', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>Yii::app()->baseUrl.'/images/checked.png', // tooltip
                    'uncheckedButtonLabel'=>Yii::app()->baseUrl.'/images/unchecked.png',
	            'checkedButtonTitle'=>"", // tooltip
                    'uncheckedButtonTitle'=>"Display",

		    'labeltype'=>'image',
                    'htmlOptions'=>array('style'=>'text-align:center')
	                ),
		array(
		'class'=>'MyCButtonColumn',
	   ),
	),
	'pager'=>array(
			'class'=>'AjaxList',
			//'maxButtonCount'=>25,
			'maxButtonCount'=>$model->count(),
			'header'=>''
	),
)); ?></div>
