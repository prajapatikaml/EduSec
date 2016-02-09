<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\employee\models\EmpDepartment;
use app\modules\employee\models\EmpInfo;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\employee\models\EmpMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Employees';
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

$info = new EmpInfo();
?>
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> 
	<?php echo $this->title ?></h3></div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/employee/emp-master/create")) { ?>
            <?= Html::a('ADD', ['create'], ['class' => 'btn btn-block btn-success']) ?>
	<?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-to-pdf")) { ?>
	    <?= Html::a('PDF', ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?php if(Yii::$app->user->can("/export-data/export-excel")) { ?>
	    <?= Html::a('EXCEL', ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	<?php } ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
    <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->
     <div class="box-body table-responsive">
	
<div class="emp-master-index">
<?php $visible = Yii::$app->user->can("/employee/emp-master/view") ? true : false; ?>
 <?php Pjax::begin([ 'enablePushState' => false ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	'summary'=>'',
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
			'label' => 'Middle Name',
			'attribute' => 'emp_middle_name',
			'value' => 'empMasterEmpInfo.emp_middle_name',
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
			'filter' =>ArrayHelper::map(app\modules\employee\models\EmpDepartment::find()->where(['is_status' => 0 ])->all(),'emp_department_id','emp_department_name')
                ],	
		[
			'label' => 'Designation',
			'attribute' => 'emp_master_designation_id',
			'value' => 'empMasterDesignation.emp_designation_name',
			'filter' => ArrayHelper::map(app\modules\employee\models\EmpDesignation::find()->where(['is_status' => 0 ])->all(),'emp_designation_id','emp_designation_name')
	
                ],
		[
			'label' => 'Category',
			'attribute' => 'emp_master_category_id',
			'value' => 'empMasterCategory.emp_category_name',
			'filter' => ArrayHelper::map(app\modules\employee\models\EmpCategory::find()->where(['is_status' => 0 ])->all(),'emp_category_id','emp_category_name')
	
                ],					
		[
		     	'class' => 'app\components\CustomActionColumn',
			'template' => '{view}{delete}',
			'buttons' => [
				'view' => function ($url, $model) {
				        return ((Yii::$app->user->can("/employee/emp-master/view")) ? Html::a('<span class="glyphicon glyphicon-search"></span>', $url, ['title' => Yii::t('app', 'View'),]) : '');
				    },
				'delete' => function ($url, $model) {
				        return ((Yii::$app->user->can("/employee/emp-master/delete")) ? Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, ['title' => Yii::t('app', 'Delete'), 'data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post'],]) : '');
				    }
			],
		     'visible' => $visible,
		],
	],
    ]); ?>
   <?php Pjax::end(); ?>
</div></div></div></div>
