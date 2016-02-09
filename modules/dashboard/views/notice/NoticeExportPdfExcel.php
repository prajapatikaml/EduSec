<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<div class="notice-index">
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

            'notice_title',
            'notice_description',
	    [
		'attribute' => 'notice_user_type',
		'value' => function ($model) {
					return (($model->notice_user_type == 'S') ? 'Student' : (($model->notice_user_type == 'E') ? "Employee" : "General" )); 
				},
           ],
	   [
		'attribute' => 'notice_date',
		'value' => function($data) {
			return Yii::$app->formatter->asDate($data->notice_date);
			},	
	    ],
            [
		'attribute'=>'is_status',
		'value'=>function ($data) {
				return ($data->is_status==1) ? "<b style=\"color:#449d44\">Active</b>" : "<b style=\"color:#c9302c\">Deactive</b>";
			},
		'format'=> 'html',
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
