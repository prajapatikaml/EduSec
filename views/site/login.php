<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'EduSec | Login';
?>
<div class="login-box">
      <div class="login-logo">
		&nbsp;
      </div><!-- /.login-logo -->
      <div class="login-box-body login-header">
		<h1><?= Html::img(Yii::$app->request->baseUrl.'/images/product.png', ['width'=>'150px;']) ?></h1>
      </div>
      <div class="login-box-body">
  	
        <p class="login-box-msg">Please fill out the following fields to login</p>
	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group has-feedback">
	     <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username', 'class'=>'form-control'])->label(false) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
	    <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'placeholder'=>'Password'])->label(false) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
		<?= $form->field($model, 'rememberMe')->checkbox() ?>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
	      <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
       <?php ActiveForm::end(); ?>

        <!--a href="#">I forgot my password</a--><br>
      </div><!-- /.login-box-body -->
      <?php if(\Yii::$app->session->hasFlash('loginError')) : ?>
	    <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
		<?php echo \Yii::$app->session->getFlash('loginError'); ?>
	    </div>
       <?php endif; ?>
    </div><!-- /.login-box -->

 







