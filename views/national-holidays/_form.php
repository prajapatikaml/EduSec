<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NationalHolidays */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
$(document).ready(function(){  
	$('#nationalholidays-national_holiday_date').addClass("form-control");

});
</script>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="national-holidays-form">
<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
?>
	
    <?php $form = ActiveForm::begin([
			'id' => 'national-holidays-form',
			'action' => $action,
			'enableAjaxValidation' => true,
			
    	]); ?>
<div class="col-sm-6">
    <?= $form->field($model, 'national_holiday_name',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'National Holiday'] ])->textInput(['maxlength' => 50])->label(false) ?>
</div>
<div class="col-sm-6">
    <?= $form->field($model, 'national_holiday_date')->widget(yii\jui\DatePicker::className(),
                    [
			'options' => ['placeholder' => 'Holiday Date'],
                        'clientOptions' =>[
                        'dateFormat' => 'dd-mm-yyyy',
                        'changeMonth'=> true,
			'changeYear'=> true,
			'autoSize'=>true,
                       // 'showOn'=> "button",
                        'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",
                        'htmlOptions'=>[
                        'style'=>'width:250px;',
			'class'=>'form-control',
                         ],]])->label(false) ?> 
 </div>
<div class="col-sm-12">
    <?= $form->field($model, 'national_holiday_remarks',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Remarks'] ])->textInput(['maxlength' => 100])->label(false) ?>
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
