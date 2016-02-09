<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fees\models\FeesCollectCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Fees Categories';
$this->params['breadcrumbs'][] = ['label' => 'Fees', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if(Yii::$app->session->hasFlash('green-0') || Yii::$app->session->hasFlash('red-0')) :
?>
<div class="col-xs-12">
  <div class="alert alert-dismissible" style="background-color: #FFFFFF;border-color: #00c0ef;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span></button>
	<?php
		foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
		     echo '<p class="text-'.preg_split('/[\s,-]+/', $key)[0].'" style="padding-bottom:10px">'.$message.'</p>';
		}
	?>
  </div>
</div>
<?php
endif;
?>

<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
        <?= Html::a('ADD', ['create'], ['class' => 'btn btn-block btn-success']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('PDF', ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('EXCEL', ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
   	<div class="fees-collect-category-index">
	<?php Pjax::begin([
	'enablePushState' => false,
	]); ?>
	    <?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		    'fees_collect_name',
		    'fees_collect_details',
		    [
			'attribute' => 'fees_collect_batch_id',
			'value' => 'feesCollectBatch.batch_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status' => 0])->all(), 'batch_id', 'batch_name', 'batchCourse.course_name')
	 	    ],

		    [
			'attribute' => 'fees_collect_start_date',
			'value' => function ($model) {
					return Yii::$app->formatter->asDate($model->fees_collect_start_date);
				   },
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'fees_collect_start_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'yearRange'=>'1900:'.(date('Y')+1),
				'defaultDate'=> null,],
			     'options'=>[
				'class' => 'form-control',
		                'value' => NULL,
		              ],
		        ]),
			'format' => 'html',	
		    ],

		    [
			'attribute' => 'fees_collect_end_date',
			'value' => function ($model) {
					return Yii::$app->formatter->asDate($model->fees_collect_end_date);
				   },
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'fees_collect_end_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'yearRange'=>'1900:'.(date('Y')+1),
				'defaultDate'=> null,],
			     'options'=>[
				'class' => 'form-control',
		                'value' => NULL,
		              ],
		        ]),
			'format' => 'html',	
		    ],
		    [
			'attribute' => 'fees_collect_due_date',
			'value' => function ($model) {
					return Yii::$app->formatter->asDate($model->fees_collect_due_date);
				   },
			'filter' => \yii\jui\DatePicker::widget([
		            'model'=>$searchModel,
		            'attribute'=>'fees_collect_due_date',
		            'clientOptions' =>[
		                'dateFormat' => 'dd-mm-yyyy',
		                'changeMonth'=> true,
		                'changeYear'=> true,
				'defaultValue'=>null,
				'yearRange'=>'1900:'.(date('Y')+1),
				'defaultDate'=> null,],
			     'options'=>[
				'class' => 'form-control',
		                'value' => NULL,
		              ],
		        ]),
			'format' => 'html',	
		    ],
		 
		    [
			'header' => 'Add Fees Details',
			'class' => 'yii\grid\ActionColumn',
			'template' => '{add_sub_head}',
			'buttons'=>[
		                      'add_sub_head' => function ($url, $model) {
					$url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/create", 'fcc_id'=>$model->fees_collect_category_id]);     
		                        return Html::a('<span class="glyphicon glyphicon-plus text-aqua"></span>', $url, [
		                                'title' => Yii::t('yii', 'Add Sub Head'),'class' => 'text-center', 'style' => 'font-size:20px'
		                        ]);                                
		    
		                      }
		                  ],
			'contentOptions' => ['style' => 'text-align:center'],	
		    ],
		   [
			'class' => '\pheme\grid\ToggleColumn',
			'attribute' => 'is_status',
			'enableAjax' => false,
			'filter' => ['0' => 'Active', '1' => 'Inactive'],
			'contentOptions' => ['class' => 'text-center'],
	        ],

		    ['class' => 'app\components\CustomActionColumn'],
		],
	    ]);

  Pjax::end(); ?>
   	</div>
      </div>
    </div>
</div>
