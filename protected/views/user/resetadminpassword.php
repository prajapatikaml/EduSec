<?php
$this->breadcrumbs=array(
	'Reset Admin Password',
	
);

$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
//	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reset Admin Password</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<?php
$dataProvider = $model->resetadminpasswordsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetadminpassword'); ?>
	</div>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		//'user_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'user_organization_email_id',
		//'user_organization_id',
		
		
		array(
                'name'=>'organization_name',
//                'type'=>'raw',		
                'value'=> '$data->rel_user_organization->organization_name',
	          ),
		array(
			'name'=>'user_type',
                 	'filter'=> false,
            	),
		//'user_created_by',
		/*
		'user_creation_date',


		array(
			'name'=>'user_organization_id',
                	'value'=>'Organization::item($data->user_organization_id)',
                 	'filter'=>  Organization::items(),
            ),
		array(
			'name'=>'user_role_master_id',
                	'value'=>'RoleMaster::item($data->user_role_master_id)',
                 	'filter'=> RoleMaster::items(),
		), */
		array('class'=>'CButtonColumn',
			'template' => '{Reset Admin Password}',
	                'buttons'=>array(
                        'Reset Admin Password' => array(
                                'label'=>'Reset Admin Password', 

				'url'=>'Yii::app()->createUrl("user/update_admin_password", array("id"=>$data->user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png',  // image URL of the button. If not set or false, a text link is used
                              // 'options' => array('class'=>'fees'), // HTML options for the button
				//'options'=>array('id'=>'update-student-status'),
				 // 'visible'=>!Yii::app()->user->checkAccess('User.Resetadminpassword');
                        ),
		   ),

		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
