<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= Html::encode($this->title) ?></h3></div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box">
   <div class="box-body table-responsive">
     <div class="assignment-index">
	   <?php
	    Pjax::begin([
		'enablePushState'=>false,
	    ]);
	    echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'summary'=>'',
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],

		    [
                	'attribute' => $usernameField,
	                'label' => Yii::t('rbac-admin', 'User ID'),
					'value' => function($model) {
								$stuInfo = app\modules\student\models\StuMaster::find()->where([ 'stu_master_user_id' => $model->user_id])->andWhere(['<>', 'is_status', '2'])->one();
								$empInfo = app\modules\employee\models\EmpMaster::find()->where([ 'emp_master_user_id' => $model->user_id])->andWhere(['<>', 'is_status', '2'])->one();
								return (($stuInfo) ? $model->user_login_id." ( ".$stuInfo->stuMasterStuInfo->getName()." )" : (($empInfo) ? $model->user_login_id." ( ".$empInfo->empMasterEmpInfo->getEmpName()." )" : "Admin"));
							},
            ],

		    [
                	'attribute' => 'user_type',
	                'value' => function($model) {
					return (($model->user_type == 'A') ? "Admin" : (($model->user_type == 'S') ? "Student" : "Employee"));
				},
			'filter' => ['A' => 'Admin', 'S' => 'Student', 'E' => 'Employee'],
            	    ],

		    [
			'label' => Yii::t('rbac-admin', 'Role'),
			'attribute' => 'item_name',
			'value'=>'authuser.item_name',
            	    ],

		    [
		        'class' => 'app\components\CustomActionColumn',
		        'template'=>'{view}'
		    ],
		],
	    ]);
	    Pjax::end();
	   ?>
     </div>
   </div>
  </div>
</div>
