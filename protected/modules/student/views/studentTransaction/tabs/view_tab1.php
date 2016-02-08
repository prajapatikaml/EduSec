<div class="row">    
	<div class="row-column1">
		<?php echo CHtml::label('Student Unique Id. :','student_roll_no'); ?>   
		<?php echo $info->student_roll_no;?>
	</div>
	<div class="row-column1">
		<?php echo CHtml::label('Title :','title'); ?>
		<?php echo $info->title;?>    
	</div>
	<!--div class="row-column2">
		<?php echo CHtml::label('Student No. :','student_no'); ?>   
		<?php echo $info->student_no;?>
	</div-->
</div>
<div class="row">
	<div class="row-column2">   
        	<?php echo CHtml::label('First Name :','student_first_name'); ?>
		<?php echo (!empty ($info->student_first_name) ? $info->student_first_name : "Not Set" );?>    
        </div> 
	
	<div class="row-column1">   
		<?php echo CHtml::label('Middle Name :','student_middle_name'); ?>
		<?php echo (!empty($info->student_middle_name) ? $info->student_middle_name : "Not Set");?>
	</div>
	<!--div class="row-column2">
	        <?php echo CHtml::label('Adm. Date :','student_adm_date'); ?>
		<?php if($info->student_adm_date != NULL)
			echo date('d-m-Y',strtotime($info->student_adm_date));?>
	</div-->

</div>

<div class="row">   
	<div class="row-column2">   
		<?php echo CHtml::label('Last Name','student_last_name'); ?>
		<?php echo (!empty ($info->student_last_name) ? $info->student_last_name :"Not Set");?>
	</div>  	
	<div class="row-column1">
		<?php echo CHtml::label('Gender :','student_gender'); ?>
		<?php echo (!empty($info->student_gender) ? $info->student_gender : "Not Set");?>
	</div>	 
</div>


<div class="row">

	<div class="row-column1">
        <?php echo CHtml::label('Date Of Birth :','student_dob'); ?>
	<?php 	if($info->student_dob == '0000-00-00' || $info->student_dob == null)
		  echo "Not Set";
		else
		   echo date('d-m-Y',strtotime($info->student_dob));
		?>
	</div>

	<div class="row-column2">
        <?php echo CHtml::label('Nationality :','student_transaction_nationality_id'); ?>
        <?php if($model->student_transaction_nationality_id!=null)
		echo $model->Rel_Nationality->nationality_name;	
	      else
		echo "Not Set";	
	?>
	</div>	
	
          
</div>

<!--div class="row">
	<div class="row-column1">
		<?php //echo CHtml::label('Mobile No. :','student_mobile_no'); ?>   
		<?php // echo $info->student_mobile_no;?>
	</div>
	<!--div class="row-column2">
        <?php //echo CHtml::label('Batch :','student_transaction_batch_id'); ?>
        <?php //if($model->student_transaction_batch_id!=0)
		//echo $model->Rel_Batch->batch_code; ?>	
	</div>
</div-->


<div class="row">

	<div class="row-column1">
		<?php echo CHtml::label('Contact No. :','student_mobile_no'); ?>   
		<?php echo (!empty($info->student_mobile_no) ? $info->student_mobile_no : "Not Set");?>
	</div>
	<div class="row-column2">
        <?php echo CHtml::label('Student Email :','student_email_id_1'); ?>
        <?php if(!empty($info->student_email_id_1))
		echo $info->student_email_id_1; 
	      else
		echo "Not Set";?>	
	</div>
	
</div>
