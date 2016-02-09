<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Database Importation';
?>

<div class="installation-box-body installation-header">
	<h1>Database Importation</h1>
</div>
<div class="installation-box-body">
	
	<?php if (Yii::$app->session->hasFlash('db-import-error')): ?>
	<div class="alert alert-danger">
		<i class="fa fa-exclamation-triangle"></i>
		<?=Yii::$app->session->getFlash('db-import-error') ?>
	</div>
	<?php endif; ?>

	<?php if (Yii::$app->session->hasFlash('db-import-success')): ?>
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('db-import-success') ?>
	</div>
	<?php endif; ?>

	<?php $form = ActiveForm::begin(); ?>

	<div class="well">
		<?= $form->field($model, 'is_demo_db')->radioList(['1'=>'Create Sample Database', '0'=>'Create Empty Database'], ['separator'=>'<br>']); ?>
	</div>

	<div class="form-group">
		<?= Html::submitButton('Next <i class="fa fa-angle-double-right"></i>', ['class' =>'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
