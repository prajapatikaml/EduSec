<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Update Student Login : ').$model->user_login_id;
?>

<div class="col-xs-12 col-sm-12">
  	<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-pencil-square"></i> <?= $this->title ?></h3></div>
	<div class="col-lg-4 col-sm-4 col-xs-12">
		<div class="col-sm-4 col-xs-4 edusecArLangHide">
		</div>
		<div class="col-sm-4 col-xs-4 edusecArLangHide">
		</div>
		<div class="col-sm-4 col-xs-4 no-padding" style="padding-top: 20px !important;">	
		<?= Html::a(Yii::t('app', 'Back'), ['resetstudloginid'], ['class' => 'btn btn-block btn-back']) ?>
		</div>
	</div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
    <div class="form">
	<?php $form = ActiveForm::begin([
			'id' => 'stud-change-loginid-form',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="col-xs-12 col-sm-12">
	<?= $form->field($model,'user_login_id')->textInput(); ?>
    </div>

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a(Yii::t('app', 'Cancel'), ['user/resetstudloginid'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
