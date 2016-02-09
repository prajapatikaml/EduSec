<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

   <div class="col-lg-12 header">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="operation">
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn update']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn delete',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    </div>

<div class="col-lg-12">
<div class="content-area" style="margin-top: 20px;">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'user_login_id',
            'user_password',
            'user_type',
            'is_block',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div></div></div>
