<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\course\models\Courses;
?>
<div class="batches-index">
    <?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 
	$dispColumn = false;
	if($type == 'Excel') {
		$dispColumn = true;
		echo "<table><tr> <th colspan='10'><h3>".$org['org_name']."</h3> </th> </tr> </table>";
	}
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
	'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'batch_name',
	    'batch_alias',
	    [
		'label' => 'Course',
		'attribute' => 'batch_course_id',
		'value' => 'batchCourse.course_name',
            ],
	    [
		'attribute' => 'start_date',
		'value' => function ($data) {
				return (!empty($data->start_date) ? Yii::$app->formatter->asDate($data->start_date) : ' - ');
			},	
	    ],
	    [
		'attribute' => 'end_date',
		'value' => function ($data) {
				return (!empty($data->end_date) ? Yii::$app->formatter->asDate($data->end_date) : ' - ');
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
    ]); ?>
</div>
