<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardians */

$this->title = 'Add Guardian Details : ' . ' ' . $model->stuMasterStuInfo->getName();
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stuMasterStuInfo->getName(), 'url' => ['view', 'id' => $model->stu_master_id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-xs-12 col-sm-12">
	<h3 class="box-title">
		<i class="fa fa-plus"></i> <?= Html::encode($this->title) ?>
		<div class="pull-right">
			<?= Html::a('Back', '', ['class' => 'btn btn-back', 'onclick'=>'js:history.go(-1);return false;']) ?>
		</div>
	</h3> 
</div>

<div class="stu-guardians-create">
    <?= $this->render('stu_guardians', [
        'model' => $model, 'guard' => $guard,
    ]) ?>
</div>
