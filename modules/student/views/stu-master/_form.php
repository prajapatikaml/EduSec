<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>

<script>
$(function () {
  $('[data-toggle="popover"]').popover({placement: function() { return $(window).width() < 768 ? 'bottom' : 'right'; }})
})
</script>

<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
    <div class="stu-master-form">
     <p class="note">Fields with <span class="required"> <b style=color:red;>*</b></span> are required.</p>
    <?php $form = ActiveForm::begin([
			'id' => 'stu-master-form',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>
    
  
    <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-info-circle"></i> Personal Details</h4>
      </div>
    <div class="box-body">

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-9 col-sm-4">
	<?php $stu_login_prefix = \app\models\Organization::find()->one()->org_stu_prefix;?>
	<?= $form->field($info, 'stu_unique_id', ['template' => '{label}{input}{error}'])->textInput(['value' => $uniq_id]) ?>
    </div>
    <div class="col-xs-3 col-sm-8" style="padding-top: 25px;">
	<button type="button" class="btn btn-danger" data-html=true data-toggle="popover" title="Student Login Note" data-trigger="focus" data-content="Unique Id is used as login username with <b><?= $stu_login_prefix ?> </b>prefix. </br> Example: If Unique id : 123 so, Username : <?= $stu_login_prefix ?>123"><i class="fa fa-info-circle"></i></button>
    </div>
   </div>
   
   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
	<div class="col-xs-12 col-sm-4 col-lg-4">
		<?= $form->field($info, 'stu_title')->dropDownList($info->getTitleOptions(),['prompt'=>'---Select Title---']); ?>
	</div>	
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_first_name')->textInput() ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_middle_name')->textInput() ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_last_name')->textInput() ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
     <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_gender')->dropDownList(['' => '---Select Gender---', 'Male' => 'Male','Female' => 'Female']) ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_email_id')->textInput(['maxlength' => '60']) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_mobile_no')->textInput(['maxlength' => '12']) ?>
    </div>
   </div>
 
   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
	<div class="col-xs-12 col-sm-4 col-lg-4">
		<?= $form->field($info, 'stu_dob')->widget(yii\jui\DatePicker::className(),
	            [
			'model'=>$info,
			'attribute'=>'stu_dob', 
	            'clientOptions' =>[
	                'dateFormat' => 'dd-mm-yyyy',
	                'changeMonth'=> true,
			'yearRange'=>'1900:'.(date('Y')+1),
	                'changeYear'=> true,
			'readOnly'=>true,
	                'autoSize'=>true,],
	            'options'=>[
			'class'=>'form-control',
	                 ],]) ?>		
	</div> 
	<div class="col-xs-12 col-sm-4 col-lg-4">
		<?= $form->field($model, 'stu_master_category_id')->dropDownList(ArrayHelper::map(app\modules\student\models\StuCategory::find()->where(['is_status' => 0])->all(),'stu_category_id','stu_category_name'),['prompt'=>'---Select Category---']); ?>
	</div> 
	<div class="col-xs-12 col-sm-4 col-lg-4">
		<?= $form->field($model, 'stu_master_nationality_id')->dropDownList(ArrayHelper::map(app\models\Nationality::find()->where(['is_status' => 0])->all(),'nationality_id','nationality_name'),['prompt'=>'---Select Nationality---']); ?>
	</div> 
   </div>
 

  </div><!---./end box-body--->
</div><!---./end box--->

<div class="box box-solid box-warning col-xs-12 col-lg-12 no-padding">
  <div class="box-header with-border">
    <h4 class="box-title"><i class="fa fa-info-circle"></i> Academic Details</h4>
   </div>
   <div class="box-body">
   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-4 col-lg-4">
     <?= $form->field($model, 'stu_master_course_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Courses::find()->where(['is_status' => 0])->all(),'course_id','course_name'),
		[
                    'prompt'=>'---Select Course---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/studbatch').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_master_batch_id').'" ).html( data );
                            }
                        );
                    '    
                ]); ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-4">
    <?= $form->field($model, 'stu_master_batch_id')->dropDownList([],
		[
                    'prompt'=>'---Select Batch---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/studsection').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_master_section_id').'" ).html( data );
                            }
                        );'    
                ]); ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
    	<?= $form->field($model, 'stu_master_section_id')->dropDownList([''=>'---Select Section---']); ?>
     </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?= $form->field($info, 'stu_admission_date')->widget(yii\jui\DatePicker::className(),
                    [
			'model'=>$info,
			'attribute'=>'stu_admission_date',
                        'clientOptions' =>[
                        'dateFormat' => 'dd-mm-yyyy',
                        'changeMonth'=> true,
			'yearRange'=>'1900:'.(date('Y')+1),
                        'changeYear'=> true,
			'readOnly'=>true,
                        'autoSize'=>true,
                       // 'showOn'=> "button",
                        'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",],
                        'options'=>[
			'class'=>'form-control',
                         ],]) ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-4">
	<?php $stuStatusData = ['0'=>'General/Default']+ArrayHelper::map(app\modules\student\models\StuStatus::find()->where(['is_status' => 0])->all(),'stu_status_id','stu_status_name');   ?>  
	<?= $form->field($model, 'stu_master_stu_status_id')->dropDownList($stuStatusData); ?>
    </div>
   </div>

  </div><!---./end box-body--->
 </div><!---./end box--->

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
