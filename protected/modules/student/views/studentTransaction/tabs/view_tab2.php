<div class="row" >
	<!--div class="row-column2">
		<?php echo CHtml::label('Student No. :','student_no'); ?>   
		<?php echo $info->student_no;?>
	</div-->
	<div class="row-column1">
        <?php echo CHtml::label('Name :','student_guardian_name'); ?>
        <?php echo (!empty ($info->student_guardian_name) ? $info->student_guardian_name :" Not Set"); ?>	
	</div>
	
	<div class="row-column2">
        <?php echo CHtml::label('Relation :','student_guardian_relation'); ?>
	<?php echo (!empty ($info->student_guardian_relation) ? $info->student_guardian_relation : "Not Set");?>	
	</div>
</div>

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Qualification :','student_guardian_qualification'); ?>
        <?php echo (!empty($info->student_guardian_qualification) ? $info->student_guardian_qualification : "Not Set"); ?>	
	</div>

	<div class="row-column2">
        <?php echo CHtml::label('Occupation :','student_guardian_occupation'); ?>
        <?php echo (!empty($info->student_guardian_occupation) ? $info->student_guardian_occupation : "Not Set"); ?>	
	</div>  

</div>

<div class="row">
	<div class="row-column1">        
        <?php echo CHtml::label('Annual Income :','student_guardian_income'); ?>
        <?php echo (!empty($info->student_guardian_income) ? $info->student_guardian_income :"Not Set"); ?>
	</div> 

	<?php if (isset(Yii::app()->modules['parents'])) { ?>
	<div class="row-column2">
		<?php echo CHtml::label('Parent Email :','parent_user_name'); ?>
		<?php if($model->student_transaction_parent_id != 0 ) 
			echo $model->Rel_parent->parent_user_name; 
		      else
			  echo "Not Set";?>
	</div>
	<?php } ?>
</div>

<div class="row">
        <?php echo CHtml::label('Home Address :','student_guardian_home_address'); ?>
        <?php echo (!empty($info->student_guardian_home_address) ? $info->student_guardian_home_address :"Not Set"); ?>
</div>

<div class="row">
        <?php echo CHtml::label('Occupation Address :','student_guardian_occupation_address'); ?>
        <?php echo (!empty($info->student_guardian_occupation_address) ? $info->student_guardian_occupation_address : "Not Set" ); ?>
</div>

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Phone :','student_guardian_phoneno'); ?>
        <?php echo (!empty($info->student_guardian_phoneno) ? $info->student_guardian_phoneno : "Not Set" ); ?>
	</div>

	<div class="row-column2">
	<?php echo CHtml::label('Mobile :','student_guardian_mobile'); ?>
        <?php echo (!empty($info->student_guardian_mobile) ? $info->student_guardian_mobile : "Not Set" ); ?>
	</div>
</div>
