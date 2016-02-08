<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />

	
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/newstyle.css" media="print,screen" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/component.css" media="print,screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" media="print,screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/portlets.css" media="print,screen" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/classie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/gnmenu.js"></script>



<script type="text/javascript">

$(document).ready(function() {

$('.main-link').click(function () {
	$('.module-links').toggleClass('comeOut');
	$('.main-link').toggleClass('comeOutMenu');
	$('.module-links').removeAttr( "style" );
	$('.main-link').removeAttr('style');
});
var heightVal = $( document ).height() -  188;
$('#content').css('min-height', heightVal);

  /*
  $(this).contents().find(".main-link").on('click', function(event) { 
	$('iframe').contents().find('.module-links').toggleClass('comeOut');
	$('iframe').contents().find('.main-link').toggleClass('comeOutMenu');
	$('iframe').contents().find('.module-links').removeAttr( "style" );
	$('iframe').contents().find('.main-link').removeAttr('style');
  });

  $(this).contents().find("#content").on('click', function(event) { 
     if(!$('iframe').contents().find('#content').hasClass('modulePage')) {
	$('iframe').contents().find('.module-links').css('left', '-200px');
	$('iframe').contents().find('.main-link').css('left', '0');
	$('iframe').contents().find('.module-links').removeClass('comeOut');
	$('iframe').contents().find('.main-link').removeClass('comeOutMenu');
    }
  });
 
   if($(this).contents().find('#content div').hasClass('module-details')) {
     $('iframe').contents().find('.module-links').toggleClass('comeOut');
     $('iframe').contents().find('.main-link').toggleClass('comeOutMenu');
     $('iframe').contents().find('#content').addClass('modulePage');
   }*/
   
});
var timer = 0;
function set_interval() {
  timer = setInterval("auto_logout()", 300000);
}

function reset_interval() {
  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    timer = setInterval("auto_logout()", 300000);
  }
}

function auto_logout() {
  window.location = "<?php echo Yii::app()->baseUrl.'/site/logout'; ?>";
}
</script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<!--<body class="page-header-fixed" onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()"> -->
<body class="page-header-fixed">

<div class="header navbar navbar-inverse navbar-fixed-top">
	<div id="logo" class="navbar-inner">
	<div id="site-logo">
		<?php
		$org = Organization::model()->findAll();
		echo CHtml::link(CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org[0]['organization_id'])),'No Image',array('width'=>80,'height'=>70)),array('/dashboard/dashboard'));
		?>
	</div>
	<div id="site-name">
	<?php
		echo $org[0]['organization_name'];
	?>
	</div>
	<div class="edu-logo"><?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/edusec.png', 'EduSec'), 'http://www.rudrasoftech.com', array('target'=>'_blank')); ?></div>
		<li class="dropdown user">

		<?php $user = User::model()->findByPk(Yii::app()->user->id)->user_type; 
			if($user == 'admin') 
			   $username = 'admin';
			else if($user == 'student') {
			   $username = StudentInfo::model()->findByPk(StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id))->student_transaction_student_id)->student_first_name;
			}
			else  {
			  $username = EmployeeInfo::model()->findByPk(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id))->employee_transaction_employee_id)->employee_first_name;
			}			

		?>
		<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
		<?php 

		$checkUser = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id)); 

		if($checkUser) {
		    $avtar = StudentPhotos::model()->findByPk($checkUser->student_transaction_student_photos_id)->student_photos_path;
		    echo CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$avtar, 'Student', array('height'=>29,'width'=>'29'));
		}
		else {
		  $checkUser = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id)); 
		  if($checkUser) {
		    $avtar = EmployeePhotos::model()->findByPk($checkUser->employee_transaction_emp_photos_id)->employee_photos_path;
		    echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$avtar, 'Employee', array('height'=>29,'width'=>'29'));
		  }
		  else{
		    	echo '<img src="'.Yii::app()->baseUrl.'/images/no_image.jpg" alt="" height=29 width=29>';
		  }
		}

		?>
		
		<span class="username"><?php echo $username; ?></span>
		<i class="icon-angle-down"></i>
		</a>
		<ul class="dropdown-menu" style="display:none;">
			<li class="sub-menu"><a href="<?php echo Yii::app()->baseUrl;?>/dashboard/myProfile" class="changeForm"><i class="icon-user"></i> My Profile</a></li>
			<li class="sub-menu"><a href="<?php echo Yii::app()->baseUrl;?>/user/change" class="changeForm"><i class="icon-user"></i>Change Password</a></li>
			<li class="sub-menu"><a href="<?php echo Yii::app()->baseUrl;?>/mailbox" class="changeForm"><i class="icon-envelope"></i> My Inbox</a></li>
			<li><i class="icon-key"></i><?php echo CHtml::link('Log Out', Yii::app()->baseUrl.'/site/logout')?></li>
		</ul>
	</li>
	<span style="float: right; margin-top: 13px; background: none repeat scroll 0 0 #FF6600;  padding: 5px; text-decoration: blink; border-radius: 2px;"><?php echo CHtml::link('Support', 'http://www.rudrasoftech.com/forum', array('style'=>'text-decoration: none; color: #FFF; font-size: 17px;  font-weight: 700;', 'target'=>'_blank')); ?></span>
      
</div>
</div>
<div style="float: left; width: 100%; margin-top: 82px;">
<?php echo '<ul id ="nav" class="menu"><li style="list-style: none outside none; cursor: pointer;">'.CHtml::link("Menu", "" ,array('onClick'=>'$("#master").dialog("open");return false;')).'</li></ul>';
?>
<div class="menu-bar">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		    'homeLink'=>CHtml::link('Home', array('/dashboard/dashboard'), array('class'=>'home')),
		     
		    'links'=>array_merge(array(ucfirst(Yii::app()->user->getState('loadPortlets')) => array('/dashboard/index.indexPage/page/'.Yii::app()->user->getState('loadPortlets'))), $this->breadcrumbs),
		    'separator'=>'',
		)); ?>
	<?php endif?>

<?php $this->renderPartial('application.views.layouts.renderMenu');  ?>

</div>

</div>


<?php echo $content; ?>
</div><!-- content -->

<div class="footer">
	©  <?php echo date('Y')?> design by Rudra Softech, All right Reserved.
</div>

</body>
</html>
