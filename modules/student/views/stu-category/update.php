<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuCategory */

$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Admission Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_category_name, 'url' => ['view', 'id' => $model->stu_category_id]];
$this->params['breadcrumbs'][] = Yii::t('stu', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('stu', 'Update Admission Category'); ?></h3></div>
</div>

<div class="stu-status-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
