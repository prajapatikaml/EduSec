<?php
$this->breadcrumbs=array(
	'Reset Employee Password',
	
);?>
<h1>Reset Employee Password</h1>
<div class="portlet box blue">


 <div class="portlet-title"> Employee List
 </div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<div class="block-error">
		<?php echo Yii::app()->user->getFlash('resetemppassword'); ?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-transaction-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),

		array('name' => 'employee_no',
	              'value' => '$data->Rel_Emp_Info->employee_no',
                     ),
		array('name' => 'employee_attendance_card_id',
	              'value' => '$data->Rel_Emp_Info->employee_attendance_card_id',
                     ),		 
		array('name' => 'employee_first_name',
	              'value' => '$data->Rel_Emp_Info->employee_first_name',
                     ),
		
		 array('name' => 'category_name',
	              'value' => '($data->category_name == 0)? "Not Set" :$data->Rel_Category->category_name',
                     ),

		 array('name'=>'employee_transaction_department_id',
		'value'=>'Department::model()->findByPk($data->employee_transaction_department_id)->department_name',
			'filter' =>CHtml::listData(Department::model()->findAll(),'department_id','department_name'),

		), 
 
		array('class'=>'CButtonColumn',
			'template' => '{Reset Password}',
	                'buttons'=>array(
                        'Reset Password' => array(
                                'label'=>'Reset Password', 
				 'url'=>'Yii::app()->createUrl("user/update_emp_password", array("id"=>$data->employee_transaction_user_id))',
                                'imageUrl'=> Yii::app()->baseUrl.'/images/Reset Password.png',  // image URL of the button. If not set or false, a text link is used
                              
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
</div>
