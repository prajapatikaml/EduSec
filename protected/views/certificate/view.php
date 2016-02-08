<?php
$this->breadcrumbs=array(
	'Certificates'=>array('admin'),
	$model->certificate_title,
);

?>

<h1>View Certificate <?php //echo $model->certificate_id; ?></h1>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->certificate_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->certificate_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div style= "border: 1px solid #CCCCCC; float: left; margin-top: 20px; padding: 10px;">
<?php 
  print $model->certificate_content;
?>
</div>
