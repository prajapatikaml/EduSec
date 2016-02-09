<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>
<div class="emp-master-index">
    <?php  
	$org = app\models\Organization::find()->asArray()->one();
	$model->sort = false; 
	$dispColumn = false;
	if($type == 'Excel') {
		echo "<table><tr><th colspan='11'><h3>".$org['org_name']."</h3> </th> </tr> </table>";
		$dispColumn = true;
	}
    ?>
    <?= GridView::widget([
        'dataProvider' => $model,
	'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	    [
		'attribute' => 'empMasterEmpInfo.emp_unique_id',
		'value' => 'empMasterEmpInfo.emp_unique_id',
 	    ],
	
	    [
		'attribute' => 'empMasterEmpInfo.emp_first_name',
		'value' => 'empMasterEmpInfo.emp_first_name',
 	    ],
	    [
		'attribute' => 'empMasterEmpInfo.emp_middle_name',
		'value' => 'empMasterEmpInfo.emp_middle_name',
 	    ],	
            [
		'attribute' => 'empMasterEmpInfo.emp_last_name',
		'value' => 'empMasterEmpInfo.emp_last_name',
 	    ],
	 
	    [
		'attribute' => 'empMasterDepartment.emp_department_name',
		'value' => 'empMasterDepartment.emp_department_name',
            ],
    
	    [
		'attribute' => 'empMasterDesignation.emp_designation_name',
		'value' => 'empMasterDesignation.emp_designation_name',
            ],
 
	    [
		'attribute' => 'empMasterCategory.emp_category_name',
		'value' => 'empMasterCategory.emp_category_name',
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

