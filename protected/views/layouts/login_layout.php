<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="header-area">
</div>
<div class="container">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<div class="footer-area">
<div class="powered-by"><span class="powered-text">© Copyright 2013 Rudra Softech. All Rights Reserved.
</span></div>
</div>


</body>
</html>
