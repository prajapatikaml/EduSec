<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->org_alias;
$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Institute Setup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> View Institute Setup Details</h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
    
	</div>
	<div class="col-xs-4 ">
       
	</div>
	<div class="col-xs-4 ">
         <?= Html::a('Update', ['update', 'id' => $model->org_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
   </div>
</div>

<div class="col-xs-12">
 <div class="box box-primary view-item">
  <div class="organization-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'org_name',
            'org_alias',
            'org_address_line1',
            'org_address_line2',
            'org_phone',
            'org_email:email',
            'org_website',
	    'org_stu_prefix',
	    'org_emp_prefix',
	    [
		'attribute' => 'created_at',
		'value' => Yii::$app->formatter->asDateTime($model->created_at),
	    ],
            [
		'attribute'=>'created_by',
		'value'=>(!empty($model->createdBy->user_login_id) ? $model->createdBy->user_login_id : "Not Set")
	    ],
	    [
		'attribute' => 'updated_at',
		'value' => ($model->updated_at == null) ? " - ": Yii::$app->formatter->asDateTime($model->updated_at),
	    ],
	    [
		'attribute'=>'updated_by',
		'value'=>(!empty($model->updatedBy->user_login_id) ? $model->updatedBy->user_login_id : "Not Set")
	    ],
	    [
		'attribute'=>'org_logo',
		'value'=>Yii::$app->urlManager->createUrl('/site/loadimage'),	
		'format'=>['image',['width'=>'130','height'=>'70', 'alt'=>'No Image']],
            ],
        ],
    ]) ?>

</div></div></div>
