<?php
$this->breadcrumbs=array(
	'Reset Student Password',
	
);

?>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-key"></i><span class="box-title">Reset Password</span>
</div>
<?php
$dataProvider = $model->resetloginstudentsearch();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetstudpassword'); ?>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-transaction-grid',
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
		array('name' => 'user_organization_email_id',
			      'value' => '$data->Rel_user->user_organization_email_id',
                      ),

		array(
			'class'=>'CButtonColumn',
			'template' => '{Reset Password}',
	                'buttons'=>array(
                        'Reset Password' => array(
                                'label'=>'Reset Password', 
				  'url'=>'Yii::app()->createUrl("user/update_stud_password", array("id"=>$data->student_transaction_user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png', 
				'options'=>array('id'=>'update-student-status'),
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
