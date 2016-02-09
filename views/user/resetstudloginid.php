<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StudentDocsTrans */

$this->title = Yii::t('app', '{modelClass}', [
    'modelClass' => 'Reset Student Login',
]);
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url'=>['/student']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(\Yii::$app->session->hasFlash('resetstudloginid')) 
      {
?>
<div class="col-xs-12" style="padding-top: 20px">
    <div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo \Yii::$app->session->getFlash('resetstudloginid'); ?>
    </div>
</div>
<?php
      }
?>
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
		'filterModel' => $searchModel,
		'summary'=>'',
		'options' => ['class' => 'table-responsive'],
		'columns' => [
		    ['class' => 'yii\grid\SerialColumn'],
		
			[
			'label' => 'Student ID',
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
			'label' => 'Course',
			'attribute' => 'stu_master_course_id',
			'value' => 'stuMasterCourse.course_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Courses::find()->where(['is_status' => 0])->all(), 'course_id', 'course_name')
		    ],
	    
		    [
			'label' => 'Batch',
			'attribute' => 'stu_master_batch_id',
			'value' => 'stuMasterBatch.batch_name',
			'filter' => ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status' => 0])->all(), 'batch_id', 'batch_name', 'batchCourse.course_name')
		    ],
	 
		    [
			      'label' => 'User Login Id',
			      'attribute' => 'user_login_id',
			      'value' => 'stuMasterUser.user_login_id',
		    ],
		    [
			'class' => 'yii\grid\ActionColumn',
			'template' => '{Reset_loginid}',
			'buttons' => [
				    'Reset_loginid' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
						    'title' => Yii::t('app', 'Reset Login'),
					]);
				    }
				],
			'urlCreator' => function ($action, $model, $key, $index) {
				    if ($action === 'Reset_loginid') {
					$url = \Yii::$app->getUrlManager()->createUrl(["user/updatestudloginid", 'id' => $model->stuMasterUser->user_id]);
					return $url;
				    }
				}	
		    ],
		],
	    ]); ?>
      </div>
    </div>
</div>
