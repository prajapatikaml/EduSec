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
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.min.js"></script>
	<script>
	$(function() {
	      
	    $('#menu ul li a').click(
		function (e) {
		    $('html, body').animate({scrollTop: '0px'}, 300);
		}
	    );
	 });
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
            <!--==============Page Content Start [here]=====================-->
            <div class="header">
            	<div class="header-left">
		<?php echo CHtml::link(CHtml::image(Yii::app()->controller->createUrl('/site/loadImage'),'No Image',array('width'=>80,'height'=>70)),array('/dashboard/dashboard'));
		?>
		</div>
                <div class="header-right">
                	<div class="nav">
                      <ul class="nav-list">
                        <li><a href="#" class="nav-link orange"><i class="fa fa-bell"></i> <span class="nav-counter nav-counter-green">4</span></a></li>
                       <?php 
		    $empsession = 0;
		    $studsession = 0;
		    $count = 0;
		    if(!Yii::app()->user->isGuest){
		      $studsession = Yii::app()->user->getState('stud_id');
		      $empsession = Yii::app()->user->getState('emp_id');
		    }
		    if(!Yii::app()->user->isGuest && !Yii::app()->user->getState('parent_id'))
		    {
			$count = 0;
			$count = Mailbox::model()->newMsgs(Yii::app()->user->id);	
		     ?>
			<li><a href="<?php echo Yii::app()->baseUrl;?>/mailbox" class="nav-link green"><i class="fa fa-envelope"></i> <span class="nav-counter nav-counter-blue"><?php echo $count;?></span></a></li>
		   <?php
		    }?>
                        <li><a href="#" class="nav-link orange"><i class="fa fa-tasks"></i> <span class="nav-counter">15</span></a></li>
			<?php		
			$isStudent = Yii::app()->user->getState('stud_id');
			$isEmployee = Yii::app()->user->getState('emp_id');
			if(isset($isStudent))
			{
			  $stdinfo = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>Yii::app()->user->getState('stud_id')));	
			  $stu_tran = StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
			  $stdpicPath = StudentPhotos::model()->findByPk($stu_tran->student_transaction_student_photos_id);
			  $stud_photo=Yii::app()->baseUrl."/college_data/stud_images/".$stdpicPath->student_photos_path;
			?>
                        <li><a href="#" class="nav-link user-image-nav"><img src="<?php echo $stud_photo; ?>" width="51" height="51" class="userimage"></a></li>
                        <li class="user-image-line" id="dropdown"><a href="#" class="nav-link">
				<?php	
				  echo $stdinfo->student_first_name;
	   			 ?>	
			 <i class="fa fa-caret-down"></i></a>
				<ul>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/student/studentTransaction/update?id=<?php echo Yii::app()->user->getState('stud_id');?>">My Profile</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/user/change"">Change Password</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/mailbox">My Inbox</a></li>
				<li><?php echo CHtml::link('Log Out', Yii::app()->baseUrl.'/site/logout')?></li>
			      </ul>
			</li>
			<?php  
			}
			else if(isset($isEmployee))
			{
			  $empinfo = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>Yii::app()->user->getState('emp_id')));
			  $emp_tran = EmployeeTransaction::model()->findByPk(Yii::app()->user->getState('emp_id'));
			  $emppicPath = EmployeePhotos::model()->findByPk($emp_tran->employee_transaction_emp_photos_id);
			  $emp_photo=Yii::app()->baseUrl."/college_data/emp_images/".$emppicPath->employee_photos_path;
			?>
			<li><a href="#" class="nav-link user-image-nav"><img src="<?php echo $emp_photo; ?>" width="51" height="51" class="userimage"></a></li>
                        <li class="user-image-line" id="dropdown"><a href="#" class="nav-link" style="font-size: 1em;">
				<?php	 
				  echo $empinfo->employee_first_name;
	   			 ?>	
			 <i class="fa fa-caret-down"></i></a>
			
		
				<ul>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/employee/employeeTransaction/update?id=<?php echo Yii::app()->user->getState('emp_id');?>">My Profile</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/user/change"">Change Password</a></li>
				<li><a href="<?php echo Yii::app()->baseUrl;?>/mailbox">My Inbox</a></li>
				<li><?php echo CHtml::link('Log Out', Yii::app()->baseUrl.'/site/logout')?></li>
			      </ul>
			</li>
		
		<?php
			}
			else {
		?>
                        <li class="user-image-line" id="dropdown"><a href="#" class="nav-link" style="font-size: 1em;">
				<?php	
				  echo "Admin";
	   			 ?>	
			 <i class="fa fa-caret-down"></i></a>
				<ul>

				<li><a href="<?php echo Yii::app()->baseUrl;?>/user/change"">Change Password</a></li>
				<li><?php echo CHtml::link('Log Out', Yii::app()->baseUrl.'/site/logout')?></li>
			      </ul>
			</li>
		  <?php } ?>
			<script type="text/javascript">
			$("#dropdown").on("hover", function(e){
			  
			  if($(this).hasClass("open")) {
			    $(this).removeClass("open");
			    $(this).children("ul").slideUp("fast");
			  } else {
			    $(this).addClass("open");
			    $(this).children("ul").slideDown("fast");
			  }
			});
			</script>
                       <!-- <li><a href="#" class="nav-link"><i class="fa fa-comments"></i></a></li> -->
                      </ul>
                    </div>                	
                </div>
            </div>
            <!--==============Page Content Start [End]=====================-->

            <h1 class="pagetitle">Dashboard</h1>
            <!--Personal info tab date start-->
            <div class="personalinfo-tab">
            	<div class="personal-icon"><i class="fa fa-clock-o icon-color icon-size"></i></div>
                <div class="personal-icon">Personal Information</div>
            </div>
            <div class="personalinfo-tab-right">
            	<!--==============Date Section Start [Start]=====================-->
                <div class="date-displaybox">
                    <div class="date-display">
                        <div class="day-name"><?php echo date('l'); ?></div>

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
            <div class="clear-div"></div>

	    <?php
		if(isset($isStudent))
		  echo $this->renderPartial('stdInfo');
		if(isset($isEmployee))
		  echo $this->renderPartial('empInfo');
	    ?>
                <div class="clear-div"></div>
                <!--===============================Dashboard Boxes start============================-->
                <!--===============================Box row one start============================-->
                <div class="row-fluid">
                	<!--===============================Message of the day start============================-->
                	<div class="span3">
                        <div class="dashbox green">
                        	<div class="box-header green">
                        		<span class="title"><i class="fa fa-send"></i> Message of the day</span>
                        	</div>
                        	<div class="box-content">
                            	<div class="box-content-inner">
                                <!--	<div class="box-title">Leadership for Teen Girls</div>  -->
                                    <div class="box-title-content">
					<?php
					$msgOfDay = MessageOfDay::model()->findAll(array('condition'=>'message_of_day_active = 1',
					    "order" => "ID DESC",
					    "limit" => 3,
					));
					?>    
					<?php 
					  if(!empty($msgOfDay))
					    echo $msgOfDay[0]['message']; 
					  else
					    echo '<span style="color: red; text-decoration: blink;">No message of the day available !!</span>';
					?>                                 
                                    </div> 
                                </div>                                
                            </div>                   
                        </div>
                    </div>
                    <!--===============================Message of the day end============================-->
                    <!--===============================Attendance start============================-->
                	<div class="span3">
                        <div class="dashbox orange">
                        	<div class="box-header orange">
                        		<span class="title"><i class="fa fa-bar-chart-o"></i> Attendance chart</span>
                        	</div>
                        	<div class="box-content">
                            	<div class="box-content-inner">
                                	<div class="chart">
                                        <div class="column-container">
                                            <div class="column-chart">
                                                <div class="fill" style="background-color:#0DA1FF"></div>
                                                <p class="rotulo">Present</p>
                                            </div>
                                            <div class="column-chart">
                                                <div class="fill" style="background-color:#FFC000"></div>
                                                <p class="rotulo">Holiday</p>
                                            </div>
                                            <div class="column-chart">
                                                <div class="fill" style="background-color:#01CB99"></div>
                                                <p class="rotulo">Week Off</p>
                                            </div>
                                            <div class="column-chart">
                                                <div class="fill" style="background-color:#FF5C5C"></div>
                                                <p class="rotulo">Absend</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                   
                        </div>
                    </div>
                    <!--===============================Attendance end============================-->             
                    <!--===============================Notice board Boxes start============================-->
                    <div class="span3">
                    	<div class="dashbox blue">
                        	<div class="box-header blue">
                        		<span class="title"><i class="fa fa-clipboard"></i> Notice board</span>
                        	</div>
                        	<div class="box-content">
					<?php
					$notice = ImportantNotice::model()->findAll(array("order" => "notice_id DESC","limit" => 4));
					?>    
					<?php 
					  if(!empty($notice)) { 
					    $i = 1;
					    foreach($notice as $list) { ?>
						<div class="box-section">
		                                    <div class="avatar blue" style="background-color:#01CB99"><?php echo $i; ?></div>
						    <div class="news-content">
		                                        <div class="news-text-one">
					  <?php
						echo CHtml::link(substr($list['notice'], 0, 70).'...', Yii::app()->createUrl('importantNotice/view', array('id'=>$list['notice_id'])), array('target'=>'_blank')); ?>
					   		</div>
                                		     </div> 
                                		</div>  
					  <?php	$i++; }
					  }
					  else
					    echo '<span style="color: red; text-decoration: blink;">No Notice available !!</span>';
					
					?>                  
			   </div>
                        </div>
                    </div>
                    <!--===============================Notice board Boxes end============================-->
                </div>
	
                <!--===============================Box row one end============================-->
                <!--===============================Box row two start============================-->
                <div class="row-fluid">
			  <!--===============================Today's birthday start============================-->
		<?php
					$empDOB = Yii::app()->db->createCommand()
					    ->select('employee_first_name, employee_last_name, employee_transaction_emp_photos_id,employee_transaction_designation_id,employee_transaction_department_id')
					    ->from('employee_info ef', 'employee_transaction et')
					    ->join('employee_transaction et', 'ef.employee_id = et.employee_transaction_employee_id')
					    ->where('et.employee_status = 0 AND DATE_FORMAT(ef.employee_dob, "%m-%d") = "'.date('m-d').'"')
					    ->queryAll();
			
			if(!empty($empDOB))
			{
		?>   
                    <div class="span3">
                    	<div class="dashbox blue">
                        	<div class="box-header blue">
                        		<span class="title"><i class="fa fa-gift"></i> Today's birthday list</span>
                        	</div>
                        	<div class="box-content">
				<?php
				  
				  foreach($empDOB as $list) {
					$picPath = EmployeePhotos::model()->findByPk($list['employee_transaction_emp_photos_id']);
					$designation = EmployeeDesignation::model()->findByPk($list['employee_transaction_designation_id']);
					$department = Department::model()->findByPk($list['employee_transaction_department_id']);

				?>
                            	<div class="box-section">
                                    <div class="avatar"><img src="<?php echo Yii::app()->baseUrl; ?>/college_data/emp_images/<?php echo $picPath->employee_photos_path; ?>" width="41" height="40"></div>
                                    <div class="news-content">
                                        <div class="news-title"><?php echo $list['employee_first_name']." ".$list['employee_last_name']."<br><span style='color:#2572EB'>".$designation->employee_designation_name." / ".$department->department_name."</span>";?></div>
                                        <!--<div class="news-text">Today, 10:30 PM</div> -->
                                    </div>
                                </div> 
                                <?php } ?>

                           
                            
                            </div>                   
                        </div>
                    </div>
		<?php } ?> 
                    <!--===============================Today's birthday end============================--> 
                	
                    <!--===============================Today's birthday start============================-->   
                    <!--div class="span3">
                    	<div class="dashbox">
                        	<div class="box-header">
                        		<span class="title"><i class="fa fa-qrcode"></i> Photo gallery</span>
                        	</div>
                        	<div class="box-content">
                            	<div class="box-section">
                                    <div class="avatar-one"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user_photo.jpg" width="60" height="60"></div>
                                    <div class="news-content-one">
                                        <div class="news-title">Mark P. Happy Birthday</div>
                                        <div class="news-text">Today, 10:30 PM</div>
                                    </div>
                                </div> 
                                <div class="box-section">
                                    <div class="avatar-one"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user_photo.jpg" width="60" height="60"></div>
                                    <div class="news-content-one">
                                        <div class="news-title">Mark P. Happy Birthday</div>
                                        <div class="news-text">Today, 10:30 PM</div>
                                    </div>
                                </div> 
                                <div class="box-section-last">
                                    <div class="avatar-one"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user_photo.jpg" width="60" height="60"></div>
                                    <div class="news-content-one">
                                        <div class="news-title">Mark P. Happy Birthday</div>
                                        <div class="news-text">Today, 10:30 PM</div>
                                    </div>
                                </div>
                            </div>                   
                        </div>
                    </div--> 
                    <!--===============================Today's birthday end============================-->                   
		    <!--===============================Branch wise student details start============================-->
                	<div class="span3">
                        <div class="dashbox orange">
                        	<div class="box-header orange">
                        		<span class="title"><i class="fa fa-bar-chart-o"></i> Course wise student details</span>
                        	</div>
                        	<div class="box-content" style="overflow:auto">
                            	<div class="box-content-inner">
					<?php 
					$studCount = Yii::app()->db->createCommand()
					    ->select('count(*) as c, course_id')
					    ->from('student_transaction')
					    ->where('course_id <> 0')
					    ->group('course_id')
					    ->queryAll();
					 foreach($studCount as $list) {
					?>
                                    <div class="brances-inner">
                                    	<div class="brances-inner-left">
                                        	<div>Student</div>
                                        	<div class="student-no"><?php echo $list['c']; ?></div>
                                        </div>
                                        <div class="brances-inner-right">
                                        	<div class="student-department"><?php echo Course::model()->findByPk($list['course_id'])->course_name; ?></div>
                                        </div>
                                        <div class="clear-div"></div>
                                    </div>
                                  <?php } ?>
                                </div>                                
                            </div>                   
                        </div>
                    </div>
                    <!--===============================Branch wise student details end============================-->
                    <!--===============================Notice board Boxes start============================-->
                    <div class="span3">
                    	<div class="dashbox blue">
                        	<div class="box-header blue">
                        		<span class="title"><i class="fa fa-envelope"></i> Mail box</span>
                        	</div>
                        	<div class="box-content">
                            	<div class="box-section">
                                    <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" /><label for="checkboxG4" class="css-label">Aliquam metus neque</label>
                                </div>  
                                <div class="box-section">
                                    <input type="checkbox" name="checkboxG4" id="checkboxG5" class="css-checkbox" /><label for="checkboxG5" class="css-label">Aliquam metus neque</label>
                                </div>
                                <div class="box-section">
                                    <input type="checkbox" name="checkboxG4" id="checkboxG6" class="css-checkbox" /><label for="checkboxG6" class="css-label">Aliquam metus neque</label>
                                </div>
                                <div class="box-section">
                                    <input type="checkbox" name="checkboxG4" id="checkboxG7" class="css-checkbox" /><label for="checkboxG7" class="css-label">Aliquam metus neque</label>
                                </div>
                                <div class="box-section">
                                    <input type="checkbox" name="checkboxG4" id="checkboxG8" class="css-checkbox" /><label for="checkboxG8" class="css-label">Aliquam metus neque</label>
                                </div>                                                         
                            </div>                  
                        </div>
                    </div>
                    <!--===============================Notice board Boxes end============================-->
                </div>
                <!--===============================Box row two end============================-->
                <!--===============================Box row three start============================-->
                <div class="row-fluid">
                	
                    <!--===============================Personal time table start============================-->   
                    <div class="span4">
                    	<div class="dashbox blue">
                        	<div class="box-header blue">
                        		<span class="title"><i class="fa fa-users"></i> Personal time table</span>
                        	</div>
                        	<div class="box-content" style="background: #e4f8f7;">
                            	<div class="box-content-inner">
                                	<div class="timetable-left">
                                    	<div class="timetable-left-section">
                                        	<div class="timetable-left-section-inner">
                                            	<div class="lesson">Lesson 1:08 - 09.00</div>
                                                <div class="subject">Maths</div>
                                                <div class="lesson">Room 31</div>
                                            </div>
                                        </div> 
                                        <div class="timetable-left-section">
                                        	<div class="timetable-left-section-inner">
                                            	<div class="lesson">Lesson 1:08 - 09.00</div>
                                                <div class="subject">Maths</div>
                                                <div class="lesson">Room 31</div>
                                            </div>
                                        </div> 
                                        <div class="timetable-left-section-one">
                                        	<div class="timetable-left-section-one-inner">
                                            	<div class="lesson">Lesson 1:08 - 09.00</div>
                                                <div class="subject">Computer Science</div>
                                                <div class="lesson">Room 31</div>
                                            </div>
                                        </div> 
                                        <div class="clear-div"></div>
                                    </div> 
                            		<div class="timetable-right" style="background: #FFF;">
                                    	<div class="timetable-cs-section">
                                            <div class="timetable-cs-left">                                        	
                                                <div class="cs-display">CS</div>
                                                <div class="cs-subject">Computer Science</div>
                                            </div>                                            
                                            <div class="timetable-cs-right">&nbsp;</div>
                                            <div class="clear-div"></div>
                                       	</div>
                                        <div class="timetable-cs-section-one">                                        	
                                           <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td class="time-content-left">Day</td>
                                                <td class="time-content-right">Monday</td>
                                              </tr>  
                                              <tr>
                                                <td class="time-content-left">Lesson</td>
                                                <td class="time-content-right">3</td>
                                              </tr>
                                              <tr>
                                                <td class="time-content-left">Start</td>
                                                <td class="time-content-right">10.00 AM</td>
                                              </tr>
                                              <tr>
                                                <td class="time-content-left">End</td>
                                                <td class="time-content-right">11.00 Am</td>
                                              </tr>
                                              <tr>
                                                <td class="time-content-left">Place</td>
                                                <td class="time-content-right">Room 2</td>
                                              </tr>    
                                              <tr>
                                                <td class="time-content-left">Type</td>
                                                <td class="time-content-right">Lecture</td>
                                              </tr>     
                                              <tr>
                                                <td class="time-content-left">Teacher</td>
                                                <td class="time-content-right">Mr. Rangrajan</td>
                                              </tr>         
                                            </table>
                                        </div>
                                    </div> 
                            	</div>  
                            </div>                   
                        </div>
                    </div> 
                    <!--===============================Personal time table end============================-->
                </div>
                <!--===============================Box row three end============================-->
                <!--===============================Dashboard Boxes end============================-->
		<div class="footer-area">
		<div class="powered-by"><span class="powered-text" style="margin-right: 15px;">&copy; Copyright <?php echo date('Y'); ?> Rudra Softech. All Rights Reserved.
		</span></div>
		</div>
            </div>           
    	</div>

<?php echo $this->renderPartial('/layouts/menuItems'); ?>
         <script>
		var someValue = 110;
		function equalHeight(group) {
		   tallest = 0;
		   
		   group.each(function() {
			  thisHeight = $(this).height();
			  if(thisHeight > tallest) {
				 tallest = thisHeight;
			  }
		   });
		   group.height(parseInt(tallest) - someValue);
		}
		$(document).ready(function() {
		   equalHeight($(".column"));
		});
		</script>
    </body>
</html>
