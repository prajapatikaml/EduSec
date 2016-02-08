<?php
$this->breadcrumbs=array(
	'Backup'=>array('index'),
	'Restore',
);?>
<h1><?php echo  $this->action->id; ?></h1>

<p>
	<?php if(isset($error)) echo $error; else echo 'Done';?>
</p>
<p> <?php echo CHtml::link('View Site',Yii::app()->HomeUrl.'dashboard')?></p>
