<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stu-address-form">

    <?php $form = ActiveForm::begin([
			'id' => 'stu-address-form',
			//'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal',  'enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>

    <div class="bs-callout bs-callout-label-3" id="callout-input-needs-type">
    <h5>Current Address</h5>
    </div>
    <?= $form->field($model, 'stu_cadd')->textArea(['maxlength' => 255]) ?>

    <?php echo $form->field($model,'stu_cadd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_c_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_cadd_state').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>

    <?php echo $form->field($model,'stu_cadd_state')->dropDownList(ArrayHelper::map(\app\models\State::findAll(['state_country_id' => $model->stu_cadd_country]),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_c_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_cadd_city').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>
  
    <?php echo $form->field($model,'stu_cadd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $model->stu_cadd_state]),'city_id','city_name'), ['prompt'=>'---Select City---']); 
    ?>

    <?= $form->field($model, 'stu_cadd_pincode')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'stu_cadd_house_no')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'stu_cadd_phone_no')->textInput(['maxlength' => 25]) ?>
  
    <div class="bs-callout bs-callout-label-1" id="callout-input-needs-type">
    <h5>Permenant Address</h5>
    </div>

    <?= $form->field($model, 'stu_padd')->textArea(['maxlength' => 255]) ?>

    <?php echo $form->field($model,'stu_padd_country')->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(),'country_id','country_name'),
		[
                    'prompt'=>'---Select Country---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_p_state').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_padd_state').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>

    <?php echo $form->field($model,'stu_padd_state')->dropDownList(ArrayHelper::map(\app\models\State::findAll(['state_country_id' => $model->stu_padd_country]),'state_id','state_name'),
		[
                    'prompt'=>'---Select State---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/ustud_p_city').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_padd_city').'" ).html( data );
                            }
                        );'    
                ]		
			); 
    ?>
  
    <?php echo $form->field($model,'stu_padd_city')->dropDownList(ArrayHelper::map(\app\models\City::findAll(['city_state_id' => $model->stu_padd_state]),'city_id','city_name'), ['prompt'=>'---Select City---']); 
    ?>

    <?= $form->field($model, 'stu_padd_pincode')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'stu_padd_house_no')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'stu_padd_phone_no')->textInput(['maxlength' => 25]) ?>

    <div class="form-group col-sm-offset-1 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
