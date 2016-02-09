<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="city-index">
    <?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 
	$dispColumn = false;
	if($type == 'Excel') {
		$dispColumn = true;
		echo "<table><tr> <th colspan=8><h3>".$org['org_name']."</h3> </th> </tr> </table>";
	}
    ?>
<?= GridView::widget([
	'dataProvider' => $model,
	'layout' => '{items}',
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'city_name',
		[
			'label' => 'State/Province',
			'attribute' => 'city_state_id',
			'value' => 'cityState.state_name',
		],
		[
			'label' => 'Country',
			'attribute' => 'city_country_id',
			'value' => 'cityCountry.country_name',
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
]); ?>
</div>
