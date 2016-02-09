<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Admin User';
?>

<div class="installation-box-body installation-header">
	<h1>Create Admin User</h1>
</div>
<div class="installation-box-body">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'admin_user')->textInput(['maxlength' => 65, 'placeholder'=>'Enter Admin Username']) ?>

	<?= $form->field($model, 'create_password')->passwordInput(['maxlength' => 150, 'placeholder'=>'Enter Admin Password']) ?>

	<?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => 150, 'placeholder'=>'Enter Confirm Password']) ?>

	<div class="form-group">
		<?= Html::submitButton('Next <i class="fa fa-angle-double-right"></i>', ['class' =>'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
