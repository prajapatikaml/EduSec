<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuStatus */

$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_status_name, 'url' => ['view', 'id' => $model->stu_status_id]];
$this->params['breadcrumbs'][] = Yii::t('stu', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('stu', 'Update Student Status'); ?></h3></div>
</div>

<div class="stu-status-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
