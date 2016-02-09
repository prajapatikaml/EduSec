
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardians */

$this->title = Yii::t('stu', 'Update Stu Guardians: ') . ' ' . $model->stu_guardian_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Stu Guardians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_guardian_id, 'url' => ['view', 'id' => $model->stu_guardian_id]];
$this->params['breadcrumbs'][] = Yii::t('stu', 'Update');
?>
<div class="stu-guardians-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
