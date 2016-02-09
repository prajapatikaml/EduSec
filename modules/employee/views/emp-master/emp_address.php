<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpAddress */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update : ' . ' ' . $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name, 'url' => ['view', 'id' => $model->emp_master_id]];
$this->params['breadcrumbs'][] = 'Update Address Details';
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
  <div class="box-info box view-item col-xs-12 col-lg-12">
   <div class="emp-address-form">
     <?php $form = ActiveForm::begin(['id' => 'emp-address-form']); ?>
     <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding edusec-form-bg">
       <div class="box-header with-border">
	  <h4 class="box-title"><i class="fa fa-info-circle"></i> Current Address</h4>
       </div>
      <div class="box-body">

	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-12 col-xs-12">
			<?= $form->field($address, 'emp_cadd')->textArea(['maxlength' => 255]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
			<?= $form->field($address, 'emp_cadd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->where(['is_status' => 0])->all(),'country_id','country_name'),
			[
		            'prompt'=>'---Select Country---',
		            'onchange'=>'
		                $.get( "'.Url::toRoute('dependent/emp_c_state').'", { id: $(this).val() } )
		                    .done(function( data ) {
		                        $( "#'.Html::getInputId($address, 'emp_cadd_state').'" ).html( data );
		                    }
		                );'    
		        ]		
			);   ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		     <?= $form->field($address, 'emp_cadd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->where(['is_status' => 0])->all(),'state_id','state_name'),
			[
		            'prompt'=>'---Select State---',
		            'onchange'=>'
		                $.get( "'.Url::toRoute('dependent/emp_c_city').'", { id: $(this).val() } )
		                    .done(function( data ) {
		                        $( "#'.Html::getInputId($address, 'emp_cadd_city').'" ).html( data );
		                    }
		                );'    
		        ]		
			);     ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_cadd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $address->emp_cadd_state,'is_status'=>0]),'city_id','city_name'), ['prompt'=>'---Select City---']); ?>

		</div>
		<div class = "col-sm-6 col-xs-12">   
		    <?= $form->field($address, 'emp_cadd_pincode')->textInput(['maxlength' => 6]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_cadd_house_no')->textInput(['maxlength' => 25]) ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_cadd_phone_no')->textInput(['maxlength' => 25]) ?>
		</div>
	</div>
</div><!---./end-box-body--->
</div><!---./end-box--->
 <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding edusec-form-bg">
      <div class="box-header with-border">
	  <h4 class="box-title"><i class="fa fa-info-circle"></i> Permanent Address</h4>
       </div>
      <div class="box-body">
	<div class="col-xs-12 col-lg-12 col-lg-12">
		<div class = "col-sm-12 col-xs-12">
		    <?= $form->field($address, 'emp_padd')->textArea(['maxlength' => 255]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
		     <?= $form->field($address, 'emp_padd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->where(['is_status' => 0])->all(),'country_id','country_name'),
			[
		            'prompt'=>'---Select Country---',
		            'onchange'=>'
		                $.get( "'.Url::toRoute('dependent/emp_p_state').'", { id: $(this).val() } )
		                    .done(function( data ) {
		                        $( "#'.Html::getInputId($address, 'emp_padd_state').'" ).html( data );
		                    }
		                );'    
		        ]		
			);     ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_padd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->where(['is_status' => 0])->all(),'state_id','state_name'),
			[
		            'prompt'=>'---Select State---',
		            'onchange'=>'
		                $.get( "'.Url::toRoute('dependent/emp_p_city').'", { id: $(this).val() } )
		                    .done(function( data ) {
		                        $( "#'.Html::getInputId($address, 'emp_padd_city').'" ).html( data );
		                    }
		                );'    
		        ]		
			);    ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_padd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $address->emp_padd_state,'is_status'=>0]),'city_id','city_name'), ['prompt'=>'---Select City---']); ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_padd_pincode')->textInput(['maxlength' => 6]) ?>
		</div>
	</div>
	<div class="col-xs-12 col-lg-12 col-sm-12">
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_padd_house_no')->textInput(['maxlength' => 25]) ?>
		</div>
		<div class = "col-sm-6 col-xs-12">
		    <?= $form->field($address, 'emp_padd_phone_no')->textInput(['maxlength' => 25]) ?>
		</div>
	</div>
</div><!---./end-box-body--->
</div><!---./end-box--->

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6 col-xs-12">
	    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $info->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['view', 'id' => $model->emp_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>	
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
