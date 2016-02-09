<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuGuardians */

$this->title = $model->stu_guardian_id;
$this->params['breadcrumbs'][] = ['label' => 'Stu Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-guardians-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stu_guardian_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stu_guardian_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'stu_guardian_id',
            'guardian_name',
            'guardian_relation',
            'guardian_mobile_no',
            'guardian_phone_no',
            'guardian_qualification',
            'guardian_occupation',
            'guardian_income',
            'guardian_email:email',
            'guardian_home_address',
            'guardian_office_address',
            'guardia_stu_master_id',
        ],
    ]) ?>

</div>
