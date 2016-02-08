<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Photo Gallery</span>
<div class="operation">
<?php echo CHtml::link('Add New', array('multiupload'), array('class'=>'btn green'))?>
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
	'id'=>'photo-gallery-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('photoGallery/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		'name' => 'photo_path',
		'type'=>'raw',
                'value'=>  'CHtml::image(Yii::app()->baseUrl."/college_data/gallery/album1/album_thumbs/" . $data->photo_path, "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
		'photo_desc',
		array(
                    'class'=>'JToggleColumn',
                    'name'=>'display_status', // boolean model attribute (tinyint(1) with values 0 or 1)
                    'filter' => array('1' => 'Yes','0' => 'No'), // filter
		    'action'=>'toggle', // other action, default is 'toggle' action
		    'checkedButtonLabel'=>Yii::app()->baseUrl.'/images/checked.png', // tooltip
                    'uncheckedButtonLabel'=>Yii::app()->baseUrl.'/images/unchecked.png',
	            'labeltype'=>'image',
                    'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;')
                ),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
