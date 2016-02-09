<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\State */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="state-form">
	<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
    ?>
	
    <?php $form = ActiveForm::begin([
			'id' => 'state-form',
			'action' => $action,
			'enableAjaxValidation' => true,
			
    ]); ?>
   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-sm-6">
    <?= $form->field($model, 'state_country_id',['inputOptions'=>[ 'class'=>'form-control'] ])->dropDownList(ArrayHelper::map(app\models\Country::find()->all(),'country_id','country_name'),['prompt'=>'--Select Country--'])->label(false);
	?>
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'state_name', ['inputOptions'=>['placeholder'=>'State/Province Name'] ])->textInput(['maxlength' => 35])->label(false) ?>
    </div>
   </div>
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
