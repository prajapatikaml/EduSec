<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuInfo */

$this->title = Yii::t('stu', 'Update Stu Info: ') . ' ' . $model->stu_info_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Stu Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_info_id, 'url' => ['view', 'id' => $model->stu_info_id]];
$this->params['breadcrumbs'][] = Yii::t('stu', 'Update');
?>
<div class="stu-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
