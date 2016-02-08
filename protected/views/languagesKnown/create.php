<?php
$this->breadcrumbs=array(
	'Languages Knowns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LanguagesKnown', 'url'=>array('index')),
	array('label'=>'Manage LanguagesKnown', 'url'=>array('admin')),
);
?>

<h1>Create LanguagesKnown</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>