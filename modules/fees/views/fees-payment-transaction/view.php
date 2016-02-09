<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesPaymentTransaction */

$this->title = "Receipt No - ".$model->fees_pay_tran_id;
$this->params['breadcrumbs'][] = ['label' => 'Fees Payment Transactions', 'url' => ['collect']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> <?= Html::encode($this->title) ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', ['pay-fees', 'sid' => $model->fees_pay_tran_stu_id, 'fcid'=>$model->fees_pay_tran_collect_id], ['class' => 'btn btn-block btn-back']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Update', ['update', 'id' => $model->fees_pay_tran_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-4 left-padding">
        <?= Html::a('Delete', ['delete', 'id' => $model->fees_pay_tran_id], [
            'class' => 'btn btn-block btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
	</div>
  </div>
</div>

<div class="col-xs-12">
  <div class="box box-primary view-item" style="padding-bottom:5px">
   <div class="fees-payment-transaction-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'fees_pay_tran_id',
	     [
		'attribute'=>'fees_pay_tran_date',
		'value'=>(!empty($model->fees_pay_tran_date) ? Yii::$app->formatter->asDate($model->fees_pay_tran_date) : "-"),
	    ],	
            [
		'attribute'=>'fees_pay_tran_collect_id',
		'value'=>$model->feesPayTranCollect->fees_collect_name,
	    ],
            [
		'attribute'=>'fees_pay_tran_stu_id',
		'value'=>$model->relStuData->stuMasterStuInfo->name,
	    ],
            [
		'attribute'=>'fees_pay_tran_course_id',
		'value'=>$model->relCourseData->course_name,	
	    ],
            [
		'attribute'=>'fees_pay_tran_batch_id',
		'value'=>$model->relBatchData->batch_name,
	    ],
	    [
		'attribute'=>'fees_pay_tran_section_id',
		'value'=>$model->relSectionData->section_name,
	    ],
            [
		'attribute'=>'fees_pay_tran_mode',
		'value'=>($model->fees_pay_tran_mode==1) ? "Cash" : "Cheque",
	    ],
            [
		'attribute'=>'fees_pay_tran_cheque_no',
	    ],
	    [
		'attribute'=>'fees_pay_tran_cheque_date',
		'value'=>(!empty($model->fees_pay_tran_cheque_date) ? Yii::$app->formatter->asDate($model->fees_pay_tran_cheque_date) : "-"),
	    ],	
            [
		'attribute'=>'fees_pay_tran_bank_id',
		'value'=>(!empty($model->feesPayTranBank->bank_master_name) ? $model->feesPayTranBank->bank_master_name : "-"),
	    ],
	    'fees_pay_tran_bank_branch',
            'fees_pay_tran_amount',
	    'fees_pay_tran_id',
	     [
		'attribute'=>'created_at',
		'value'=>(!empty($model->created_at) ? Yii::$app->formatter->asDateTime($model->created_at) : "-"),
	    ],
            [
		'attribute'=>'created_by',
		'value'=>$model->createdBy->user_login_id,
	    ],
	    [
		'attribute'=>'updated_at',
		'value'=>(!empty($model->updated_at) ? Yii::$app->formatter->asDateTime($model->updated_at) : "-"),
	    ],
	    [
		'attribute'=>'updated_by',
		'value'=>(!empty($model->updatedBy->user_login_id) ? $model->updatedBy->user_login_id : "-"),
	    ],
        ],
    ]) ?>
   </div>
  </div>
</div>
