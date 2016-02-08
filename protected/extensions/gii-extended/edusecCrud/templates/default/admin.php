<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'','url'=>Yii::app()->controller->createUrl('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GeneratePdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To PDF','target'=>'_blank')),
	array('label'=>'','url'=>Yii::app()->controller->createUrl('GenerateExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php echo "<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->
<?php echo "<?php"; ?> $dataProvider = $model->search();
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);?>


<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'MyCButtonColumn',
		),
	),
	
)); ?>
