<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpInfo */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
$(document).ready(function(){  
       
	$('#empinfo-emp_dob').addClass("form-control"); 
	$('#empinfo-emp_joining_date').addClass("form-control"); 
	    
	
});
</script>
<div class="emp-info-form">
	 <?php $form = ActiveForm::begin([
			'id' => 'emp-info-form',
			'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>
 
    <?= $form->field($model, 'emp_unique_id')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'emp_title')->dropDownList($model->getTitleOptions(),['prompt'=>'Select Title']) ?>

    <?= $form->field($model, 'emp_first_name')->textInput(['maxlength' => 35]) ?>

    <?= $form->field($model, 'emp_middle_name')->textInput(['maxlength' => 35]) ?>

    <?= $form->field($model, 'emp_last_name')->textInput(['maxlength' => 35]) ?>

    <?= $form->field($model, 'emp_name_alias')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'emp_gender')->dropDownList($model->getGenderOptions(),['prompt'=>'Select Title']) ?>

    <?= $form->field($model, 'emp_dob')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
		                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1),
		                //'showOn'=> "button",
				'readOnly'=>true,
		                'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",
                        'htmlOptions'=>[
		                'style'=>'width:250px;',
				'class'=>'form-control',
                         	],
			]
		     ]) 
		?> 

    <?= $form->field($model, 'emp_joining_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
		                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1),
		                //'showOn'=> "button",
				'readOnly'=>true,
		                'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",
                        'htmlOptions'=>[
		                'style'=>'width:250px;',
				'class'=>'form-control',
                         	],
			]
		     ]) 
		?> 

    <?= $form->field($model, 'emp_email_id')->textInput(['maxlength' => 65]) ?>

    <?= $form->field($model, 'emp_maritalstatus')->dropDownList($model->getMaritialStatus(),['prompt'=>'Select Title']) ?>

    <?= $form->field($model, 'emp_mobile_no')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'emp_qualification')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'emp_experience_year')->textInput() ?>

    <?= $form->field($model, 'emp_experience_month')->textInput() ?>

   
    <div class="form-group col-sm-offset-1 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
