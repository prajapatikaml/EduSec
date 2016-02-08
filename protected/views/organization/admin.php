<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('ExportToPDFExcel/OrganizationExportToPdf'),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank')),
	array('label'=>'', 'url'=>array('ExportToPDFExcel/OrganizationExportToExcel'),'linkOptions'=>array('class'=>'export-excel','title'=>'Export To Excel','target'=>'_blank')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('organization-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Organizations</h1>
<div class="portlet box blue">


 <div class="portlet-title"> Organizations
 </div>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'organization-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('organization/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'organization_id',
		'organization_name',
		'address_line1',
//		'address_line2',
				
		array('name'=>'city',
			'value'=>'City::model()->findByPk($data->city)->city_name',
			'filter' =>CHtml::listData(City::model()->findAll(),'city_id','city_name'),

		), 
		array('name'=>'state',
			'value'=>'State::model()->findByPk($data->state)->state_name',
		'filter' =>CHtml::listData(State::model()->findAll(),'state_id','state_name'),

		), 
		array('name'=>'country',
			'value'=>'Country::model()->findByPk($data->country)->name',
			'filter' =>CHtml::listData(Country::model()->findAll(),'id','name'),

		), 
	
/*		'city',
		'state',
		'country',
//		'pin',
//		 'phone',*/
//		 'website',
//		'email',
//		'taxno',
		array(
		        'name'=>'website',
		        'value'=>'($data->website == null) ? "Not Set" : $data->website',
		 ),
		array(
		 'name'=>'logo',
		'type'=>'raw',
		'filter'=>false,
                'value'=>  'CHtml::image(Yii::app()->controller->createUrl("site/loadImage", array("id"=>$data->organization_id)), "No Image",array("width"=>"20px","height"=>"20px"))',
                 ),
		
		//'organization_created_by',
		//'organization_creation_date',
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>

</div>
