<?php
$this->breadcrumbs=array(
	'Languages Knowns'=>array('index'),
	$model->languages_known_id=>array('view','id'=>$model->languages_known_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LanguagesKnown', 'url'=>array('index')),
	array('label'=>'Create LanguagesKnown', 'url'=>array('create')),
	array('label'=>'View LanguagesKnown', 'url'=>array('view', 'id'=>$model->languages_known_id)),
	array('label'=>'Manage LanguagesKnown', 'url'=>array('admin')),
);
?>

<h1>Update LanguagesKnown <?php echo $model->languages_known_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'info'=>$info,'address'=>$address,'photo'=>$photo,'lang'=>$lang)); ?>
