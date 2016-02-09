<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuInfo */

$this->title = $model->stu_info_id;
$this->params['breadcrumbs'][] = ['label' => 'Stu Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->stu_info_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->stu_info_id], [
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
            'stu_info_id',
            'stu_unique_id',
            'stu_title',
            'stu_first_name',
            'stu_middle_name',
            'stu_last_name',
            'stu_gender',
            'stu_dob',
            'stu_email_id:email',
            'stu_bloodgroup',
            'stu_birthplace',
            'stu_religion',
            'stu_admission_date',
            'stu_photo',
            'stu_languages',
            'stu_mobile_no',
            'stu_info_stu_master_id',
        ],
    ]) ?>

</div>
