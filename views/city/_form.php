<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\State;
use app\models\Country;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-xs-12 col-lg-12">
  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box view-item col-xs-12 col-lg-12">
<div class="city-form">
	<?php
	if($this->context->action->id == 'update')
		$action = ['update', 'id'=>$_REQUEST['id']];
	else
		$action = ['create'];
    ?>
	
    <?php $form = ActiveForm::begin([
			'id' => 'city-form',
			'action' => $action,
			'enableAjaxValidation' => true,
			    ]); ?>
<div class="col-xs-12 col-lg-12 no-padding">
	<div class="col-sm-4">
	    <?php echo $form->field($model,'city_country_id',['inputOptions'=>[ 'class'=>'form-control'] ])->dropDownList(ArrayHelper::map(\app\models\Country::find()->all(),'country_id','country_name'),
			[
		            'prompt'=> Yii::t('app', '--- Select Country ---'),
		            'onchange'=>'
		                $.get( "'.Url::toRoute('dependent/getstate').'", { id: $(this).val() } )
		                    .done(function( data ) {
		                        $( "#'.Html::getInputId($model, 'city_state_id').'" ).html( data );
		                    }
		                );'    
		        ]		
				)->label(false); 
				?>
	</div>
	<div class="col-sm-4">
	    <?php if(isset($model->city_state_id)) { ?>

		<?= $form->field($model, 'city_state_id',['inputOptions'=>[ 'class'=>'form-control'] ])->dropDownList(ArrayHelper::map(\app\models\State::find()->all(),'state_id','state_name'),['prompt'=>Yii::t('app', '--- Select State ---')])->label(false);  ?>
	    <?php } else {   ?>
		<?= $form->field($model, 'city_state_id',['inputOptions'=>[ 'class'=>'form-control'] ])->dropDownList(['prompt'=>Yii::t('app', '--- Select State ---')])->label(false);  ?>
	    <?php } ?>
	</div>
	<div class="col-sm-4">
	    <?= $form->field($model, 'city_name',['inputOptions'=>[ 'class'=>'form-control', 'placeholder'=>Yii::t('app', 'City/Town Name')] ])->textInput(['maxlength' => 35])->label(false); ?>
	</div>
</div>
    <div class="form-group col-xs-12 col-sm-6 col-lg-4 no-padding edusecArLangCss">
	<div class="col-xs-6">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord  ? 'btn btn-block btn-success' : 'btn btn-block btn-info']) ?>
	</div>
	<div class="col-xs-6">
	<?= Html::resetButton(Yii::t('app', 'Reset'),['class' => 'btn btn-default btn-block']) ?>
	</div>
     </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
