<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EduSec College Management System - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font.css" rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.multilevelpushmenu_grey.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/collapsed.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/profile.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.min.js"></script>	
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script>
	$(function() {
	      
	    $('#menu ul li a').click(
		function (e) {
		    $('html, body').animate({scrollTop: '0px'}, 300);
		}
	    );
	 });
	</script>
	<script>
	/*$(function() {
	    var pageHeight = $(window).height();
		 $("#content").css("min-height", pageHeight + "px");
	 }); */
	</script>
    </head>
	<style>
		#back-to-top {
			position: fixed;
			bottom: 2em;
			right: 0px;
			text-decoration: none;
			color: #000000;
			background-color: rgba(235, 235, 235, 0.80);
			font-size: 12px;
			padding: 1em;
			display: none;
		}

		#back-to-top:hover {	
			background-color: rgba(135, 135, 135, 0.50);
		}	
	</style>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="pushobj" class="column">
		<?php echo $this->renderPartial('//layouts/header'); ?>	 
            <!--==============Page Content Start [End]=====================-->
	 <div class="inner-page-header">
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->

            <div class="personalinfo-tab-right">
            	<!--==============Date Section Start [Start]=====================-->
                <div class="date-displaybox">
                    <div class="date-display">
                        <span class="day-name"><?php echo date('l'); ?></span>
                        <span class="date-no"><?php echo date('d'); ?><span>
                        <span class="month-no"><?php echo date('M'); ?><span>
                    </div>
                    <div class="time-display">
                        <div class="time-no"><?php echo date('h:i'); ?></div>
                        <div class="time-pm"><?php echo date('A'); ?></div>
                    </div>
                </div>                    
                <!--==============Date Section Start [End]=====================-->
            </div>
	 </div> 
            <div class="clear-div"></div>
	 <div id="content" style='min-height: 600px;'>
	     <?php print $content; ?>
	 </div>

<div class="footer-area">
<div class="powered-by"><span class="powered-text" style="margin-right: 15px;">&copy; Copyright <?php echo date('Y'); ?> Rudra Softech. All Rights Reserved.
</span></div>
</div>
    </div>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
        <script>
			$(document).ready(function() {
				$('.nav-tabs > li > a').click(function(event){
					event.preventDefault();//stop browser to take action for clicked anchor
					
					//get displaying tab content jQuery selector
					var active_tab_selector = $('.nav-tabs > li.activetab > a').attr('href');					
					
					//find actived navigation and remove 'active' css
					var actived_nav = $('.nav-tabs > li.activetab');
					actived_nav.removeClass('activetab');
					
					//add 'active' css into clicked navigation
					$(this).parents('li').addClass('activetab');
					
					//hide displaying tab content
					$(active_tab_selector).removeClass('activetab');
					$(active_tab_selector).addClass('hide');
					
					//show target tab content
					var target_tab_selector = $(this).attr('href');
					$(target_tab_selector).removeClass('hide');
				});
			});
		</script>
<?php echo $this->renderPartial('//layouts/menuItems'); ?>
         <script>
		function equalHeight(group) {
		   tallest = 0;
		   
		   group.each(function() {
			  thisHeight = $(this).height();
			  if(thisHeight > tallest) {
				 tallest = thisHeight;
			  }
		   });
		   group.height(tallest);
		}
		$(document).ready(function() {
		   equalHeight($(".column"));
		});
		</script>
    </body>
</html>
