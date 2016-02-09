<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-status-form">

   <?php $form = ActiveForm::begin([
			'id' => 'emp-status-form',
			'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>


    <?= $form->field($model, 'emp_status_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'emp_status_description')->textArea(['maxlength' => 1000]) ?>

   <div class="col-sm-offset-1 col-lg-10">
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',  ['class' =>'btn btn-submit']) ?>

	<?= Html::a('Reset', ['index'], ['class' => 'btn btn-cancel']) ?>
    </div></div>

    <?php ActiveForm::end(); ?>
</div>
