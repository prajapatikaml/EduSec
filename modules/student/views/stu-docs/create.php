<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuDocs */

$this->title = 'Create Student Docs';
$this->params['breadcrumbs'][] = ['label' => 'Student Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stu-docs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
