<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="document-category-form">
	<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
    ?>
	
    <?php $form = ActiveForm::begin([
			'id' => 'document-category-form',
			'action' => $action,
			'enableAjaxValidation' => true,
			
    ]); ?>


    <?= $form->field($model, 'doc_category_name',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Document Category'] ])->textInput(['maxlength' => 50])->label(false) ?>

    <?= $form->field($model, 'doc_category_user_type')
                        ->radioList( ["S" => 'Student', "E" => 'Employee', '0' => 'Both'],
                            [ 'item' => function($index, $label, $name, $checked, $value) {
                                    $return = '<label class="left-padding">';
                                    $return .= Html::radio($name, $checked, ['value' => $value]);
                                    $return .= '<i></i>';
                                    $return .= '<span>&nbsp;&nbsp;&nbsp;' . ucwords($label) . '</span>';
                                    $return .= '</label>';
                                    return $return;
                             }])->label('User Type'); ?>

  <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::resetButton('Reset',['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
