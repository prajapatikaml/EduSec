<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\modules\fees\models\FeesCategoryDetails;
use app\modules\fees\models\FeesCategoryDetailsSearch;

/* @var $this yii\web\View */
/* @var $model app\modules\fees\models\FeesCollectCategory */

$this->title = $model->fees_collect_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Fees'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('fees', 'Manage Fees Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if(Yii::$app->language == 'fr' || Yii::$app->language == 'hi' || Yii::$app->language == 'gu') :
$this->registerCss('a.btn{ padding: 6px 3px; font-size:13px}');
endif;
if(Yii::$app->language == 'es') :
$this->registerCss('a.btn{ padding: 6px 3px; font-size:10px}');
endif;

?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('fees', 'View Fees Collect Category'); ?></h3></div>
  <div class="col-lg-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-6 col-sm-3 left-padding">
	<?= Html::a(Yii::t('fees', 'Back'), ['index'], ['class' => 'btn btn-block btn-back']) ?>
	</div>
	<div class="col-xs-6 col-sm-3 left-padding">
	<?= Html::a(Yii::t('fees', 'Add Head'), ['fees-category-details/create', 'fcc_id' => $model->fees_collect_category_id], ['class' => 'btn btn-block bg-olive', 'style' => ((Yii::$app->language == 'ar') ? 'padding:7px 3px;font-size:12px' : ''), 'title' => Yii::t('fees', 'Add Head')]) ?>
	</div>
	<div class="col-xs-6 col-sm-3 left-padding">
        <?= Html::a(Yii::t('fees', 'Update'), ['update', 'id' => $model->fees_collect_category_id], ['class' => 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6 col-sm-3 left-padding">
        <?= Html::a(Yii::t('fees', 'Delete'), ['delete', 'id' => $model->fees_collect_category_id], [
            'class' => 'btn btn-block btn-danger',
            'data' => [
                'confirm' => Yii::t('fees', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> 
	</div>
  </div>
</div>

<div class="col-xs-12">
  <div class="box box-primary view-item" style="padding-bottom:5px">
   <div class="fees-collect-category-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'fees_collect_name',
	    'fees_collect_details',
	    [
		'attribute' => 'fees_collect_batch_id',
		'value' => $model->feesCollectBatch->batch_name,
 	    ],
	    [
		'attribute' => 'fees_collect_start_date',
		'value' => Yii::$app->formatter->asDate($model->fees_collect_start_date),
 	    ],
	    [
		'attribute' => 'fees_collect_end_date',
		'value' => Yii::$app->formatter->asDate($model->fees_collect_end_date),
 	    ],
	    [
		'attribute' => 'fees_collect_due_date',
		'value' => Yii::$app->formatter->asDate($model->fees_collect_due_date),
 	    ],
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
	    [
		'label' => Yii::t('fees', 'Status'),
		'attribute' => 'is_status',
            	'value' => ($model->is_status == 0) ? "<span class='label label-success'> ".Yii::t('app', 'Active')." </span>" : "<span class='label label-danger'> ".Yii::t('app', 'Inactive')." </span>",
		'format' => 'raw',
	    ],
        ],
    ]) ?>
   </div>

   <div class="box box-success">
    <div class="box-header" id="callout-input-needs-type">
    	<h4 class="box-title"><?php echo Yii::t('fees', 'Fees Category Details'); ?></h4>
    </div>
       <div class="box-body table-responsive">
	<?php
		$fcd_data = new FeesCategoryDetailsSearch();
		$fcd_dataprovider= $fcd_data->get_fcd($_REQUEST['id']);
	?>
	<?= GridView::widget([
        'dataProvider' => $fcd_dataprovider,
	'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fees_details_name',
            'fees_details_description',
            'fees_details_amount',

            [
		'class' => 'yii\grid\ActionColumn',
		'template' => '{update} {delete}',
		'buttons'=>[
                              'update' => function ($url, $model) {
					$url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/update", "fcd_id" => $model->fees_category_details_id, "fcc_id" => $model->fees_details_category_id]); 
	                                return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                        'title' => Yii::t('yii', 'Update'),
                                ]);                                
            
                              },
			       'delete' => function ($url, $model) {
					$url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/delete", "fcd_id" => $model->fees_category_details_id, "fcc_id" => $model->fees_details_category_id]); 
	                                return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                        'title' => Yii::t('yii', 'Delete'),
                                 	'data' => [
	    					'confirm' => Yii::t('fees', 'Are you sure you want to delete this item?'),
						'method' => 'post',
			            ]]);                                
            
                              }
                          ]
	    ],
        ],
    ]); ?>
       </div>
   </div>
  </div>
</div>
