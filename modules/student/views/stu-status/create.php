<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuStatus */


$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student Status'), 'url' => ['index']];
?>
<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?php echo Yii::t('stu', 'Add Student Status'); ?></h3></div>
</div>

<div class="stu-status-create">
    	<?= $this->render('_form', ['model' => $model,]) ?>
</div>
