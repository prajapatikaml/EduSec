<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">
   <div class="bank-master-form">
    <?php $form = ActiveForm::begin([
			'id' => 'bank-master-form',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			'template' => "{input}{error}",
			],
    ]); ?>
   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'bank_master_name')->textInput(['maxlength' => 50, 'placeholder' => $model->getAttributeLabel('bank_master_name')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'bank_alias')->textInput(['maxlength' => 10, 'placeholder' => $model->getAttributeLabel('bank_alias')]) ?>
    </div>
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
