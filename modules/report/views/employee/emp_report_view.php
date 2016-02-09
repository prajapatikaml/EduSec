<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\employee\models\EmpInfo;
use app\modules\employee\models\EmpCategory;
use app\modules\employee\models\EmpDepartment;
use app\models\City;

$this->title = Yii::t('report', 'Employee Info Report');
$this->params['breadcrumbs'][] = ['label' => Yii::t('report', 'Reports'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2 class="page-header">	
	<i class="fa fa-info-circle"></i> <?php echo Yii::t('report', 'Employee Info Report'); ?>
</h2>

<?php if(\Yii::$app->getSession()->hasFlash('emperror')) : ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<?= \Yii::$app->getSession()->getFlash('emperror'); ?>
</div>
<?php endif; ?>

<div class="box box-solid box-info">
    <div class="box-header with-border">
	<h4 class="box-title"><i class="fa fa-search"></i> <?php echo Yii::t('report', 'Select Criteria'); ?></h4>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'emp-report-view-form',]); ?>
    <div class="box-body">   
	<div class="row">
	    <div class="col-xs-12 col-sm-4 col-lg-4 form-group">
	      	<?= Html::label(Yii::t('report', 'Department'),'',['class'=> 'control-label']); ?>
		<span style='color:red;'> * </span>
		<?= Html::dropDownList('department', null, ArrayHelper::map(\app\modules\employee\models\EmpDepartment::find()->where(['is_status' => 0])->all(),'emp_department_id','emp_department_name'),['prompt' => Yii::t('report', '--- Select Department ---'),'class'=>'form-control', 'required'=>true]); ?>
	    </div>
	     <div class="col-xs-12 col-sm-4 col-lg-4 form-group">
	      	<?= Html::label(Yii::t('report', 'Designation'),'',['class'=> 'control-label']); ?>
		<?= Html::dropDownList('designation', null, ArrayHelper::map(\app\modules\employee\models\EmpDesignation::find()->where(['is_status' => 0])->all(),'emp_designation_id','emp_designation_name'),['prompt' => Yii::t('report', '--- Select Designation ---'),'class'=>'form-control']); ?>
	    </div>
	    <div class="col-xs-12 col-sm-4 col-lg-4 form-group">
		<?= Html::label(Yii::t('report', 'Category'), ''); ?>
		<?php echo Html::dropDownList('category',null,ArrayHelper::map(\app\modules\employee\models\EmpCategory::find()->where(['is_status' => 0])->all(),'emp_category_id','emp_category_name'),['prompt'=>Yii::t('stu', '--- Select Category ---'),'class'=>'form-control']); ?>
	    </div>			
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-lg-4 form-group">
			<?= Html::label(Yii::t('report','Gender'),''); ?>
			<?php echo Html::dropDownList('gender',null,EmpInfo::getGenderOptions(),['prompt'=>Yii::t('stu', '--- Select Gender ---'),'class'=>'form-control']);?>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4 form-group">	
			<?= Html::label(Yii::t('report', 'City'),'');  ?>
			<?php echo Html::dropDownList('city',null,ArrayHelper::map(\app\models\City::find()->where(['is_status' => 0])->all(),'city_id','city_name'),['prompt'=>Yii::t('stu', '--- Select City ---'),'class'=>'form-control']); ?>
		</div>
	</div>
	<hr>
	<div class="row">
		<?php	echo $this->render('emp_select_form', ['query'=>$query]); ?>
	</div>
    </div> <!--/ box-body -->
    <div class="box-footer">
	<?= Html::submitButton(Yii::t('report', 'Generate') , ['class' => 'btn generate btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div> <!--/ box -->
