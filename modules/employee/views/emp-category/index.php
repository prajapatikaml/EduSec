<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\employee\models\EmpCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Categories';
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];

?>
 <?php if($model->isNewRecord) 
	echo $this->render('create', ['model' => $model]); 
   else
	echo $this->render('update', ['model' => $model]); 	
?>
    
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> 
	<?php echo "Employee Categories"; ?></h3></div>
    <div class="col-xs-4"></div>
      <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
       
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('PDF', ['/export-data/export-to-pdf', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-warning', 'target'=>'_blank']) ?>
	</div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('EXCEL', ['/export-data/export-excel', 'model'=>get_class($searchModel)], ['class' => 'btn btn-block btn-primary', 'target'=>'_blank']) ?>
	</div>
    </div>
 </div>

<div class="col-xs-12" style="padding-top: 10px;">
    <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->
     <div class="box-body table-responsive">
 <div class="emp-category-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'emp_category_name',
            'emp_category_alias',
        
            [
		     'class' => 'app\components\CustomActionColumn',
	    ],
        ],
    ]); ?>

</div></div></div> 
