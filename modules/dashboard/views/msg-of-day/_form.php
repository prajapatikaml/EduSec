<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsgOfDay */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.checkbox label {
    padding-left: 30px !important;
}
</style>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="msg-of-day-form">
    <?php $form = ActiveForm::begin([
			'id' => 'msg-of-day-form',
			'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'msg_details')->textArea(['maxlength' => 100, 'placeholder'=>'Enter Message Details'])->label(false) ?>

    <?= $form->field($model, 'msg_user_type')
                        ->radioList( ["S" => 'Student', "E" => 'Employee', '0' => 'General'],
                            [ 'item' => function($index, $label, $name, $checked, $value) {
                                    $return = '<label class="left-padding">';
                                    $return .= Html::radio($name, $checked, ['value' => $value]);
                                    $return .= '<i></i>';
                                    $return .= '<span>&nbsp;&nbsp;&nbsp;' . ucwords($label) . '</span>';
                                    $return .= '</label>';
                                    return $return;
                             }])->label('User Type'); ?>

    <?= $form->field($model, 'is_status')->checkBox(['value'=>0, 'uncheck'=>1], true)->label("<b>&nbsp; Active</b>"); ?>

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
