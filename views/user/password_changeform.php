<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Change User Password"; 
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-6 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title); ?></h3></div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
    <div class="form">
	<?php $form = ActiveForm::begin([
			'id' => 'change-password-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

	<?= $form->field($model, 'current_pass')->passwordInput(['maxlength' => 60, 'placeholder' => $model->getAttributeLabel('current_pass')]) ?>

	<?= $form->field($model, 'new_pass')->passwordInput(['maxlength' => 60, 'placeholder' => $model->getAttributeLabel('new_pass')]) ?>

	<?= $form->field($model, 'retype_pass')->passwordInput(['maxlength' => 60, 'placeholder' => $model->getAttributeLabel('retype_pass')]) ?>

   <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
           <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' =>'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	   <?= Html::a('Cancel', ['/site/index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>
 <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
