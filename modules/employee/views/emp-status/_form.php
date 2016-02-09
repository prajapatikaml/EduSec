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
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="emp-status-form">
	<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
    ?>
   <?php $form = ActiveForm::begin([
			'id' => 'emp-status-form',
			'enableAjaxValidation' => true,
			'action' => $action,
			'fieldConfig' => [
			    'template' => "{input}{error}",
			],
		]); ?>

<div class = "col-sm-6 col-xs-12 col-lg-6">
    <?= $form->field($model, 'emp_status_name',['inputOptions'=>[ 'class'=>'form-control','placeholder' => $model->getAttributeLabel('emp_status_name')]])->textInput(['maxlength' => 50]) ?>
</div>
<div class = "col-sm-6 col-xs-12 col-lg-6">
    <?= $form->field($model, 'emp_status_description',['inputOptions'=>[ 'class'=>'form-control','placeholder' => $model->getAttributeLabel('emp_status_description')]])->textArea(['maxlength' => 1000]) ?>
</div>
    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a('Reset', ['index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
