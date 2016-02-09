<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuCategory */

$this->title = $model->stu_category_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Student'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('stu', 'Admission Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('stu', 'View Admission Category'); ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('stu', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('stu', 'Update'), ['update', 'id' => $model->stu_category_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('stu', 'Delete'), ['delete', 'id' => $model->stu_category_id], [
            'class' => 'btn btn-block btn-danger',
            'data' => [
                'confirm' => Yii::t('stu', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> 
	</div>
  </div>
</div>

<div class="col-xs-12">
  <div class="box box-primary view-item">
   <div class="stu-category-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'stu_category_name',
            [
		'attribute' => 'created_at',
		'value' => Yii::$app->formatter->asDateTime($model->created_at),
	    ],
            [
		'attribute' => 'created_by',
		'value' => $model->createdBy->user_login_id,
	    ],
	    [
		'attribute' => 'updated_at',
		'value' => ($model->updated_at == null) ? " - ": Yii::$app->formatter->asDateTime($model->updated_at),
	    ],
	    [
		'attribute' => 'updated_by',
        'value' => ($model->updated_by == null) ? " - ": $model->updatedBy->user_login_id,
	    ],
        ],
    ]) ?>
   </div>
 </div>
</div>
