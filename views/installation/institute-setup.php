<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Institute Setup';
?>

<?php $form = ActiveForm::begin([
	'id' => 'organization-form',
	'options' => ['enctype' => 'multipart/form-data'],
]); ?>

<div class="installation-box-body installation-header">
	<h1>Institute Setup</h1>
</div>
<div class="installation-box-body" style="float:left">

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
		    <?= $form->field($model, 'org_logo',['inputOptions'=>['placeholder'=>'Organization Logo'] ])->fileInput()->label() ?>
		    </div>
		    <div class="col-sm-2 col-xs-12 no-padding">	
		    <?php if(!empty($model->org_logo)) {
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
		<?= Html::submitButton('Next <i class="fa fa-angle-double-right"></i>', ['class' =>'btn btn-block btn-primary']) ?>
		</div>
	     </div>

	    <?php ActiveForm::end(); ?>
	    </div>
	  </div>
	</div>
</div><!-- /.installation-box-body -->
