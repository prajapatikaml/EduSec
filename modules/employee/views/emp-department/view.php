<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDepartment */

$this->title = $model->emp_department_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('emp', 'View Department'); ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('emp', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('emp', 'Update'), ['update', 'id' => $model->emp_department_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a(Yii::t('emp', 'Delete'), ['delete', 'id' => $model->emp_department_id], [
            'class' => 'btn btn-block btn-danger',
            'data' => [
                'confirm' => Yii::t('emp', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> 
	</div>
   </div>
</div>
  
<div class="col-xs-12">
<div class="box box-primary view-item">
<div class="emp-department-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
           // 'emp_department_id',
            'emp_department_name',
            'emp_department_alias',
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
            //'is_status',
        ],
    ]) ?>

</div></div></div>
