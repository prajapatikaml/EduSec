<?php
$this->breadcrumbs=array(
	'Employee Transactions'=>array('admin'),
	$model->employee_transaction_id,
);

$this->menu=array(
	array('label'=>'List EmployeeTransaction', 'url'=>array('index')),
	array('label'=>'Create EmployeeTransaction', 'url'=>array('create')),
	array('label'=>'Update EmployeeTransaction', 'url'=>array('update', 'id'=>$model->employee_transaction_id)),
	array('label'=>'Delete EmployeeTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeeTransaction', 'url'=>array('admin')),
);
?>

<h1>View Employee #<?php echo $model->employee_transaction_id; ?></h1>
<?php 

	if(!isset($model->Rel_Emp_Info->employee_guardian_mobile2)) 
	$model->Rel_Emp_Info->employee_guardian_mobile2 = 'N/A';

	if(!isset($model->Rel_Emp_Info->employee_account_no)) 
	$model->Rel_Emp_Info->employee_account_no = 'N/A';

	if($model->Rel_Emp_Info->employee_probation_period==null) 
	$model->Rel_Emp_Info->employee_probation_period = 'N/A';
	
	if($model->Rel_Emp_Info->employee_name_alias==null)
	$model->Rel_Emp_Info->employee_name_alias= 'N/A';

	if($model->Rel_Emp_Info->employee_birthplace==null) 
	$model->Rel_Emp_Info->employee_birthplace = 'N/A';

	if($model->Rel_Emp_Info->employee_guardian_home_address==null) 
	$model->Rel_Emp_Info->employee_guardian_home_address = 'N/A';

	if($model->Rel_Emp_Info->employee_guardian_occupation==null) 
	$model->Rel_Emp_Info->employee_guardian_occupation = 'N/A';

	if($model->Rel_Emp_Info->employee_guardian_qualification==null) 
	$model->Rel_Emp_Info->employee_guardian_qualification = 'N/A';


	if($model->Rel_Emp_Info->employee_pancard_no==null) 
	$model->Rel_Emp_Info->employee_pancard_no = 'N/A';

	if($model->Rel_Emp_Info->employee_hobbies==null) 
	$model->Rel_Emp_Info->employee_hobbies = 'N/A';

	if($model->Rel_Emp_Info->employee_technical_skills==null) 
	$model->Rel_Emp_Info->employee_technical_skills = 'N/A';

	if($model->Rel_Emp_Info->employee_project_details==null) 
	$model->Rel_Emp_Info->employee_project_details = 'N/A';

	if($model->Rel_Emp_Info->employee_curricular==null) 
	$model->Rel_Emp_Info->employee_curricular = 'N/A';

	if($model->Rel_Emp_Info->employee_refer_designation==null) 
	$model->Rel_Emp_Info->employee_refer_designation = 'N/A';

	if($model->Rel_Emp_Info->employee_reference==null) 
	$model->Rel_Emp_Info->employee_reference = 'N/A';




?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'employee_transaction_id',
//		'employee_transaction_user_id',
		'employee_transaction_employee_id',
