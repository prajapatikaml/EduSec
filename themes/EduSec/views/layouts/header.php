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
