<?php
$this->breadcrumbs=array(
	'Reset Student Login ID',
	
);
?>
<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-openid"></i><span class="box-title">Reset Login</span>
</div>

<?php
$dataProvider = $model->resetloginstudentsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array('name' => 'student_roll_no',
	              'value' => '$data->Rel_Stud_Info->student_roll_no',
                     ),

		 array('name' => 'student_first_name',
	              'value' => '$data->Rel_Stud_Info->student_first_name',
                     ),

		array('name' => 'student_last_name',
	              'value' => '$data->Rel_Stud_Info->student_last_name',
                     ),
		array('name'=>'user_organization_email_id',
			'value'=>'$data->Rel_user->user_organization_email_id',
		), 
		array('class'=>'CButtonColumn',
			'template' => '{Reset Loginid}',
	                'buttons'=>array(
                        'Reset Loginid' => array(
                                'label'=>'login id', 

				'url'=>'Yii::app()->createUrl("user/updatestudloginid", array("id"=>$data->Rel_user->user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png', 
                        ),
		   ),

		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
