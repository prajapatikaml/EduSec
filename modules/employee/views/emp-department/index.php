<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDepartment */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('emp', 'Employee Departments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('emp', 'Employee'), 'url' => ['default/index']];

?>
 <?php if($model->isNewRecord) 
	echo $this->render('create', ['model' => $model]); 
   else
	echo $this->render('update', ['model' => $model]); 	
?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding edusecArLangCss"><h3 class="box-title"><i class="fa fa-th-list"></i> 
	<?php echo Yii::t('emp', 'Employee Departments'); ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding edusecArLangHide">
       
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('emp', 'PDF'), ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a(Yii::t('emp', 'EXCEL'), ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
    <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->
     <div class="box-body table-responsive">

<div class="emp-department-index">

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_department_name',
            'emp_department_alias',           

            [
		     'class' => 'app\components\CustomActionColumn',		   	
	    ],
        ],
    ]); ?>

</div></div></div> 
