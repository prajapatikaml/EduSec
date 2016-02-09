<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Section */
/* @var $form yii\widgets\ActiveForm */
if(Yii::$app->controller->action->id == 'create')
	$label = 'Add';
else
	$label = 'Update';
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="section-form">

    <?php $form = ActiveForm::begin([
			'id' => 'section-form',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'section_name')->textInput(['maxlength' => 50, 'placeholder' => $model->getAttributeLabel('section_name')]) ?>
    </div>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'section_batch_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Batches::find()->all(),'batch_id','batch_name'),['prompt'=>'--- Select Batch ---']); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'intake')->textInput(['placeholder' => $model->getAttributeLabel('intake')]) ?>
    </div>
   </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
