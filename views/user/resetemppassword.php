<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StudentDocsTrans */

$this->title = Yii::t('app', '{modelClass}', [
    'modelClass' => 'Reset Employee Password',
]);

$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url'=>['/employee']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reset Employee Password')];
?>

<?php if(\Yii::$app->session->hasFlash('resetemppassword')) : ?>
<div class="col-xs-12" style="padding-top: 20px">
   <div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?php echo \Yii::$app->session->getFlash('resetemppassword'); ?>
   </div>
</div>
<?php endif;  ?>

<?php $dataProvider = $model->search(Yii::$app->request->queryParams); ?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;"></div>
</div>


<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $model,
	'summary' => '',
	'options' => ['class' => 'table-responsive'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
		
		[
			'label' => 'Employee ID',
			'attribute' => 'emp_unique_id',
			'value' => 'empMasterEmpInfo.emp_unique_id',
 	        ],
		[
			'label' => 'First Name',
			'attribute' => 'emp_first_name',
			'value' => 'empMasterEmpInfo.emp_first_name',
 	        ],
		[
			'label' => 'Last Name',
			'attribute' => 'emp_last_name',
			'value' => 'empMasterEmpInfo.emp_last_name',
 	        ],
		[
			'label' => 'Department',
			'attribute' => 'emp_master_department_id',
			'value' => 'empMasterDepartment.emp_department_name',
			'filter' =>ArrayHelper::map(app\modules\employee\models\EmpDepartment::find()->all(),'emp_department_id','emp_department_name')
                ],
		[
			'label' => 'Designation',
			'attribute' => 'emp_master_designation_id',
			'value' => 'empMasterDesignation.emp_designation_name',
			'filter' => ArrayHelper::map(app\modules\employee\models\EmpDesignation::find()->all(),'emp_designation_id','emp_designation_name')
                ],
		[
		      'label' => 'User Login Id',
		      'attribute' => 'user_login_id',
	              'value' => 'empMasterUser.user_login_id',
		      'options'=>['style'=>'min-width:140px'],
		      
                ],
            [
		'class' => 'yii\grid\ActionColumn',
		'template' => '{Reset_password}',
		'buttons' => [
			    'Reset_password' => function ($url, $model) {
				return Html::a('<span class="glyphicon glyphicon-lock" style="font-size:20px"></span>', $url, [
					    'title' => Yii::t('app', 'Reset Password'),
				]);
			    }
			],
		'urlCreator' => function ($action, $model, $key, $index) {
			    if ($action === 'Reset_password') {
				$url = \Yii::$app->getUrlManager()->createUrl(["user/update-emp-password", 'id' => $model->empMasterUser->user_id]);
				return $url;
			    }
			}	
	    ],
        ],
    ]); ?>
    </div>
</div>
</div>
