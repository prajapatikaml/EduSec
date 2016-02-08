<?php
$this->breadcrumbs=array(
	'Student '=>array('admin'),
	'Create',
);?>
<div class="form">
<?php
echo "&nbsp;";
echo CHtml::link("GO BACK",Yii::app()->createUrl('studentTransaction/notify'),array('title'=>'Go Back'))."</br></br>";  
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-form-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
<table  class="table_data">
<th colspan="3" style="font-size: 18px; color: rgb(255, 255, 255);">
Selected Students 
</th>
	<tr class="table_header">
		<th>SI No.</th>
		<th>Name</th>
		<th>Enrollment No.</th>
		</tr>
	<?php	
	$i=1;
	$m=1;  
	foreach($list as $value)
	  {	
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}?>
	<tr class="<?php echo $class;?>">
	<?php echo '<input type="hidden" name="result[]" value="'. $value. '">';
	$info= StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$value));?>
	<td class="col2"> <?php echo $i ;?></td>
	<td class="col2"><?php echo $info->student_first_name;?></td>
	<td class="col2"><?php echo $info->student_enroll_no;?></td>
	</tr>
<?php	
	$i++;$m++;}

?>

</table></br>

	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Title'), 'Title'); ?>
	<?php echo CHtml::textArea('title', '',array()); ?>
	</div>
	
	
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo','Content'), 'Content'); ?>
	<?php echo CHtml::textArea('content', '',array()); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::button('Send Notification', array('submit' => array('sendNotification'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
