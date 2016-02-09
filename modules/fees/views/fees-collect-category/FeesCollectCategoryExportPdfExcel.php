<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="fees-collect-category-index">
<?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 
	$dispColumn  = false;
	if($type == 'Excel') {
		$dispColumn  = true;
		echo "<table><tr> <th colspan='11'><h3>".$org['org_name']."</h3> </th> </tr> </table>";
	}
?>
<?= GridView::widget([
	'dataProvider' => $model,
	'layout' => '{items}',
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
			'fees_collect_name',
			'fees_collect_details',
		[
			'attribute' => 'fees_collect_batch_id',
			'value' => 'feesCollectBatch.batch_name',
		],

		[
			'attribute' => 'fees_collect_start_date',
			'value' => function ($model) {
				return Yii::$app->formatter->asDate($model->fees_collect_start_date);
			},
		],

		[
			'attribute' => 'fees_collect_end_date',
			'value' => function ($model) {
				return Yii::$app->formatter->asDate($model->fees_collect_end_date);
			},
		],
		[
			'attribute' => 'fees_collect_due_date',
			'value' => function ($model) {
				return Yii::$app->formatter->asDate($model->fees_collect_due_date);
			},
		],
		[
			'label' => 'Created At',
			'attribute' => 'created_at',
			'value' => function ($data) {
				return Yii::$app->formatter->asDateTime($data->created_at);
			},
			'visible'=>$dispColumn,
		],
		[
			'label' => 'Created By',
			'attribute' => 'created_by',
			'value' => 'createdBy.user_login_id',
			'visible'=>$dispColumn,
		],
		[
			'label' => 'Updated At',
			'attribute' => 'updated_at',
			'value' => function ($data) {
				return (!empty($data->updated_at) ? Yii::$app->formatter->asDateTime($data->updated_at) : " (not set) ");
			},
			'visible'=>$dispColumn,
		],
		[
			'label' => 'Updated By',
			'attribute' => 'updated_by',
			'value' => 'updatedBy.user_login_id',
			'visible'=>$dispColumn,
		],
	],
]); 
?>

</div>
