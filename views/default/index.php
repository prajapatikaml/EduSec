<?php 
use yii\helpers\Html; 
$this->title = Yii::t('app', 'Master Configuration');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-default">
   <div class="box-header with-border">
		<h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?php echo Yii::t('app', 'Master Configuration'); ?></h3>
   </div>
   <div class="box-body">
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-flag"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Country'), ['/country']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\Country::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '. Yii::t('app', 'Create New'), ['/country/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'State/Province'), ['/state']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\State::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '. Yii::t('app', 'Create New'), ['/state/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-building-o"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'City/Town'), ['/city']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\City::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '. Yii::t('app', 'Create New'), ['/city/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<!---Start Second Row Display Configuration--->
		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-university"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Institute'), ['/organization/update', 'id'=>app\models\Organization::find()->one()->org_id]);?></span>
		          <span class="edusec-link-box-number">1</span>
			 <span class="edusec-link-box-desc"><?php echo Yii::t('app', 'Manage Institute Setup'); ?></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-edit"></i> '. Yii::t('app', 'Edit'), ['/organization/update', 'id'=>app\models\Organization::find()->one()->org_id]); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-language"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Languages'), ['/languages']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\Languages::find()->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/languages/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>


		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-calendar-o"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'National Holidays'), ['/national-holidays']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\NationalHolidays::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/national-holidays/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-files-o floatRight"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Document Categories'), ['/document-category']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\DocumentCategory::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"><?php echo Yii::t('app', 'Use Student/Employee Modules'); ?></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/document-category/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>


		<div class="col-md-4 col-sm-6 col-xs-12">
		      <div class="edusec-link-box">
		        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-flag-checkered"></i></span>
		        <div class="edusec-link-box-content">
		          <span class="edusec-link-box-text"><?= Html::a(Yii::t('app', 'Nationality'), ['/nationality']);?></span>
		          <span class="edusec-link-box-number"><?= app\models\Nationality::find()->where(['is_status'=>0])->count(); ?></span>
			 <span class="edusec-link-box-desc"></span>
			  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create New'), ['/nationality/create']); ?></span>
		        </div><!-- /.info-box-content -->
		      </div><!-- /.info-box -->
		</div>
		

	</div> <!-- /. End Row-->
	

</div><!-- /.box-body -->
</div>



