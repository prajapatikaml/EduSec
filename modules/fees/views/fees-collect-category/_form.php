<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCollectCategory */
/* @var $form yii\widgets\ActiveForm */

// Indian Ruppee code: &#8377;
?>
<script>

$(document).ready(function() {
        $('#<?= Html::getInputId($model, "fees_collect_batch_id")?>').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
	    enableCaseInsensitiveFiltering: true,
	    enableClickableOptGroups: true,
	    buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'Select Batch(es)';
                }
		else {
                     var labels = [];
                     options.each(function() {
                         if ($(this).attr('label') !== undefined) {
                             labels.push($(this).attr('label'));
                         }
                         else {
                             labels.push($(this).text());
                         }
                     });
                     return labels.join(', ') + '';
                }
	    }
        });
    });

</script>
<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 15px 15px 15px !important;
    margin: 0 0 10px 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
ul.multiselect-container{
    overflow: auto !important;
    height: 230px !important;
    left: auto;
    top: 35px;
}
</style>
<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
   <div class="fees-collect-category-form">
    <?php $form = ActiveForm::begin([
			'id' => 'fees-collect-category-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_collect_name')->textInput(['maxlength' => 70, 'placeholder' => $model->getAttributeLabel('fees_collect_name')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_collect_details')->textArea(['maxlength' => 255, 'placeholder' => $model->getAttributeLabel('fees_collect_details')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_collect_start_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
                        	'dateFormat' => 'dd-mm-yyyy',
	                        'changeMonth'=> true,
        	                'changeYear'=> true,
        	                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1)],
                        'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('fees_collect_start_date')
                         ],]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_collect_end_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
        	                'dateFormat' => 'dd-mm-yyyy',
        	                'changeMonth'=> true,
        	                'changeYear'=> true,
        	                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1)],
                        'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('fees_collect_end_date')
                         ],]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_collect_due_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
        	                'dateFormat' => 'dd-mm-yyyy',
        	                'changeMonth'=> true,
        	                'changeYear'=> true,
        	                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1)],
                        'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('fees_collect_due_date')
                         ],]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?php
	if(Yii::$app->controller->action->id === 'create' ) {
    		echo $form->field($model, 'fees_collect_batch_id[]')->dropDownList(ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status' => 0])->all(),'batch_id','batch_name','batchCourse.course_name'),['multiple' => "multiple", 'class'=>'form-control', 'placeholder' => $model->getAttributeLabel('fees_collect_batch_id')]);  
	} else { 
		echo $form->field($model, 'fees_collect_batch_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status' => 0])->all(),'batch_id','batch_name','batchCourse.course_name'),['class'=>'form-control', 'placeholder' => $model->getAttributeLabel('fees_collect_batch_id')]);
	}
    ?>
    </div>

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
