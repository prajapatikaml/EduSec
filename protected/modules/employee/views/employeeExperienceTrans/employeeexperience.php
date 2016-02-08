<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Experience Detail</span>
 <div class="operation">
      <?php 
  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData')) { 

echo CHtml::link('Add New',array('employeeExperienceTrans/create','id'=>$_REQUEST['id']),array('id'=>'quaid','class'=>'btn green','style'=>'text-decoration:none;'));
$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		     'width' => '800',
		    'height' => '250', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClosed' => 'js:function(event, ui) { window.location.reload(); }'


		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#quaid', 'config'=>$config));

}
     if(isset($_REQUEST['from']))
 	 echo CHtml::link('Back', array('/dashboard/dashboard') ,array('class'=>'btnback')); 
      else
	 echo CHtml::link('Back',array('employeeTransaction/update', 'id'=>$_REQUEST['id']),array('class'=>'btnback'));
   ?>
 </div>	
</div>
<div id="form" class="info-form">
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-experience-trans-grid',
	'dataProvider'=>$employeeexperience->mysearch(),
	'columns'=>array(
			array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array('name' => 'employee_experience_organization_name',
	              'value' => '$data->Rel_Emp_exp->employee_experience_organization_name',
                     ),
		array('name' => 'employee_experience_designation',
			'value' => '$data->Rel_Emp_exp->employee_experience_designation',
                     ),
		array('name' => 'employee_experience_from',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_from), "d-m-Y")',
                    ),
		array('name' => 'employee_experience_to',
			'value' => 'date_format(date_create($data->Rel_Emp_exp->employee_experience_to), "d-m-Y")',
                     ),
		
		
		array('name' => 'employee_experience',
			'value' => '$data->Rel_Emp_exp->employee_experience',
                     ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}',
			'buttons'=>array(
			'update' => array(
				'url'=>'Yii::app()->createUrl("employee/employeeExperienceTrans/update", array("id"=>$data->employee_experience_trans_id))',
				'options'=>array('id'=>'update_exp'),
				
                        ),
			                        
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("employee/employeeExperienceTrans/delete", array("id"=>$data->employee_experience_trans_id))',
                        ),
		   ),
		),

	),
)); 

$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '800',
		    'height' => '250', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update_exp', 'config'=>$config));

?>
</div>

