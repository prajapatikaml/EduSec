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

<meta name="Keywords" content="edusec,edusec4,rudra softech,open source development in ahmedabad, college management software,college management system,education management software,school management system,school management software">
<meta name="Description" content="Software development company for open source technology in Ahmedabad. Provide Enterprise solution and quality services.">
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Rudra Softech - Provide Enterprise Solution | Development on open source technology | College Management Software | School Management Software" />
<meta property="og:description" content="Core functions like admissions, library management, transport management, students attendance in short entire range of university functions can be well performed by EduSec" />
<meta property="og:image" content="http://www.rudrasoftech.com/rudra.png">

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

