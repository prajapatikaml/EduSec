<?php
$this->breadcrumbs=array(
	'Student Transactions'=>array('admin'),
	$model->student_transaction_id,
);

$this->menu=array(
	array('label'=>'List Student Transaction', 'url'=>array('index')),
	array('label'=>'Create Student Transaction', 'url'=>array('create')),
	array('label'=>'Update Student Transaction', 'url'=>array('update', 'id'=>$model->student_transaction_id)),
	array('label'=>'Delete Student Transaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student Transaction', 'url'=>array('admin')),
);
?>

<h1>View StudentTransaction #<?php echo $model->student_transaction_id; ?></h1>
<?php 
	if(!isset($model->Rel_Stud_Info->student_guardian_mobile)) 
	$model->Rel_Stud_Info->student_guardian_mobile = 'N/A';

	if($model->Rel_Stud_Info->student_guardian_qualification==null) 
	$model->Rel_Stud_Info->student_guardian_qualification = 'N/A';

	if($model->Rel_Stud_Info->student_guardian_occupation==null) 
	$model->Rel_Stud_Info->student_guardian_occupation = 'N/A';

	if($model->Rel_Stud_Info->student_birthplace==null) 
	$model->Rel_Stud_Info->student_birthplace = 'N/A';

	if($model->Rel_Stud_Info->student_guardian_occupation_address==null) 
	$model->Rel_Stud_Info->student_guardian_occupation_address = 'N/A';

	if($model->Rel_Stud_Info->student_guardian_home_address==null) 
	$model->Rel_Stud_Info->student_guardian_home_address = 'N/A';

	if($model->Rel_Stud_Info->student_email_id_2==null) 
	$model->Rel_Stud_Info->student_email_id_2 = 'N/A';

?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'student_transaction_id',
		//'student_transaction_user_id',
//		'student_transaction_student_id',

		 array('name' => 'student_first_name',
	              'value' => $model->Rel_Stud_Info->student_first_name,
                     ),

		 array('name' => 'student_middle_name',
	              'value' => $model->Rel_Stud_Info->student_middle_name,
                     ),

		 array('name' => 'student_last_name',
	              'value' => $model->Rel_Stud_Info->student_last_name,
                     ),
		 array('name' => 'student_father_name',
	              'value' => $model->Rel_Stud_Info->student_father_name,
                     ),
		 array('name' => 'student_mother_namee',
	              'value' => $model->Rel_Stud_Info->student_mother_name,
                     ),
		 array('name' => 'student_adm_date',
	              'value' => $model->Rel_Stud_Info->student_adm_date,
                     ),
		 array('name' => 'student_dob',
	              'value' => $model->Rel_Stud_Info->student_dob,
                     ),
		 array('name' => 'student_birthplace',
	              'value' => $model->Rel_Stud_Info->student_birthplace,
                     ),

		 array('name' => 'student_gender',
	              'value' => $model->Rel_Stud_Info->student_gender,
                     ),
		 array('name' => 'student_guardian_name',
	              'value' => $model->Rel_Stud_Info->student_guardian_name,
                     ),

		 array('name' => 'student_guardian_relation',
		      'value' => $model->Rel_Stud_Info->student_guardian_relation,
		     ),
		 array('name' => 'student_guardian_qualification',
				      'value' => $model->Rel_Stud_Info->student_guardian_qualification,
				     ),
		 array('name' => 'student_guardian_occupation',
				      'value' => $model->Rel_Stud_Info->student_guardian_occupation,
				     ),


		 array('name' => 'student_guardian_income',
				      'value' => $model->Rel_Stud_Info->student_guardian_income,
				     ),
		 array('name' => 'student_guardian_occupation_address',
				      'value' => $model->Rel_Stud_Info->student_guardian_occupation_address,
				     ),
		 array('name' => 'student_guardian_occupation_city',
				      'value' => $model->Rel_Stud_Info->student_guardian_occupation_city,
				     ),
		 array('name' => 'student_guardian_city_pin',
				      'value' => $model->Rel_Stud_Info->student_guardian_city_pin,
				     ),
		 array('name' => 'student_guardian_home_address',
				      'value' => $model->Rel_Stud_Info->student_guardian_home_address,
				     ),



		 array('name' => 'student_guardian_phoneno',
				      'value' => $model->Rel_Stud_Info->student_guardian_phoneno,
				     ),
		
		 array('name' => 'student_guardian_mobile',
				      'value' => $model->Rel_Stud_Info->student_guardian_mobile,
				     ),
		 array('name' => 'student_email_id_1',
				      'value' => $model->Rel_Stud_Info->student_email_id_1,
				     ),

		
		 array('name' => 'student_email_id_2',
				      'value' => $model->Rel_Stud_Info->student_email_id_2,
				     ),
		
		 array('name' => 'student_bloodgroup',
				      'value' => $model->Rel_Stud_Info->student_bloodgroup,
				     ),
 
 		//'student_transaction_category_id',
		//'student_transaction_organization_id',
		//'student_transaction_student_address_id',
		//'student_transaction_nationality_id',
		//'student_transaction_quota_id',
		//'student_transaction_religion_id',
		//'student_transaction_shift_id',
		'student_transaction_languages_known_id',
		'student_transaction_student_photos_id',
		//'student_transaction_division_id',
		//'student_transaction_batch_id',
		'student_academic_term_period_tran_id',
	),
)); ?>
