<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notice */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.checkbox {
	margin-left:18% !important;
}
</style>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="notice-form">
    <?php $form = ActiveForm::begin([
			'id' => 'notice-form',
			'enableAjaxValidation' => true,
			'options' => ['enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <?= $form->field($model, 'notice_title')->textInput(['maxlength' => 25, 'placeholder' => 'Enter Title', 'title' => 'Title']) ?>

    <?= $form->field($model, 'notice_description')->textArea(['maxlength' => 255, 'placeholder' => 'Enter Description']) ?>
    
    <?= $form->field($model, 'notice_user_type')
                        ->radioList( ["S" => 'Student', "E" => 'Employee', '0' => 'General'],
                            [ 'item' => function($index, $label, $name, $checked, $value) {
                                    $return = '<label class="left-padding">';
                                    $return .= Html::radio($name, $checked, ['value' => $value]);
                                    $return .= '<i></i>';
                                    $return .= '<span>&nbsp;&nbsp;&nbsp;' . ucwords($label) . '</span>';
                                    $return .= '</label>';
                                    return $return;
                             }])->label('User Type'); ?>

    <?= $form->field($model, 'notice_date')->widget(yii\jui\DatePicker::className(),
                    [
                      'clientOptions' => [
                          'dateFormat' => 'dd-mm-yyyy',
                          'changeMonth' => true,
                          'changeYear' => true,
                          'autoSize' => true ],
                      'options'=> [
			  'class' => 'form-control',
			  'placeholder' => 'Select Date',
			]
		]) ?>

    <?= $form->field($model, 'notice_file_path')->fileInput() ?>

    <?= $form->field($model, 'is_status')->checkBox(['value'=>0, 'uncheck'=>1], true); ?>

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
