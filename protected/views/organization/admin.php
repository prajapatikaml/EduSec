<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	'Manage',
);
?>
<div class="portlet box blue">

<div class="portlet-title"><i class="fa fa-plus"></i> <span class="box-title">Manage Organizations</span>
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
	'id'=>'organization-grid',
	'dataProvider'=>$dataProvider,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('organization/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'organization_name',
		'address_line1',
		'address_line2',		
		array('name'=>'city',
			'value'=>'(empty($data->city) ? "Not Set" : City::model()->findByPk($data->city)->city_name)',
			//'filter' =>CHtml::listData(City::model()->findAll(),'city_id','city_name'),

		), 
		array('name'=>'state',
			'value'=>'(empty($data->state) ? "Not Set" : State::model()->findByPk($data->state)->state_name)',
		//'filter' =>CHtml::listData(State::model()->findAll(),'state_id','state_name'),

		), 
		array('name'=>'country',
			'value'=>'(empty($data->country) ? "Not Set" : Country::model()->findByPk($data->country)->name)',
			//'filter' =>CHtml::listData(Country::model()->findAll(),'id','name'),

		), 
	
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
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?></div>
