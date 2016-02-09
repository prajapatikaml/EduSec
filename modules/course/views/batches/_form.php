<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Batches */
/* @var $form yii\widgets\ActiveForm */

if(Yii::$app->controller->action->id == 'create')
	$label = 'Add';
else
	$label = 'Update';
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="batch-form">

    <?php $form = ActiveForm::begin([
			'id' => 'batch-form',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'batch_name')->textInput(['maxlength' => 100, 'placeholder' => $model->getAttributeLabel('batch_name')]) ?>
    </div>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'batch_course_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Courses::find()->all(),'course_id','course_name'),['prompt'=>'--- Select Course ---']); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'batch_alias')->textInput(['maxlength' => 35, 'placeholder' => $model->getAttributeLabel('batch_alias')]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'start_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
                        	'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
		                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1),],
                        'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('Start Date'),
                         ],]) ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'end_date')->widget(yii\jui\DatePicker::className(),
                    [
                        'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
		                'autoSize'=>true,
				'yearRange'=>'1900:'.(date('Y')+1),],
                        'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('End Date'),
                         ],]) ?>
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
