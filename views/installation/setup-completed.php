<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Installation Completed';
?>

<div class="installation-box-body installation-header">
	<h1>Installation Completed</h1>
</div>
<div class="installation-box-body">
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<strong> Congratulations! Installation process completed successfully.</strong>
	</div>
	<?php if (Yii::$app->session->hasFlash('setup-completed-success')): ?>
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('setup-completed-success') ?>
	</div>
	<?php endif; ?>

	<?php if (Yii::$app->session->hasFlash('demo-db-success')): ?>
	<div class="alert alert-success">
		<i class="icon fa fa-check"></i>
		<?=Yii::$app->session->getFlash('demo-db-success') ?>
	</div>
	
	<div class="box box-info box-solid">
		<div class="box-header">
			<h2 class="box-title">Demo Login Details</h2>
		</div>
		<div class="box-body no-padding table-responsive">
			<table class="table">
				<tr>
					<th>Role</th>
					<th>User Name</th>
					<th>Password</th>
				</tr>
				<tr>
					<th>Admin</th>
					<td>admin</td>
					<td>admin</td>
				</tr>
				<tr>
					<th>Student</th>
					<td>student</td>
					<td>student</td>
				</tr>
				<tr>
					<th>Employee</th>
					<td>employee</td>
					<td>employee</td>
				</tr>
			</table>
		</div>
		<div class="box-footer text-center">
			<?= Html::a('Click here to login', ['site/login'], ['class'=>'', 'target'=>'_blank']) ?>
		</div>
	</div>
	<?php endif; ?>

	<?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
		<?= Html::submitButton('Click to Finish/Login', ['class' =>'btn btn-primary']) ?>
	</div>
		
	<?php ActiveForm::end(); ?>

</div>
