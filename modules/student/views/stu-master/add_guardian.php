<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardians */

$this->title = Yii::t('stu', 'Add Guardian Details : ') . ' ' . $model->stuMasterStuInfo->getName();
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Manage Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stuMasterStuInfo->getName(), 'url' => ['view', 'id' => $model->stu_master_id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-xs-12 col-sm-12">
	<div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss">
		<h3 class="box-title">
			<i class="fa fa-plus"></i> <?= Html::encode($this->title) ?>
		</h3>
	</div>
	<div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
		<div class="col-xs-4 edusecArLangHide"></div>
		<div class="col-xs-4 edusecArLangHide"></div>
		<div class="col-xs-4 left-padding">
				<?= Html::a(Yii::t('stu', 'Back'), '', ['class' => 'btn btn-back btn-block', 'onclick'=>'js:history.go(-1);return false;']) ?>
		</div> 
	</div>
</div>

<div class="stu-guardians-create">
    <?= $this->render('stu_guardians', [
        'model' => $model, 'guard' => $guard,
    ]) ?>
</div>
