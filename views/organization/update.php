<?php
use yii\helpers\Html;
$this->title = Yii::t('app', 'Institute Setup')   . ' : ' . $model->org_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url'=>['/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Update Institute Setup')];
?>

<div class="col-sm-12 col-xs-12">
	<!--h2 class="page-header edusec-page-header-btn"><i class="fa fa-edit"></i> <?php //echo Yii::t('app', 'Update Institute Setup') ?>
		<div class="pull-right"><?php // Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-back']) ?></div>
	</h2-->
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('app', 'Update Institute Setup') ?></h3>
  </div>
    <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
		<?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
  </div>
</div>

<div class="organization-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>