//		'employee_transaction_emp_address_id',
//		'employee_transaction_branch_id',
//		'employee_transaction_category_id',

		 array('name' => 'employee_first_name',
	              'value' => $model->Rel_Emp_Info->employee_first_name,
                     ),

		 array('name' => 'employee_middle_name',
	              'value' => $model->Rel_Emp_Info->employee_middle_name,
                     ),

		 array('name' => 'employee_last_name',
	              'value' => $model->Rel_Emp_Info->employee_last_name,
                     ),

		 array('name' => 'employee_name_alias',
	              'value' => $model->Rel_Emp_Info->employee_name_alias,
                     ),

		 array('name' => 'employee_dob',
	              'value' => $model->Rel_Emp_Info->employee_dob,
                     ),

		 array('name' => 'employee_birthplace',
	              'value' => $model->Rel_Emp_Info->employee_birthplace,
                     ),

		 array('name' => 'employee_gender',
	              'value' => $model->Rel_Emp_Info->employee_gender,
                     ),

		 array('name' => 'employee_bloodgroup',
	              'value' => $model->Rel_Emp_Info->employee_bloodgroup,
                     ),

		 array('name' => 'employee_marital_status',
	              'value' => $model->Rel_Emp_Info->employee_marital_status,
                     ),


		 array('name' => 'employee_guardian_name',
	              'value' => $model->Rel_Emp_Info->employee_guardian_name,
                     ),

		 array('name' => 'employee_guardian_relation',
	              'value' => $model->Rel_Emp_Info->employee_guardian_relation,
                     ),
		
		 array('name' => 'employee_guardian_home_address',
		       'value' => $model->Rel_Emp_Info->employee_guardian_home_address,
                     ),

		 array('name' => 'employee_guardian_qualification',
	              'value' => $model->Rel_Emp_Info->employee_guardian_qualification,
                     ),

		 array('name' => 'employee_guardian_occupation',
	              'value' => $model->Rel_Emp_Info->employee_guardian_occupation,
                     ),

		 array('name' => 'employee_guardian_income',
	              'value' => $model->Rel_Emp_Info->employee_guardian_income,
                     ),

		 array('name' => 'employee_guardian_occupation_address',
	              'value' => $model->Rel_Emp_Info->employee_guardian_occupation_address,
                     ),

		 array('name' => 'employee_guardian_occupation_city',
	              'value' => $model->Rel_Emp_Info->employee_guardian_occupation_city,
                     ),

		 array('name' => 'employee_guardian_city_pin',
	              'value' => $model->Rel_Emp_Info->employee_guardian_city_pin,
                     ),

		 array('name' => 'employee_guardian_phone_no',
	              'value' => $model->Rel_Emp_Info->employee_guardian_phone_no,
                     ),

		 array('name' => 'employee_guardian_mobile1',
	              'value' => $model->Rel_Emp_Info->employee_guardian_mobile1,
                     ),

		array('name' => 'employee_guardian_mobile2',
	              'value' => $model->Rel_Emp_Info->employee_guardian_mobile2,
                     ),

		 array('name' => 'employee_faculty_of',
	              'value' => $model->Rel_Emp_Info->employee_faculty_of,
                     ),

		array('name' => 'employee_attendance_card_id',
	              'value' => $model->Rel_Emp_Info->employee_attendance_card_id,
                     ),
		array('name' => 'employee_type',
	              'value' => $model->Rel_Emp_Info->employee_type,
                     ),

		 array('name' => 'employee_private_email',
	              'value' => $model->Rel_Emp_Info->employee_private_email,
                     ),

		 array('name' => 'employee_organization_mobile',
	              'value' => $model->Rel_Emp_Info->employee_organization_mobile,
                     ),

		 array('name' => 'employee_private_mobile',
	              'value' => $model->Rel_Emp_Info->employee_private_mobile,
                     ),

		 array('name' => 'employee_pancard_no',
	              'value' => $model->Rel_Emp_Info->employee_pancard_no,
                     ),

		 array('name' => 'employee_account_no',
	              'value' => $model->Rel_Emp_Info->employee_account_no,
                     ),

		 array('name' => 'employee_joining_date',
	              'value' => $model->Rel_Emp_Info->employee_joining_date,
                     ),

		 array('name' => 'employee_probation_period',
	              'value' => $model->Rel_Emp_Info->employee_probation_period,
                     ),

		 array('name' => 'employee_hobbies',
	              'value' => $model->Rel_Emp_Info->employee_hobbies,
                     ),

		 array('name' => 'employee_technical_skills',
	              'value' => $model->Rel_Emp_Info->employee_technical_skills,
                     ),

		 array('name' => 'employee_project_details',
	              'value' => $model->Rel_Emp_Info->employee_project_details,
                     ),

		 array('name' => 'employee_curricular',
	              'value' => $model->Rel_Emp_Info->employee_curricular,
                     ),

		 array('name' => 'employee_reference',
	              'value' => $model->Rel_Emp_Info->employee_reference,
                     ),

		 array('name' => 'employee_refer_designation',
	              'value' => $model->Rel_Emp_Info->employee_refer_designation,
                     ),

		


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		 array('name' => 'branch_name',
	              'value' => $model->Rel_Branch->branch_name,
                     ),

		 array('name' => 'category_name',
	              'value' => $model->Rel_Category->category_name,
                     ),
		
		 array('name' => 'religion_name',
	              'value' => $model->Rel_Religion->religion_name,
                     ),
		 array('name' => 'shift_name',
	              'value' => $model->Rel_Shift->shift_type,
                     ),
		 array('name' => 'employee_designation_name',
	              'value' => $model->Rel_Designation->employee_designation_name,
                     ),
		 array('name' => 'nationality_name',
	              'value' => $model->Rel_Nationality->nationality_name,
                     ),
		 array('name' => 'department_name',
	              'value' => $model->Rel_Department->department_name,
                     ),
		 array('name' => 'organization_name',
	              'value' => $model->Rel_Organization->organization_name,
                     ),

		

//		'employee_transaction_quota_id',
//		'employee_transaction_religion_id',
//		'employee_transaction_shift_id',
//		'employee_transaction_designation_id',
//		'employee_transaction_nationality_id',
//		'employee_transaction_department_id',
//		'employee_transaction_organization_id',
//		'employee_transaction_languages_known_id',
//		'employee_transaction_emp_photos_id',
	),
)); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/protected/emp_images/'.$model->Rel_Photo->employee_photos_path)); 
?>
