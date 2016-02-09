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

$this->title = 'Update : ' . ' ' . $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name, 'url' => ['view', 'id' => $model->emp_master_id]];
$this->params['breadcrumbs'][] = 'Update Other Details';
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?></h3>
  </div>
  <div class="col-xs-4"></div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
    </div>
 </div>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">

<div class="emp-master-update">
   
<?php $form = ActiveForm::begin(['id' => 'emp-otherinfo-update']); ?>

<div class="box box-solid box-info col-xs-12 col-lg-12 no-padding edusec-form-bg">
   <div class="box-header with-border">
       <h4 class="box-title"><i class="fa fa-info-circle"></i> Other Info</h4>
   </div>
   <div class="box-body">
	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_attendance_card_id')->textInput(['maxlength' => 10]) ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_bankaccount_no')->textInput(['maxlength' => 15]) ?>
		</div>
	</div>

	<div class = "col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_mother_name')->textInput(['maxlength' => 20]) ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($info, 'emp_reference')->textInput(['maxlength' => 35]) ?>
		</div>
	</div>

	<div class ="col-xs-12 col-sm-12 col-lg-12">
		<div class = "col-sm-6 col-xs-12">
		    
		</div>
		<div class = "col-sm-6 col-xs-12">
	    	
		</div>
	</div>

	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-12 col-xs-12">
		 <?= $form->field($info, 'emp_specialization')->textInput(['maxlength' => 85]) ?>
		</div>
	</div>
	
	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-12 col-xs-12">
		 <?php $data = ArrayHelper::map(Languages::find()->asArray()->all(), 'language_name', 'language_name');
			foreach($data as $d)
				 $langss[]=$d;

			echo $form->field($info, 'emp_languages')->widget(Select2::classname(),[
			    'name' => 'emp_languages[]',
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

	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-12 col-xs-12">
		  <?= $form->field($info, 'emp_hobbies')->textInput(['maxlength' => 35]) ?>
		</div>
	</div>

</div><!---./end box-body--->
</div><!---./end box--->
 
    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6 col-xs-12">
	    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $info->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['view', 'id' => $model->emp_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>	

    <?php ActiveForm::end(); ?>

</div></div></div>
