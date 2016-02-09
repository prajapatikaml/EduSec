<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<?php 
if(\Yii::$app->user->isGuest) {
	$this->registerCss(".header {display:none;} .left-side { display:none;} .edusec-main-footer {display:none;} #yii-debug-toolbar{display:none !important} .error-page{width:100%}"); 
}
?>
<!-- Main content -->
<section class="content">
  <div class="error-page">
    <div class="error-content" style="margin-left:0px;">
	 <h2 class="headline text-red" style="width:100%;text-align:center;float:left;font-size:100px;font-weight: 300;">
		<?php if(!empty($exception->statusCode)) : ?>
			<b><?= $exception->statusCode ?>!</b> &nbsp;
		<?php else : ?>
			<i class="fa fa-bug" style="font-size:120px"></i> &nbsp;
		<?php endif; ?>
        </h2>
	<h3 class="text-red" style="text-align:left"><i class="fa fa-warning text-red"></i> <?= Html::encode($name) ?></h3>
	<hr>
		<p class="text-danger"><?= nl2br(Html::encode($message)) ?></p>
		<p class="text-info">The above error occurred while the Web server was processing your request.</p>
		<p class="text-info">Please contact us if you think this is a server error. Thank you.</p>
	<hr>
	<h4>
		<?= Html::a('<i class="fa fa-arrow-circle-left"></i> Go Back','javascript:history.back()', ['class'=>'btn btn-default','onclick' => "javascript:history.back()"]) ?>
		<div class="pull-right"><?= Html::a('<i class="fa fa-home"></i> Return Home', Yii::$app->homeUrl, ['class'=>'btn btn-default']) ?></div>
	</h4>
    </div><!-- /.error-content -->
  </div><!-- /.error-page -->
</section><!-- /.content -->
