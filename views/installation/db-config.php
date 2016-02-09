<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Database Settings';
?>

<div class="installation-box-body installation-header">
	<h1>Database Settings</h1>
</div>
<div class="installation-box-body">
	
	<?php if (Yii::$app->session->hasFlash('db-config-error')): ?>
	<div class="alert alert-danger">
		<i class="fa fa-exclamation-triangle"></i>
		<?=Yii::$app->session->getFlash('db-config-error') ?>
	</div>
	<?php endif; ?>

	<?php if (Yii::$app->session->hasFlash('db-config-success')): ?>
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('db-config-success') ?>
	</div>
	<?php endif; ?>

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'db_host')->textInput(['placeholder'=>'Enter Database Host']) ?>

	<?= $form->field($model, 'db_user')->textInput(['placeholder'=>'Enter Database User']) ?>

	<?= $form->field($model, 'db_password')->textInput(['placeholder'=>'Enter Database Password']) ?>
	
	<?= $form->field($model, 'db_name')->textInput(['placeholder'=>'Enter Database Name']) ?>


	<div class="form-group">
		<?= Html::submitButton('Next <i class="fa fa-angle-double-right"></i>', ['class' =>'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
