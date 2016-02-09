<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoginDetails */

$this->title = 'Update Login Details: ' . ' ' . $model->login_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Login Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->login_detail_id, 'url' => ['view', 'id' => $model->login_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-lg-12 header">
    <h3><?= Html::encode($this->title) ?></h3>
</div>

<div class="col-lg-12">
<div class="content-area" style="margin-top: 20px;">

<div class="login-details-update">

      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div></div>
