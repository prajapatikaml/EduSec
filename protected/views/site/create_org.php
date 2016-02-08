<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>
<h1 style="color: #555; font-weight: normal; font-size: 17px;"> Create an Institute / College </h1>
<?php echo $this->renderPartial('org_form', array('model'=>$model)); ?>
