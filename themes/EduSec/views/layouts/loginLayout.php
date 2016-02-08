<!doctype html>
<head>
	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<title>Login :: EduSec</title>
	<!-- CSS -->
	
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css">
	
    	<script>    	
		// 2 - START LOGIN PAGE SHOW HIDE BETWEEN LOGIN AND FORGOT PASSWORD BOXES--------------------------------------
		
		$(document).ready(function () {
			$(".forgot-pwd").click(function () {
			$("#loginbox").hide();
			$("#forgotbox").show();
			return false;
			});
		
		});
		
		$(document).ready(function () {
			$(".back-login").click(function () {
			$("#loginbox").show();
			$("#forgotbox").hide();
			return false;
			});
		});
		
		// END ----------------------------- 2
    </script>
</head>
	<!-- Main HTML -->	
<body>
	
	<!-- Begin Page Content -->
	<div class="logo">&nbsp;</div>
    <div id="loginbox">
	<?php if(Yii::app()->controller->action->id == 'login') { ?>
        <div class="login">Login</div>
	<?php } else { ?>
        <div class="login">Forgot Password</div>
	<?php } ?>
        <div id="container">
            <div class="logobox"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/product.png" width="165" height="30" alt="RudraSoftech" title="RudraSoftech" style="margin-top: 15px;" /></div>
	<?php print $content; ?>
        </div>
    </div>
	
<!-- Footer -->
        <div id="footer">
        	<div class="footer-date-display"><?php echo date('H:i A'); ?></div>
            	   <div class="footer-day-display"><?php echo date('l, F dS'); ?></div>
            
        	<div class="footer-bottom">   
		   <div class="powered-by"><span class="powered-text" style="margin-right: 15px;">&copy; Copyright <?php echo date('Y'); ?> Rudra Softech. All Rights Reserved.
		</span></div>
		</div>         	
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	
</body>
</html>
