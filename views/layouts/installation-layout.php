<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

\app\assets_b\AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
?>

<?php $this->registerCssFile(Yii::$app->request->baseUrl.'/css/edusec-installation.css', [
    'depends' => ['yii\web\YiiAsset', 'yii\bootstrap\BootstrapAsset', 'yii\bootstrap\BootstrapPluginAsset']], 'edusec-installation-css'); ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
</head>
<body class="installation-page">
<?php $this->beginBody() ?>

<div class="installation-box">
	<?= $content ?>
</div><!-- /.installation-box -->

<div class="installation-footer"> 
	<strong>Copyright &copy; <?= date('Y') ?> <a href="http://www.rudrasoftech.com">Rudra Softech</a>.</strong> All rights reserved.
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

