<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\employee\models\EmpDocs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-docs-form">

    <?php $form = ActiveForm::begin([
			'id' => 'emp-docs-form',
			//'enableAjaxValidation' => true,
			'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\"><span class='status'>&nbsp;</span>{error}</div>",
			    'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
    ]); ?>

    <?= $form->field($model, 'emp_docs_details')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'emp_docs_category_id')->dropDownList(ArrayHelper::map(\app\models\DocumentCategory::find()->all(),'doc_category_id','doc_category_name'), ['prompt'=>'---Select Category---']);  ?>

    <?= $form->field($model, 'emp_docs_path')->fileInput(['maxlength' => 150]) ?>
	<div class="hint col-sm-offset-1 col-lg-10" style="margin-bottom:2%; color:red"><b>Hint:- </b>&nbsp;Upload Only Jpeg, Jpg, Pdf, Txt, Doc, Png Type Document</div>

   
    <div class="form-group col-sm-offset-1 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
