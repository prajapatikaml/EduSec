<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = Yii::t('emp', 'Update : ') . ' ' . $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Manage Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name, 'url' => ['view', 'id' => $model->emp_master_id]];
$this->params['breadcrumbs'][] = Yii::t('emp', 'Update Personal Details');
?>

<script>
	$(function () {
	  $('[data-toggle="popover"]').popover({placement: function() { return $(window).width() < 768 ? 'bottom' : 'right'; }})
	})
</script>


<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?> </h3>
  </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('emp', 'Back'), ['view', 'id' => $model->emp_master_id], ['class' => 'btn btn-block btn-back']) ?>
	</div>
  </div>
</div>

	
<?php
for($i=0;$i<=60;$i++)
	$year[$i]=$i;

for($j=0;$j<=11;$j++)
	$month[$j]=$j;
?>

<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">
    <div class="emp-master-update">

	<?php $form = ActiveForm::begin(['id' => 'emp-master-update', 'enableAjaxValidation' => true,]); ?>

	<div class="box box-solid box-info col-xs-12 col-lg-12 no-padding edusec-form-bg">
	  <div class="box-header with-border">
		<h4 class="box-title"><i class="fa fa-info-circle"></i> <?php echo Yii::t('emp', 'Personal Details'); ?></h4>
	  </div>
	  <div class="box-body">

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-9">
		     <?= $form->field($info, 'emp_unique_id',['inputOptions'=>['class'=>'form-control','placeholder'=> Yii::t('emp', 'Unique Id')]])->textInput() ?>
		</div>
		<div class="col-xs-3 col-sm-8 edusecArLangPopover" style="padding-top: 25px;">
		<?php $emp_login_prefix = \app\models\Organization::find()->one()->org_emp_prefix;?>
			<button type="button" class="btn btn-danger" data-html=true data-toggle="popover" title="Employee Login Note" data-trigger="focus" data-content="Unique Id is used as login username with <b><?= $emp_login_prefix ?> </b>prefix. </br> Example: If Unique id : 123 so, Username : <?= $emp_login_prefix ?>123"><i class="fa fa-info-circle"></i></button>
	    	</div>
	</div>

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-12">
	    	<?= $form->field($info, 'emp_title')->dropDownList($info->getTitleOptions(),['prompt'=>Yii::t('stu','--- Select Title ---')]) ?>
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
		    <?= $form->field($info, 'emp_gender')->dropDownList($info->getGenderOptions(),['prompt'=>Yii::t('stu','--- Select Gender ---')]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">
			<?= $form->field($info, 'emp_dob')->widget(yii\jui\DatePicker::className(),
			[
				'clientOptions' =>[
					'dateFormat' => 'dd-mm-yyyy',
					'changeMonth'=> true,
					'yearRange'=>'1900:'.(date('Y')+1),
					'changeYear'=> true,
					'readOnly'=>true,
					'autoSize'=>true,
				],
				'options'=>[
					'class'=>'form-control',
				],
			]) ?> 
		</div>
	</div>

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-12">
			<?= $form->field($info, 'emp_joining_date')->widget(yii\jui\DatePicker::className(),
			[
				'clientOptions' =>[
					'dateFormat' => 'dd-mm-yyyy',
					'changeMonth'=> true,
					'yearRange'=>'1900:'.(date('Y')+1),
					'changeYear'=> true,
					'readOnly'=>true,
					'autoSize'=>true,
				],
				'options'=>[
					'class'=>'form-control',
				],
			]) ?>  
		</div>
		<div class = "col-sm-4 col-xs-12">
		      <?= $form->field($model, 'emp_master_department_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpDepartment::find()->all(),'emp_department_id','emp_department_name'),['prompt'=>Yii::t('emp', '--- Select Department ---')]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">
		    <?= $form->field($model, 'emp_master_designation_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpDesignation::find()->all(),'emp_designation_id','emp_designation_name'),['prompt'=>Yii::t('emp', '--- Select Designation ---')]) ?>
		</div>
	</div>

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-12">
		    <?= $form->field($model, 'emp_master_category_id')->dropDownList(ArrayHelper::map(app\modules\employee\models\EmpCategory::find()->all(),'emp_category_id','emp_category_name'),['prompt'=>Yii::t('stu', '--- Select Category ---')]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">
		    <?= $form->field($info, 'emp_email_id',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'abc@example.com']])->textInput(['maxlength' => 65]) ?>
		</div>
	 	<div class ="col-sm-4 col-xs-12 col-lg-4">
			<?= $form->field($info, 'emp_mobile_no')->textInput(['maxlength' => 12]) ?>
		</div>
	</div>
	    
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-12">
		    <?= $form->field($info, 'emp_maritalstatus')->dropDownList($info->getMaritialStatus(),['prompt'=>Yii::t('stu','--- Select Status ---')]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">	
		    <?= $form->field($model, 'emp_master_nationality_id')->dropDownList(ArrayHelper::map(app\models\Nationality::find()->all(),'nationality_id','nationality_name'),['prompt'=> Yii::t('stu', '--- Select Nationality ---')]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">
			<div class ="">
				<label for="totalExperience">Total Experience</label>
				<?php /* $info->getAttributeLabel('emp_experience_year_temp') */?>
			</div>
			<div class = "col-sm-6 col-xs-12 no-padding">
				<?= $form->field($info,'emp_experience_year')->dropDownList($year,['prompt'=> Yii::t('emp', 'Year')])->label(false) ?>
			</div>
			<div class = "col-sm-6 col-xs-12 no-padding">
				<?= $form->field($info,'emp_experience_month')->dropDownList($month,['prompt'=> Yii::t('emp', 'Month')])->label(false) ?>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-4 col-xs-12">  
			<?= $form->field($info, 'emp_bloodgroup')->dropDownList($info->getBloodGroup()); ?>
		</div>
		<div class = "col-sm-4 col-xs-12">  
			<?= $form->field($info, 'emp_birthplace')->textInput(['maxlength' => 20]) ?>
		</div>
		<div class = "col-sm-4 col-xs-12">
			<?= $form->field($info, 'emp_religion')->textInput(['maxlength' => 25]) ?>
		</div>
	</div>
	
     </div> <!--/ box-body -->
    </div> <!--/ box -->

	<div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss">
		<div class="col-xs-6 col-xs-12">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('emp', 'Create') : Yii::t('emp', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
		</div>
		<div class="col-xs-6">
		    <?= Html::a(Yii::t('emp', 'Cancel'), ['view', 'id' => $model->emp_master_id], ['class' => 'btn btn-default btn-block']); ?>
		</div>
	</div>								
	<?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
