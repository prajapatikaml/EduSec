<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuAddress */

$this->title = 'Create Stu Address';
$this->params['breadcrumbs'][] = ['label' => 'Stu Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
