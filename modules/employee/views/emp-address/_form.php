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
?>

<div class="emp-address-form">

    <?php $form = ActiveForm::begin([
			'id' => 'emp-address-form',
			//'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>

	<div class="bs-callout bs-callout-label-5"><h5> Current Address</h5> </div>
    <?= $form->field($model, 'emp_cadd')->textArea(['maxlength' => 255]) ?>
	
    <?= $form->field($model, 'emp_cadd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/emp_c_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'emp_cadd_state').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>
     <?= $form->field($model, 'emp_cadd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->all(),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/emp_c_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'emp_cadd_city').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>
    <?= $form->field($model, 'emp_cadd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $model->emp_cadd_state]),'city_id','city_name'), ['prompt'=>'---Select City---']); ?>

   

    

    <?= $form->field($model, 'emp_cadd_pincode')->textInput() ?>

    <?= $form->field($model, 'emp_cadd_house_no')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'emp_cadd_phone_no')->textInput(['maxlength' => 25]) ?>

	<div class="bs-callout bs-callout-label-4"><h5> Permanent Address </h5></div>

    <?= $form->field($model, 'emp_padd')->textArea(['maxlength' => 255]) ?>

     <?= $form->field($model, 'emp_padd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/emp_p_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'emp_padd_state').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>
    <?= $form->field($model, 'emp_padd_state')->dropDownList(ArrayHelper::map(\app\models\State::find()->all(),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/emp_p_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'emp_padd_city').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>

    <?= $form->field($model, 'emp_padd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $model->emp_padd_state]),'city_id','city_name'), ['prompt'=>'---Select City---']); ?>

    <?= $form->field($model, 'emp_padd_pincode')->textInput() ?>

    <?= $form->field($model, 'emp_padd_house_no')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'emp_padd_phone_no')->textInput(['maxlength' => 25]) ?>

    <div class="form-group col-sm-offset-1 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
