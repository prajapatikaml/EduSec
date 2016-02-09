<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="organization-form">

    <?php $form = ActiveForm::begin([
			'id' => 'organization-form',
			'options' => ['enctype' => 'multipart/form-data'],
			//'enableAjaxValidation' => true,
			
    ]); ?>
<h2 class="page-header edusec-page-header-1">
	<i class="fa fa-university"></i> Institute Setup Details
</h2>
<div class="col-sm-12 no-padding">
	<div class ="col-sm-6">
	    <?= $form->field($model, 'org_name',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Organization  Name'] ])->textInput(['maxlength' => 255])->label() ?>
	 </div>
	<div class = "col-sm-6">
	    <?= $form->field($model, 'org_alias',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Organization Alias'] ])->textInput(['maxlength' => 25])->label() ?>
	</div>
</div>

<div class="col-sm-12 no-padding">
	<div class = "col-sm-6">
	    <?= $form->field($model, 'org_address_line1',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Address Line 1'] ])->textArea(['maxlength' => 255])->label() ?>
	</div>
	<div class = "col-sm-6">
	    <?= $form->field($model, 'org_address_line2',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Address Line 2'] ])->textArea(['maxlength' => 255])->label() ?>
	</div>
</div>

<div class="col-sm-12 no-padding">
	<div class = "col-sm-6">
	    <?= $form->field($model, 'org_email',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Email Id'] ])->textInput(['maxlength' => 65])->label() ?>
	</div>
	<div class = "col-sm-6">
	    <?= $form->field($model, 'org_phone',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Phone No'] ])->textInput(['maxlength' => 25])->label() ?>
	</div>
</div>

<div class="col-sm-12 no-padding">
	<div class="col-sm-6">
	    <?= $form->field($model, 'org_website',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Website'] ])->textInput(['maxlength' => 120])->label() ?>
	</div>

	<div class="col-sm-6">
	    <div class="col-sm-10 col-xs-12 no-padding">
	    <?= $form->field($model, 'org_logo',['inputOptions'=>[ 'class'=>'','placeholder'=>'Organization Logo'] ])->fileInput()->label() ?>
	    </div>
	    <div class="col-sm-2 col-xs-12 no-padding">	
	    <?php if(isset($model->org_logo)) {
			echo Html::img(\Yii::$app->urlManager->createUrl('/site/loadimage'),array('width'=>60,'height'=>60,'alt'=>'No Image'));
		  }
	    ?>
	    </div>
	</div>
</div>

<div class="col-sm-12 col-xs-12 no-padding">
	<h2 class="page-header edusec-page-header-1"><i class="fa fa-user"></i> User Login Prefix</h2>
</div>
<div class="col-sm-12 no-padding">
	<div class = "col-sm-6 col-xs-12">
	    <?= $form->field($model, 'org_stu_prefix',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Enter Student Login Prefix'] ])->textInput(['maxlength' => 65])->label() ?>
	</div>
	<div class = "col-sm-6 col-xs-12">
	    <?= $form->field($model, 'org_emp_prefix',['inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Enter Employee Login Prefix'] ])->textInput(['maxlength' => 65])->label() ?>
	</div>
</div>

     <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
