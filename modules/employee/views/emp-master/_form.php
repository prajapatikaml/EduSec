<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpMaster */
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

<?php
for($i=0;$i<=60;$i++)
	$year[$i]=$i;

for($j=0;$j<=11;$j++)
	$month[$j]=$j;
?>


<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
    <div class="emp-master-form">
	<p class="note">Fields with <span class="required"> <b style=color:red;>*</b></span> are required.</p>
     	<?php $form = ActiveForm::begin([
			'id' => 'emp-master-form',
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
	
<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-4 col-xs-9">
	     <?= $form->field($info, 'emp_unique_id',['inputOptions'=>['class'=>'form-control','placeholder'=>'Unique Id']])->textInput(['value'=>$empno]) ?>
	</div>
	<div class="col-xs-3 col-sm-8" style="padding-top: 25px;">
	<?php $emp_login_prefix = \app\models\Organization::find()->one()->org_emp_prefix;?>
		<button type="button" class="btn btn-danger" data-html=true data-toggle="popover" title="Employee Login Note" data-trigger="focus" data-content="Unique Id is used as login username with <b><?= $emp_login_prefix ?> </b>prefix. </br> Example: If Unique id : 123 so, Username : <?= $emp_login_prefix ?>123"><i class="fa fa-info-circle"></i></button>
    	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_title',['inputOptions'=>[ 'class'=>'form-control','placeholder' => $model->getAttributeLabel('emp_title')] ])->dropDownList($info->getTitleOptions(),['prompt'=>'Select Title']) ?>
	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12"> 
	<div class = "col-sm-4 col-xs-12">                                                             
	    <?= $form->field($info, 'emp_first_name')->textInput(['maxlength' => 35]) ?>
	</div>
	<div class = "col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_middle_name')->textInput(['maxlength' => 35]) ?>
	</div>
	<div class = "col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_last_name')->textInput(['maxlength' => 35]) ?>
	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_name_alias')->textInput(['maxlength' => 10]) ?>
	</div>
	<div class = "col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_gender',['inputOptions'=>[ 'class'=>'form-control','placeholder' => $model->getAttributeLabel('emp_gender')] ])->dropDownList($info->getGenderOptions(),['prompt'=>'Select Gender']) ?>
	</div>
	  <div class = "col-sm-4 col-xs-12">
		<?= $form->field($info, 'emp_dob')->widget(yii\jui\DatePicker::className(),
		            [
				'model'=>$info,
				'attribute'=>'emp_dob',
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
		                 ],])->label(true) ?>
	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class = "col-sm-4 col-xs-12">
   		 <?= $form->field($info, 'emp_joining_date')->widget(yii\jui\DatePicker::className(),
                    [
			'model'=>$info,
			'attribute'=>'emp_joining_date',
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
                         ],])->label(true) ?>
	</div>
	<div class = "col-sm-4 col-xs-12">
	      <?= $form->field($model, 'emp_master_department_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpDepartment::find()->where(['is_status'=>0])->all(),'emp_department_id','emp_department_name'),['prompt'=>'Select Department']) ?>
	</div>
	<div class="col-sm-4 col-xs-12">
	    <?= $form->field($model, 'emp_master_designation_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpDesignation::find()->where(['is_status'=>0])->all(),'emp_designation_id','emp_designation_name'),['prompt'=>'Select Designation']) ?>
	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class ="col-sm-4 col-xs-12">
	    <?= $form->field($model, 'emp_master_category_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpCategory::find()->where(['is_status'=>0])->all(),'emp_category_id','emp_category_name'),['prompt'=>'Select Category']) ?>
	</div>
	<div class ="col-sm-4 col-xs-12">
	    <?= $form->field($info, 'emp_email_id',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'abc@example.com']])->textInput(['maxlength' => 65]) ?>
	</div>

	<div class ="col-sm-4 col-xs-12 ">
		<?= $form->field($info, 'emp_mobile_no')->textInput(['maxlength' => 12]) ?>
	</div>
</div>

<div class="col-xs-12 col-lg-12 col-sm-12">
	<div class ="col-sm-4 col-xs-12">
	    <?=  $form->field($info, 'emp_maritalstatus',['inputOptions'=>[ 'class'=>'form-control',] ])->dropDownList($info->getMaritialStatus(),['prompt'=>'Select Status']) ?>
	   
	</div>
	<div class ="col-sm-4 col-xs-12">
	    <?= $form->field($model, 'emp_master_nationality_id')->dropDownList(ArrayHelper::map(app\models\Nationality::find()->where(['is_status'=>0])->all(),'nationality_id','nationality_name'),['prompt'=>'Select Nationality']) ?>
	</div>
	<div class ="col-sm-4 col-xs-12">
	    	<div class ="">
	     		<label for="totalExperience">Total Experience</label>
		</div>
		<div class = "col-sm-6 no-padding">
	  		<?= $form->field($info,'emp_experience_year')->dropDownList($year,['prompt'=>'Year'])->label(false) ?>
		</div>
		<div class = "col-sm-6 no-padding">
	  		<?= $form->field($info,'emp_experience_month')->dropDownList($month,['prompt'=>'Month'])->label(false) ?>
		</div>
	</div>
</div>      

 </div><!---./end box-body--->
</div><!---./end box--->

   <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6 col-xs-12">
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
  </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
