<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\course\models\Courses */

$this->title = Yii::t('course', 'Update Courses: ') . ' ' . $model->course_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('course', 'Course Management'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('course', 'Manage Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->course_name, 'url' => ['view', 'id' => $model->course_id]];
$this->params['breadcrumbs'][] = Yii::t('course', 'Update');
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-edit"></i> <?php echo Yii::t('course', 'Update Course') ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 edusecArLangHide"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('course', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
   </div>
</div>

<div class="courses-update">
      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
