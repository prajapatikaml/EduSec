<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="stu-master-index">
    <?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 
	$dispColumn = false;
	if($type == 'Excel') {
		echo "<table><tr> <th colspan='11'><h3>".$org['org_name']."</h3> </th> </tr> </table>";
		$dispColumn = true;
	}
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
	'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	    [
		'label' => 'Unique ID',
		'attribute' => 'stu_unique_id',
		'value' => 'stuMasterStuInfo.stu_unique_id',
 	    ],
	
	    [
		'label' => 'First Name',
		'attribute' => 'stu_first_name',
		'value' => 'stuMasterStuInfo.stu_first_name',
 	    ],
            [
		'label' => 'Last Name',
		'attribute' => 'stu_last_name',
		'value' => 'stuMasterStuInfo.stu_last_name',
 	    ],
	 
	    [
		'label' => 'Section',
		'attribute' => 'stu_master_section_id',
		'value' => 'stuMasterSection.section_name',
            ],
    
	    [
		'label' => 'Batch',
		'attribute' => 'stu_master_batch_id',
		'value' => 'stuMasterBatch.batch_name',
            ],
 
	    [
		'label' => 'Course',
		'attribute' => 'stu_master_course_id',
		'value' => 'stuMasterCourse.course_name',
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

