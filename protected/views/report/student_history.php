<script>
function valuealert1()
{
    $('#roll_no').attr("disabled",false);
    $('#en_no').attr("disabled",true);
}
function valuealert2()
{
    $('#en_no').attr("disabled",false);
    $('#roll_no').attr("disabled",true);
}
</script>
<?php
$this->breadcrumbs=array(
    'Student History',
);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'student-fees-report',
    'enableAjaxValidation'=>true,

)); ?>
    <div class="block-error">
        <?php echo Yii::app()->user->getFlash('no-student-found'); ?>
    </div>
    <p class="note">Select any radio-button to enable textbox<span
class="required">*</span></p>
    
	<div class="row">
        	<?php echo CHtml::label('Roll No.','',array('style'=>'width:60px !important;'));?>
        	<input type="radio" name="studentradio" id="btn1" style="margin:7px;" value="1" onclick="valuealert1()"/>
        <?php  echo CHtml::textField('roll_no', null, array('tabindex'=>1,'disabled'=>'disabled'));?><span
class="status">&nbsp;</span>
    	</div>

    <div class="row">
        <?php echo CHtml::label('Enroll No.','', array('style'=>'width:60px !important;'));?>
        <input type="radio" name="studentradio" id="btn2" style="margin:7px;" value="2" onclick="valuealert2()"/>
        <?php echo CHtml::textField('en_no', null, array('tabindex'=>2,'disabled'=>'disabled'));?>
    </div>
	
    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array('class'=>'submit','tabindex'=>3));?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
