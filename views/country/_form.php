<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>
	<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
    ?>


<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
    <div class="country-form">

    <?php $form = ActiveForm::begin([
			'id' => 'country-form',
			'action' => $action,
			'enableAjaxValidation' => true,
			
    ]); ?>

    	<?= $form->field($model, 'country_name', ['inputOptions'=>[ 'class'=>'form-control', 'placeholder'=>'Country Name'] ] )->textInput(['maxlength' => 35])->label(false); ?>

     <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::resetButton('Reset', ['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
