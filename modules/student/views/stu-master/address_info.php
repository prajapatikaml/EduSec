<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = 'Update Address Details : ' . ' ' . $model->stuMasterStuInfo->getName();
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stuMasterStuInfo->stu_first_name." ".$model->stuMasterStuInfo->stu_last_name, 'url' => ['view', 'id' => $model->stu_master_id]];
$this->params['breadcrumbs'][] = 'Update Address Details';
?>
<style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?> </h3>
  </div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', '', ['class' => 'btn btn-block btn-back', 'onclick'=>'js:history.go(-1);return false;']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">
	<div class="stu-master-update">
    <?php $form = ActiveForm::begin([
			'id' => 'stu-address-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

<div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-info-circle"></i> Current Address</h4>
      </div>

<div class="box-body">    
 <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-12 col-lg-12">
   	 <?= $form->field($address, 'stu_cadd')->textArea(['maxlength' => 255]) ?>
    </div>	
 </div>

<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
      <div class="col-xs-12 col-sm-6 col-lg-6">	
	    <?php echo $form->field($address,'stu_cadd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->where(['is_status' => 0])->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_c_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($address, 'stu_cadd_state').'" ).html( data );
                            }
                        );'    
                ]		
			);    ?>
      </div>
       <div class="col-xs-12 col-sm-6 col-lg-6">
   	 <?php echo $form->field($address,'stu_cadd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->where(['state_country_id' => $address->stu_cadd_country, 'is_status' => 0])->all(),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_c_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($address, 'stu_cadd_city').'" ).html( data );
                            }
                        );'    
                ]		
			);   ?>
	</div>
</div>

<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    	<?php echo $form->field($address,'stu_cadd_city')->dropDownList(ArrayHelper::map(\app\models\City::find()->where(['city_state_id' => $address->stu_cadd_state, 'is_status' => 0])->all(),'city_id','city_name'), ['prompt'=>'---Select City---']); 
    ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-6">
    	<?= $form->field($address, 'stu_cadd_pincode')->textInput(['maxlength' => 6]) ?>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">	 
    	<?= $form->field($address, 'stu_cadd_house_no')->textInput(['maxlength' => 25]) ?>
     </div>
    <div class="col-xs-12 col-sm-6 col-lg-6">	 	
    	<?= $form->field($address, 'stu_cadd_phone_no')->textInput(['maxlength' => 25]) ?>
    </div>
</div>

	 </div> <!--/ box-body -->
    </div> <!--/ box -->


    <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-info-circle"></i> Permanent Address</h4>
     </div>
<div class="box-body">   

  <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-12 col-lg-12">
  	  <?= $form->field($address, 'stu_padd')->textArea(['maxlength' => 255]) ?>
    </div>	
 </div>

<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
      <div class="col-xs-12 col-sm-6 col-lg-6">	
    	<?php echo $form->field($address,'stu_padd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->where(['is_status' => 0])->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_p_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($address, 'stu_padd_state').'" ).html( data );
                            }
                        );'    
                ]		
			);    ?>
	</div>
	<div class="col-xs-12 col-sm-6 col-lg-6">	
	    <?php echo $form->field($address,'stu_padd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->where(['state_country_id' => $address->stu_padd_country, 'is_status' => 0])->all(),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_p_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($address, 'stu_padd_city').'" ).html( data );
                            }
                        );'    
                ]		
		);    ?>
	</div>
 </div>
  <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
      <div class="col-xs-12 col-sm-6 col-lg-6">	
  	  <?php echo $form->field($address,'stu_padd_city')->dropDownList(ArrayHelper::map(\app\models\City::find()->where(['city_state_id' => $address->stu_padd_state, 'is_status' => 0])->all(),'city_id','city_name'), ['prompt'=>'---Select City---']); 
    ?>
     </div>
      <div class="col-xs-12 col-sm-6 col-lg-6">			
	    <?= $form->field($address, 'stu_padd_pincode')->textInput(['maxlength' => 6]) ?>
      </div>
 </div>
<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
      <div class="col-xs-12 col-sm-6 col-lg-6">		
	    <?= $form->field($address, 'stu_padd_house_no')->textInput(['maxlength' => 25]) ?>
      </div>
      <div class="col-xs-12 col-sm-6 col-lg-6">		
	    <?= $form->field($address, 'stu_padd_phone_no')->textInput(['maxlength' => 25]) ?>
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

