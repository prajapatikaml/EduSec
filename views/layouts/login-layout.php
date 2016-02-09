<?php 
use \app\assets_b\AppAsset;
use yii\helpers\Html;
$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);

\app\assets_b\AppAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/icheck.min.js',['depends' => ['yii\web\YiiAsset', 'yii\bootstrap\BootstrapAsset', 'yii\bootstrap\BootstrapPluginAsset'], 'position' => \yii\web\View::POS_HEAD]); ?>

<?php $this->registerCssFile(Yii::$app->request->baseUrl.'/css/edusec-login.css', [
    'depends' => ['yii\web\YiiAsset', 'yii\bootstrap\BootstrapAsset', 'yii\bootstrap\BootstrapPluginAsset']], 'edusec-login-css'); ?>
<style>
.icheckbox_square-blue,
.iradio_square-blue {
    display: inline-block;
    *display: inline;
    vertical-align: middle;
    margin: 0;
    padding: 0;
    width: 22px;
    height: 22px;
    background: url(<?php echo Yii::$app->request->baseUrl.'/images/blue.png'; ?>) no-repeat;
    border: none;
    cursor: pointer;
}
.icheckbox_square-blue {
    background-position: 0 0;
}
    .icheckbox_square-blue.hover {
        background-position: -24px 0;
    }
    .icheckbox_square-blue.checked {
        background-position: -48px 0;
    }
    .icheckbox_square-blue.disabled {
        background-position: -72px 0;
        cursor: default;
    }
    .icheckbox_square-blue.checked.disabled {
        background-position: -96px 0;
    }

.iradio_square-blue {
    background-position: -120px 0;
}
    .iradio_square-blue.hover {
        background-position: -144px 0;
    }
    .iradio_square-blue.checked {
        background-position: -168px 0;
    }
    .iradio_square-blue.disabled {
        background-position: -192px 0;
        cursor: default;
    }
    .iradio_square-blue.checked.disabled {
        background-position: -216px 0;
    }

/* Retina support */
@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
       only screen and (-moz-min-device-pixel-ratio: 1.5),
       only screen and (-o-min-device-pixel-ratio: 3/2),
       only screen and (min-device-pixel-ratio: 1.5) {
    .icheckbox_square-blue,
    .iradio_square-blue {
        background-image: url(<?php echo Yii::$app->request->baseUrl.'/images/blue@2x.png'; ?>);
        -webkit-background-size: 240px 24px;
        background-size: 240px 24px;
    }
}
</style>
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
<body class="login-page">
<?php $this->beginBody() ?>

    <?= $content ?>

<div class="login-footer"> <strong>Copyright &copy; <?= date('Y') ?> <a href="http://www.rudrasoftech.com">Rudra Softech</a>.</strong> All rights reserved.</div>
<?php $this->endBody() ?>
</body>
</html>
<script>
	$(function () {
	$('input').iCheck({
	  checkboxClass: 'icheckbox_square-blue',
	  radioClass: 'iradio_square-blue',
	  increaseArea: '20%' // optional
	});
	});
</script>
<?php $this->endPage() ?>
