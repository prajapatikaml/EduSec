<?php
$this->breadcrumbs=array(
	'Organizations'=>array('admin'),
	$model->organization_name,
);
?>

<div class="portlet box blue view">
 <div class="portlet-title"><i class="fa fa-list-alt"></i><span class="box-title">View Organization</span>
</div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
<?php echo CHtml::link('<i class="fa fa-pencil-square-o"></i>Edit', array('update' ,'id'=>$model->organization_id), array('class'=>'btn green'));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('application.extensions.DetailView4Col', array(
	'data'=>$model,
	'attributes'=>array(
		'organization_name',
		array(
		 'name'=>'address_line1',
                'value'=> ($model->address_line1 == null) ? 'Not Set' : $model->address_line1,
	          ),
		array(
		 'name'=>'address_line2',
                'value'=> ($model->address_line2 == null) ? 'Not Set' : $model->address_line2,
	          ),
		array(
		 'name'=>'City',
                'value'=> empty($model->city) ? 'Not Set' : $model->Rel_org_city->city_name,
	          ),		

		array(
		 'name'=>'State',
                'value'=> empty($model->state) ? 'Not Set' : $model->Rel_org_state->state_name,
	          ),		

		array(
		 'name'=>'Country',
                'value'=> empty($model->country) ? 'Not Set' : $model->Rel_org_country->name,
	          ),
		array(
		 'name'=>'Pincode',
                'value'=> empty($model->pin) ? 'Not Set' : $model->pin,
	          ),	
		array('name' => 'website',
	              'value' =>($model->website == null) ? 'Not Set' : $model->website,
                ),
		array('name' => 'email',
	              'value' =>empty($model->email) ? 'Not Set' : $model->email,
                ),
		array('name' => 'phone',
	              'value' =>($model->phone == 0) ? 'Not Set' : $model->phone,
                ),
		array('name' => 'fax_no',
	              'value' =>($model->fax_no == 0) ? 'Not Set' : $model->fax_no,
                ),
		
		array(
		 'name'=>'logo',
		'type'=>'raw',
		'value'=>CHtml::image(Yii::app()->controller->createUrl('site/loadImage', array('id'=>$model->organization_id)), "No Image",array("width"=>"200px","height"=>"100px")) 		
                 ),

		array('name'=>'organization_created_by',
			'value'=>!empty(User::model()->findByPk($model->organization_created_by)->user_organization_email_id) ? User::model()->findByPk($model->organization_created_by)->user_organization_email_id : "Not Set",
		),
		array(
                'name'=>'organization_creation_date',
                'type'=>'raw',		
                'value'=>($model->organization_creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->organization_creation_date), 'd-m-Y'),
	        ),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
</div>
</div>
