<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<?php
$this->title = Yii::t('app', '{modelClass}', [
    'modelClass' => 'Update Employee Login',
]);

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> Update User Login  </h3></div>
</div>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="emp-updateloginid-form">
    <?php $form = ActiveForm::begin([
			'id' => 'emp-change-loginid-form',
			//'enableAjaxValidation' => true,
		]); ?>

	
	
		<?php echo $form->field($model,'user_login_id',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Login Id']])->textInput()->label(false); ?>
	

   

<div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a('Reset', ['user/resetemploginid'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
