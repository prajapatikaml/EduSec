<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<?php
		$branch=new Branch;
		$category=new Category;
		$nationality=new Nationality;
		$organization=new Organization;
		$department=new Department;
		$quota=new Quota;
		$religion=new Religion;
		$shift=new Shift;
		$emp_designation=new EmployeeDesignation;
	//	$user=new User;
		
		
	?>

	<?php
            $personal_info  = $form->labelEx($model,'employee_no'); 
            $personal_info .= $form->textField($model,'employee_no',array('size'=>10,'maxlength'=>10));
            $personal_info .= $form->error($model,'employee_no'); 


            $personal_info .= $form->labelEx($model,'employee_first_name');
            $personal_info .= $form->textField($model,'employee_first_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($model,'employee_first_name');



            $personal_info .= $form->labelEx($model,'employee_middle_name');
            $personal_info .= $form->textField($model,'employee_middle_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($model,'employee_middle_name');



            $personal_info .= $form->labelEx($model,'employee_last_name');
            $personal_info .= $form->textField($model,'employee_last_name',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($model,'employee_last_name');


            $personal_info .= $form->labelEx($model,'employee_name_alias');
            $personal_info .= $form->textField($model,'employee_name_alias',array('size'=>10,'maxlength'=>10));
            $personal_info .= $form->error($model,'employee_name_alias');
	
/*
            $personal_info .= $form->labelEx($user,'user_organization_email_id');
            $personal_info .= $form->textField($user,'user_organization_email_id',array('size'=>30,'maxlength'=>30));
            $personal_info .= $form->error($user,'user_organization_email_id');
*/
	    $personal_info .= $form->labelEx($model,'employee_dob');
            $personal_info .= $form->textField($model,'employee_dob');
            $personal_info .= $form->error($model,'employee_dob');

            $personal_info .= $form->labelEx($model,'employee_birthplace');
            $personal_info .= $form->textField($model,'employee_birthplace',array('size'=>25,'maxlength'=>25));
            $personal_info .= $form->error($model,'employee_birthplace');



            $personal_info .= $form->labelEx($model,'employee_gender');
            $personal_info .= $form->textField($model,'employee_gender',array('size'=>6,'maxlength'=>6));
            $personal_info .= $form->error($model,'employee_gender');


            $personal_info .= $form->labelEx($model,'employee_bloodgroup');
            $personal_info .= $form->textField($model,'employee_bloodgroup',array('size'=>3,'maxlength'=>3));
            $personal_info .= $form->error($model,'employee_bloodgroup');



            $personal_info .= $form->labelEx($model,'employee_marital_status');
            $personal_info .= $form->textField($model,'employee_marital_status',array('size'=>10,'maxlength'=>10));
            $personal_info .= $form->error($model,'employee_marital_status');




            $other_info  = $form->labelEx($model,'employee_private_email');
            $other_info .= $form->textField($model,'employee_private_email',array('size'=>30,'maxlength'=>30));
            $other_info .= $form->error($model,'employee_private_email');



            $other_info .=  $form->labelEx($model,'employee_organization_mobile');
            $other_info .=  $form->textField($model,'employee_organization_mobile');
            $other_info .=  $form->error($model,'employee_organization_mobile');



            $other_info .=  $form->labelEx($model,'employee_private_mobile');
            $other_info .=  $form->textField($model,'employee_private_mobile');
            $other_info .=  $form->error($model,'employee_private_mobile');



            $other_info .=  $form->labelEx($model,'employee_pancard_no');
            $other_info .=  $form->textField($model,'employee_pancard_no',array('size'=>10,'maxlength'=>10));
            $other_info .=  $form->error($model,'employee_pancard_no');



            $other_info .=  $form->labelEx($model,'employee_account_no');
            $other_info .=  $form->textField($model,'employee_account_no');
            $other_info .=  $form->error($model,'employee_account_no');



            $other_info .=  $form->labelEx($model,'employee_joining_date');
            $other_info .=  $form->textField($model,'employee_joining_date');
            $other_info .=  $form->error($model,'employee_joining_date');


            $other_info .=  $form->labelEx($model,'employee_probation_period');
            $other_info .=  $form->textField($model,'employee_probation_period',array('size'=>10,'maxlength'=>10));
            $other_info .=  $form->error($model,'employee_probation_period');



            $other_info .=  $form->labelEx($model,'employee_hobbies');
            $other_info .=  $form->textArea($model,'employee_hobbies',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($model,'employee_hobbies');



            $other_info .=  $form->labelEx($model,'employee_technical_skills');
            $other_info .=  $form->textArea($model,'employee_technical_skills',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($model,'employee_technical_skills');



            $other_info .=  $form->labelEx($model,'employee_project_details');
            $other_info .=  $form->textArea($model,'employee_project_details',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($model,'employee_project_details');


            $other_info .=  $form->labelEx($model,'employee_curricular');
            $other_info .=  $form->textArea($model,'employee_curricular',array('rows'=>6, 'cols'=>50));
            $other_info .=  $form->error($model,'employee_curricular');



            $other_info .=  $form->labelEx($model,'employee_reference');
            $other_info .=  $form->textField($model,'employee_reference',array('size'=>25,'maxlength'=>25));
            $other_info .=  $form->error($model,'employee_reference');


            $other_info .=  $form->labelEx($model,'employee_refer_designation');
            $other_info .=  $form->textField($model,'employee_refer_designation',array('size'=>20,'maxlength'=>20));
            $other_info .=  $form->error($model,'employee_refer_designation');

/*
            $other_info .=  $form->labelEx($branch,'branch_id');
	    if(!isset($employee_transaction_branch_id))
	    $employee_transaction_branch_id = 0;
	    $other_info .=  CHtml::dropDownList('branch_id', $employee_transaction_branch_id,Branch::items());

            $other_info .=  $form->labelEx($category,'category_id');
	    if(!isset($employee_transaction_category_id))
	    $employee_transaction_category_id = 0;
            $other_info .=  CHtml::dropDownList('category_id', $employee_transaction_category_id,Category::items());

            $other_info .=  $form->labelEx($department,'department_id');
            if(!isset($employee_transaction_department_id))
	    $employee_transaction_department_id = 0;
	    $other_info .=  CHtml::dropDownList('department_id', $employee_transaction_department_id,Department::items());

            $other_info .=  $form->labelEx($emp_designation,'employee_designation_id');
            if(!isset($employee_transaction_designation_id))
	    $employee_transaction_designation_id = 0;
	    $other_info .=  CHtml::dropDownList('employee_designation_id', $employee_transaction_designation_id,EmployeeDesignation::items());

	    $other_info .=  $form->labelEx($nationality,'nationality_id');
            if(!isset($employee_transaction_nationality_id))
	    $employee_transaction_nationality_id = 0;
	    $other_info .=  CHtml::dropDownList('nationality_id', $employee_transaction_nationality_id,Nationality::items());

            $other_info .=  $form->labelEx($organization,'organization_id');
            if(!isset($employee_transaction_organization_id))
	    $employee_transaction_organization_id = 0;
	    $other_info .=  CHtml::dropDownList('organization_id', $employee_transaction_organization_id,Organization::items());

            $other_info .=  $form->labelEx($quota,'quota_id');
            if(!isset($employee_transaction_quota_id))
	    $employee_transaction_quota_id = 0;
	    $other_info .=  CHtml::dropDownList('quota_id', $employee_transaction_quota_id,Quota::items());


            $other_info .=  $form->labelEx($religion,'religion_id');
            if(!isset($employee_transaction_religion_id))
	    $employee_transaction_religion_id = 0;
	    $other_info .=  CHtml::dropDownList('religion_id', $employee_transaction_religion_id,Religion::items());

            $other_info .=  $form->labelEx($shift,'shift_id');
            if(!isset($employee_transaction_shift_id))
	    $employee_transaction_shift_id = 0;
	    $other_info .=  CHtml::dropDownList('shift_id', $employee_transaction_shift_id,Shift::items());
*/
	    $guardian_info  = $form->labelEx($model,'employee_guardian_name');
            $guardian_info .= $form->textField($model,'employee_guardian_name',array('size'=>25,'maxlength'=>25));
            $guardian_info .= $form->error($model,'employee_guardian_name');



            $guardian_info .= $form->labelEx($model,'employee_guardian_relation');
            $guardian_info .= $form->textField($model,'employee_guardian_relation',array('size'=>20,'maxlength'=>20));
            $guardian_info .= $form->error($model,'employee_guardian_relation');



            $guardian_info .= $form->labelEx($model,'employee_guardian_home_address');
            $guardian_info .= $form->textField($model,'employee_guardian_home_address',array('size'=>60,'maxlength'=>200));
            $guardian_info .= $form->error($model,'employee_guardian_home_address');


            $guardian_info .= $form->labelEx($model,'employee_guardian_qualification');
            $guardian_info .= $form->textField($model,'employee_guardian_qualification',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($model,'employee_guardian_qualification');


            $guardian_info .= $form->labelEx($model,'employee_guardian_occupation');
            $guardian_info .= $form->textField($model,'employee_guardian_occupation',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($model,'employee_guardian_occupation');

            $guardian_info .= $form->labelEx($model,'employee_guardian_income');
            $guardian_info .= $form->textField($model,'employee_guardian_income',array('size'=>15,'maxlength'=>15));
            $guardian_info .= $form->error($model,'employee_guardian_income');

            $guardian_info .= $form->labelEx($model,'employee_guardian_occupation_address');
            $guardian_info .= $form->textField($model,'employee_guardian_occupation_address',array('size'=>60,'maxlength'=>200));
            $guardian_info .= $form->error($model,'employee_guardian_occupation_address');



            $guardian_info .= $form->labelEx($model,'employee_guardian_occupation_city');
            $guardian_info .= $form->dropDownList($model,'employee_guardian_occupation_city', City::items());
            $guardian_info .= $form->error($model,'employee_guardian_occupation_city');



            $guardian_info .= $form->labelEx($model,'employee_guardian_city_pin');
            $guardian_info .= $form->textField($model,'employee_guardian_city_pin');
            $guardian_info .= $form->error($model,'employee_guardian_city_pin');



            $guardian_info .= $form->labelEx($model,'employee_guardian_phone_no');
            $guardian_info .= $form->textField($model,'employee_guardian_phone_no');
            $guardian_info .= $form->error($model,'employee_guardian_phone_no');


            $guardian_info .= $form->labelEx($model,'employee_guardian_mobile1');
            $guardian_info .= $form->textField($model,'employee_guardian_mobile1');
            $guardian_info .= $form->error($model,'employee_guardian_mobile1');


            $guardian_info .= $form->labelEx($model,'employee_guardian_mobile2');
            $guardian_info .= $form->textField($model,'employee_guardian_mobile2');
            $guardian_info .= $form->error($model,'employee_guardian_mobile2');


            $guardian_info .= $form->labelEx($model,'employee_faculty_of');
            $guardian_info .= $form->textField($model,'employee_faculty_of',array('size'=>50,'maxlength'=>50));
            $guardian_info .= $form->error($model,'employee_faculty_of');

            $guardian_info .= $form->labelEx($model,'employee_attendance_card_id');
            $guardian_info .= $form->textField($model,'employee_attendance_card_id',array('size'=>15,'maxlength'=>15));
            $guardian_info .= $form->error($model,'employee_attendance_card_id');


            $guardian_info .= $form->labelEx($model,'employee_tally_id');
            $guardian_info .= $form->textField($model,'employee_tally_id',array('size'=>9,'maxlength'=>9));
            $guardian_info .= $form->error($model,'employee_tally_id');


            //$guardian_info .= $form->labelEx($model,'employee_created_by');
            //$guardian_info .= $form->textField($model,'employee_created_by');
            //$guardian_info .= $form->error($model,'employee_created_by');


            //$guardian_info .= $form->labelEx($model,'employee_creation_date');
            //$guardian_info .= $form->textField($model,'employee_creation_date');
            //$guardian_info .= $form->error($model,'employee_creation_date');


        ?>

    <?php
        $this->widget('CTabView',array(
            'tabs'=>array(
                'tab1' => array(
                    'title'=>'Personal Info',
                    'content'=>$personal_info,

                ),
                'tab2' => array(
                    'title'=>'Guardian Info',
                    'content'=>$guardian_info,

                ),
                'tab3' => array(
                    'title'=>'Other Info',
                    'content'=>$other_info,

                ),
                       
            ),

        ));

?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
