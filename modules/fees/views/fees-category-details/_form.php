<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCategoryDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="fees-category-details-form">
    <?php $form = ActiveForm::begin([
			'id' => 'fees-category-details-form',
			'fieldConfig' => [
			     'template' => "{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_details_name')->textInput(['maxlength' => 70, 'placeholder' => $model->getAttributeLabel('fees_details_name')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'fees_details_amount')->textInput(['maxlength' => 10, 'placeholder' => $model->getAttributeLabel('fees_details_amount')]) ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'fees_details_description')->textArea(['maxlength' => 255, 'placeholder' => $model->getAttributeLabel('fees_details_description')]) ?>
    </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['fees-collect-category/view', 'id' => $_REQUEST['fcc_id']], ['class' => 'btn btn-default btn-block']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
