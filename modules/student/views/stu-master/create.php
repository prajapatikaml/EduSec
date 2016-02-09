<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = Yii::t('stu', 'Add Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Manage Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?= Html::encode($this->title) ?></h3></div>
</div>

<div class="stu-master-create">
    <?= $this->render('_form', ['model' => $model, 'info' => $info, 'uniq_id'=>$uniq_id]) ?>
</div>
