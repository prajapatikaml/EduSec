<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = 'Update Academic Details : ' . ' ' . $model->stuMasterStuInfo->getName();
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stuMasterStuInfo->getName(), 'url' => ['view', 'id' => $model->stu_master_id]];
$this->params['breadcrumbs'][] = 'Update Academic Details';
?>
<style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i> <?= Html::encode($this->title) ?> </h3>
  </div>
  <div class="col-xs-4"></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4 left-padding">
	<?= Html::a('Back', '', ['class' => 'btn btn-block btn-back', 'onclick'=>'js:history.go(-1);return false;']) ?>
	</div>
  </div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="box-info box view-item col-xs-12 col-lg-12">
   <div class="stu-master-update">
    <?php $form = ActiveForm::begin([
			'id' => 'stu-master-update',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			],
    ]); ?>

    <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
      <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-info-circle"></i> Academic Details</h4>
      </div>

    <div class="box-body">    

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
	<?= $form->field($model, 'stu_master_course_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Courses::find()->where(['is_status' => 0])->all(),'course_id','course_name'),
	[
	    'prompt'=>'---Select Course---',
	    'onchange'=>'
		$.get( "'.Url::toRoute('dependent/studbatch').'", { id: $(this).val() } )
		    .done(function( data ) {
		        $( "#'.Html::getInputId($model, 'stu_master_batch_id').'" ).html( data );
		    }
		);
	    '    
	]); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-6">
	 <?= $form->field($model, 'stu_master_batch_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Batches::find()->where(['batch_course_id' => $model->stu_master_course_id, 'is_status' => 0])->all(), 'batch_id', 'batch_name'),
		[
                    'prompt'=>'---Select Batch---',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('dependent/studsection').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'stu_master_section_id').'" ).html( data );
                            }
                        );'    
                ]); ?>
    </div>
 </div>

   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
    <div class="col-xs-12 col-sm-6 col-lg-6">
	<?= $form->field($model, 'stu_master_section_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Section::find()->where(['section_batch_id' => $model->stu_master_batch_id, 'is_status' => 0])->all(), 'section_id', 'section_name'), [''=>'---Select Section---']); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-lg-6">
	<?= $form->field($info, 'stu_admission_date')->widget(yii\jui\DatePicker::className(),
	[
		'clientOptions' =>[
			'changeMonth'=> true,
			'yearRange'=>'1900:'.(date('Y')+1),
			'changeYear'=> true,
			'readOnly'=>true,
		'autoSize'=>true,],
		'options'=>[
			'class'=>'form-control',
		],
	]) 
	?>
    </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
	<div class="col-xs-12 col-sm-6 col-lg-6">
	<?= $form->field($model, 'is_status')->dropDownList(['' => '---Select Status---', '0' => 'Active','1' => 'InActive']) ?>
        </div>
	<div class="col-xs-12 col-sm-6 col-lg-6">
		<?php $stuStatusData = ['0'=>'General/Default']+ArrayHelper::map(app\modules\student\models\StuStatus::find()->andWhere(['is_status' => 0])->all(),'stu_status_id','stu_status_name');   ?>
		<?= $form->field($model, 'stu_master_stu_status_id')->dropDownList($stuStatusData); ?>
	</div>
  </div>
	

    </div> <!--/ box-body -->
    </div> <!--/ box -->

    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	    <?= Html::a('Cancel', ['view', 'id' => $model->stu_master_id], ['class' => 'btn btn-default btn-block']); ?>
	</div>
    </div>   
 <?php ActiveForm::end(); ?>
   </div>
  </div>
</div>
