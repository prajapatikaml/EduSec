<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
use app\models\Languages;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = 'Update Personal Details : ' . ' ' . $model->stuMasterStuInfo->getName();
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stuMasterStuInfo->getName(), 'url' => ['view', 'id' => $model->stu_master_id]];
$this->params['breadcrumbs'][] = 'Update Personal Details';
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

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?> </h3>
  </div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['view', 'id' => $model->stu_master_id], ['class' => 'btn btn-block btn-back']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">
   <div class="stu-master-update">

    <?php $form = ActiveForm::begin([
			'id' => 'stu-master-update',
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
	<?= $form->field($info, 'stu_unique_id')->textInput() ?>
    </div>
    <div class="col-xs-3 col-sm-8" style="padding-top: 25px;">
	<?php $stu_login_prefix = app\models\Organization::find()->one()->org_stu_prefix;?>
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
   	<?= $form->field($info, 'stu_gender')->dropDownList(['' => '---Select Gender---', 'Male' => 'Male', 'Female' => 'Female']) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
    	 <?= $form->field($info, 'stu_email_id')->textInput(['maxlength' => 65]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
    	<?= $form->field($info, 'stu_mobile_no')->textInput(['maxlength' => 12]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-4 col-lg-4">
    	<?= $form->field($info, 'stu_dob')->widget(yii\jui\DatePicker::className(),
                    [
                      'clientOptions' =>[
                          'dateFormat' => 'dd-mm-yyyy',
                          'changeMonth'=> true,
			  'yearRange'=>'1900:'.(date('Y')+1),
                          'changeYear'=> true,
			  'readOnly'=>true,
                          'autoSize'=>true,
                          'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",],
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

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-4 col-lg-4">
    	<?= $form->field($info, 'stu_birthplace')->textInput(['maxlength' => 45]) ?>
    </div>
    <div class="col-xs-12 col-sm-4 col-lg-4">
    <?= $form->field($info, 'stu_bloodgroup')->dropDownList($info->getBloodGroup()); ?>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-4">
    <?= $form->field($info, 'stu_religion')->textInput(['maxlength' => 50]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-12">
    <?php $data = ArrayHelper::map(Languages::find()->asArray()->all(), 'language_name', 'language_name');
	foreach($data as $d)
		$langss[]=$d;

	echo $form->field($info, 'stu_languages')->widget(Select2::classname(),[
			'name' => 'stu_languages[]',
			'options' => ['placeholder' => ''],
			'pluginOptions' => [
				'tags' => $langss,
				'maximumInputLength' => 10,
				'multiple' => true
			],
		]); 
	?>
    </div>
   </div> 

    </div> <!--/ box-body -->
    </div> <!--/ box -->

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['view', 'id' => $model->stu_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>
	<?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
