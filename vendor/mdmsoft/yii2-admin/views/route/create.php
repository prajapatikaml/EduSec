<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\Route $model
 * @var ActiveForm $form
 */

$this->title = Yii::t('rbac-admin', 'Create Route');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Routes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?= $this->title ?> </h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
   </div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo (Yii::$app->controller->action->id == 'create') ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
   <div class="create">
	<?php $form = ActiveForm::begin(); ?>

	      <?= $form->field($model, 'route') ?>

	      <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
		<div class="col-xs-6">
		<?= Html::submitButton(Yii::t('rbac-admin', 'Create'), ['class' => 'btn btn-block btn-success']) ?>
		</div>
		<div class="col-xs-6">
		<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default btn-block']) ?>
		</div>
	     </div>	
	<?php ActiveForm::end(); ?>
   </div><!-- create -->
  </div>
</div>
