<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">View Semester</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->photo_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->photo_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>
</div>

<?php echo CHtml::image(Yii::app()->baseUrl.'/college_data/gallery/album1/album_thumbs/' . $model->photo_path);?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'photo_path',
		'photo_desc',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
