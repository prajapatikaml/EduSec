<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Courses */
/* @var $form yii\widgets\ActiveForm */
if(Yii::$app->controller->action->id == 'create')
	$label = 'Add';
else
	$label = 'Update';
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="courses-form">
    <?php $form = ActiveForm::begin([
			'id' => 'course-form',
			'enableAjaxValidation' => true,
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <!--h3 class="box-title text-green"><?= $label; ?> Course</h3-->

    <div class="col-xs-12 col-sm-12 col-lg-12">
    <?= $form->field($model, 'course_name')->textInput(['maxlength' => 100, 'placeholder' => $model->getAttributeLabel('course_name')]) ?>
    </div>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'course_code')->textInput(['maxlength' => 50, 'placeholder' => $model->getAttributeLabel('course_code')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($model, 'course_alias')->textInput(['maxlength' => 35, 'placeholder' => $model->getAttributeLabel('course_alias')]) ?>
    </div>
   </div>

    <?php if(Yii::$app->controller->action->id == 'create') { ?>

    <h4 class="box-title text-aqua">Initial Batch</h4>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($batch, 'batch_name')->textInput(['maxlength' => 100, 'placeholder' => $batch->getAttributeLabel('batch_name')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($batch, 'batch_alias')->textInput(['maxlength' => 50, 'placeholder' => $batch->getAttributeLabel('batch_alias')]) ?>
    </div>
   </div>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($batch, 'start_date')->widget(yii\jui\DatePicker::className(),
                    [
                     'clientOptions' =>[
                        'dateFormat' => 'dd-mm-yyyy',
                        'changeMonth'=> true,
                        'changeYear'=> true,
                        'autoSize'=>true,
			'yearRange'=>'1900:'.(date('Y')+1),],
                    'options'=>[
			'class'=>'form-control',
			'placeholder' => $batch->getAttributeLabel('start_date')
                         ],]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($batch, 'end_date')->widget(yii\jui\DatePicker::className(),
                    [
                      'clientOptions' =>[
                        'dateFormat' => 'dd-mm-yyyy',
                        'changeMonth'=> true,
                        'changeYear'=> true,
                        'autoSize'=>true,
			'yearRange'=>'1900:'.(date('Y')+1),],
                      'options'=>[
			'class'=>'form-control',
			'placeholder' => $batch->getAttributeLabel('end_date')
                         ],]) ?>
    </div>
   </div>

    <h4 class="box-title text-light-blue">Initial Section</h4>

   <div class="col-xs-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($section, 'section_name')->textInput(['maxlength' => 50, 'placeholder' => $section->getAttributeLabel('section_name')]) ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-lg-6">
    <?= $form->field($section, 'intake')->textInput(['maxlength' => 35, 'placeholder' => $section->getAttributeLabel('intake')]) ?>
    </div>
   </div>

    <?php  } ?>

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
