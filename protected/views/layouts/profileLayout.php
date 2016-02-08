<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="print,screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/portlets.css" media="print,screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/newstyle.css" media="print,screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/component.css" media="print,screen" />

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/classie.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/gnmenu.js"></script>

</head>
<body style="background: #FFF;">
<div class="ifameMenu" style="float: left; width: 100%;">
<?php echo '<ul id ="nav" class="menu"><li style="list-style: none outside none; cursor: pointer;">'.CHtml::link("Menu", "" ,array('onClick'=>'$("#master").dialog("open");return false;')).'</li></ul>';
?>
<div class="menu-bar">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		    'homeLink'=>CHtml::link('Home', array('/dashboard/dashboard'), array('class'=>'home')),
		     'links'=> $this->breadcrumbs,
		    'separator'=>'',
		)); ?>
	<?php endif?>

<?php $this->renderPartial('application.views.layouts.renderMenu');  ?>
</div>
</div>

<div class="container">
	<div class="span-19">
	 <?php  $this->layout = '//layouts/profileLayout';
	   $checkUser = Yii::app()->user->getState('emp_id');
	   if(isset($checkUser)) 
                $this->renderPartial('application.views.dashboard.empProfileLinks');
	   else
                $this->renderPartial('application.views.dashboard.stdProfileLinks');
	   ?>
		  
		<div id="content" style="margin: 20px 0px 0px 20px; width: 78%;">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>

</body>
</html>
