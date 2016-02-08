        <div id="menu" class="column">
            <nav>
                <h2><i class="fa fa-reorder"></i>All Categories</h2>
                <ul>
                   
                        <?php if(Yii::app()->user->checkAccess('Configuration')) { ?>
		 <li>
	<?php echo CHtml::link("<i class='fa fa-cog' title='Configuration'></i> Configuration", array("/dashboard/index.indexPage"), array('class'=>'changeForm '));?>
	
                        <h2><i class="fa fa-cog"></i>Configuration</h2>
                        <ul>

	<?php if(Yii::app()->user->checkAccess('Batch.Admin')) : ?>	
	<li><?php echo CHtml::link("Batch",array('/batch/admin'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Department.Admin')) : ?>	
	<li><?php echo CHtml::link("Department",array('/department/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('EmployeeDesignation.Admin')) : ?>	
	<li><?php echo CHtml::link("Employee Designation",array('/employeeDesignation/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Nationality.Admin')) : ?>	
	<li><?php echo CHtml::link("Nationality",array('/nationality/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Country.Admin')) : ?>	
	<li><?php echo CHtml::link("Country",array('/country/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('State.Admin')) : ?>	
	<li><?php echo CHtml::link("State / Province",array('/state/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('City.Admin')) : ?>	
	<li><?php echo CHtml::link("City",array('/city/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Languages.Admin')) : ?>	
	<li><?php echo CHtml::link("Languages",array('/languages/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Eduboard.Admin')) : ?>	
	<li><?php echo CHtml::link("Education Board",array('/eduboard/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Qualification.Admin')) : ?>	
	<li><?php echo CHtml::link("Qualification",array('/qualification/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Year.Admin')) : ?>	
	<li><?php echo CHtml::link("Year",array('/year/admin'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('UserType.Admin')) : ?>	
	<li><?php echo CHtml::link("UserType",array('/userType/admin'));?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Studentstatusmaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Student Status",array('/studentstatusmaster/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('NationalHolidays.Admin')) : ?>	
	<li><?php echo CHtml::link("National Holiday",array('/nationalHolidays/admin'));?></li>
	<?php endif; ?>
                        </ul>
                    </li>
	<?php } ?>
		<?php if(Yii::app()->user->checkAccess('Course.Admin')) { ?>	
	<li><?php echo CHtml::link("<i class='fa fa-graduation-cap' title='Course'></i> Course",array('/course/admin'));?></li>
	<?php } ?>
                  
			<?php if(Yii::app()->user->checkAccess('Employeemodule')) { ?>	
		 <li>
	<?php echo CHtml::link("<i class='fa fa-user' title='Employee'></i> Employee", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			 <h2><i class="fa fa-user"></i>Employee</h2>
			<ul>
				<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Create')) : ?>	
		<li><?php echo CHtml::link('Add Employee', array('/employee/employeeTransaction/create'), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>
		<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Admin')) : ?>	
		<li><?php echo CHtml::link('Manage Employee', array('/employee/employeeTransaction/admin'), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>
		
		<?php if(Yii::app()->user->checkAccess('Resetlogin')) : ?>
		<li><?php echo CHtml::link('Reset Login', array('/user/resetemploginid'), array	('class'=>'changeForm')); ?></li>
		<?php endif; ?>
	
		<?php if(Yii::app()->user->checkAccess('Resetpassword')) : ?>
		<li><?php echo CHtml::link('Reset Password', array('/user/resetemppassword'), array('class'=>'changeForm')); ?></li>
		<?php endif; ?>
			</ul>
		   </li>
	<?php } ?>		
                   
			<?php if(Yii::app()->user->checkAccess('Studentmodule')) { ?>
		   <li>	
	<?php echo CHtml::link("<i class='fa fa-male' title='Student'></i> Student", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			 <h2><i class="fa fa-male"></i>Student</h2>
			<ul>
			<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Create')) : ?>
	<li><?php echo CHtml::link('Add Student', array('/student/studentTransaction/create'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Admin')) : ?>
	<li><?php echo CHtml::link('List Students', array('/student/studentTransaction/admin'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->checkAccess('Resetlogin')) : ?>
	<li><?php echo CHtml::link('Reset Login', array('/user/resetstudloginid'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Resetpassword')) : ?>
	<li><?php echo CHtml::link('Reset Password', array('/user/resetstudpassword'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
			</ul>
		  </li>
	<?php } ?>
		  
			<?php if(Yii::app()->user->checkAccess('Dashboard')) { ?>
		  <li>
	<?php echo CHtml::link("<i class='fa fa-tachometer' title='Dashboard'></i> Dashboard", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			<h2><i class="fa fa-tachometer"></i>Dashboard</h2> 
			<ul>
			<?php if(Yii::app()->user->checkAccess('MessageOfDay.Admin')) : ?>	
	<li><?php echo CHtml::link("Message Of Day",array('/messageOfDay/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('ImportantNotice.Admin')) : ?>	
	<li><?php echo CHtml::link("Important Notice",array('/importantNotice/admin'));?></li>
	<?php endif; ?>

			</ul>
		  </li>
	<?php } ?>
		  
			<?php if(Yii::app()->user->checkAccess('Fees')) { ?>
		  <li>
	<?php echo CHtml::link("<i class='fa fa-inr' title='Fees'></i> Fees", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
		
			<h2><i class="fa fa-inr"></i>Fees</h2> 
			<ul>
			<?php if(Yii::app()->user->checkAccess('Fees.BankMaster.Admin')) : ?>	
	<li><?php echo CHtml::link("Bank Master",array('/fees/bankMaster/admin'));?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->getState('stud_id')) {
		//$stu_tran = StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
		if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Create')) : ?>	
	<li><?php echo CHtml::link("Fees Collection",array('/fees/feesPaymentTransaction/create','id'=>Yii::app()->user->getState('stud_id')));?></li>
	<?php endif;  } ?>	
	
	<?php if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Addfees')) : ?>	
	<li><?php echo CHtml::link("Fees Collection",array('/fees/feesPaymentTransaction/addfees'));?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.CourseWiseFeesReport')) : ?>	
	<li><?php echo CHtml::link("Student Fees Report",array('/fees/feesPaymentTransaction/courseWiseFeesReport'),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
			</ul>
		  </li>
	<?php } ?>	
		
			<?php if(Yii::app()->user->checkAccess('Controlpanel')) { ?>
		<li>
	<?php echo CHtml::link("<i class='fa fa-link' title='Control Panel'></i> Control Panel", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			<h2><i class="fa fa-link"></i>Control Panel</h2> 
			<ul>
			<li><?php echo CHtml::link('Manage Institute', array('/organization/admin'), array('class'=>'changeForm')); ?></li>
	<li><?php echo CHtml::link('User Management', array('/rights'), array('class'=>'changeForm')); ?></li>
			</ul>
		  </li>
	<?php } ?>
		
			<?php if(Yii::app()->user->checkAccess('Document')) { ?>
		<li>
	<?php echo CHtml::link("<i class='fa fa-files-o' title='Document Management'></i> Document", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			<h2><i class="fa fa-files-o"></i>Document</h2> 
			<ul>
			<?php if(Yii::app()->user->checkAccess('DocumentCategoryMaster.Admin')) : ?>
	<li><?php echo CHtml::link('Document Category', array('/documentCategoryMaster/admin'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.StudentDocumentsearch')) : ?>
	<li><?php echo CHtml::link('Student Document', array('/report/studentDocumentsearch'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.Documentsearch')) : ?>
	<li><?php echo CHtml::link('Employee Document', array('/report/documentsearch'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
			</ul>
		  </li>
	<?php } ?>	
		
			<?php if(Yii::app()->user->checkAccess('Reports') ) { ?>
		  <li>
       <?php echo CHtml::link("	<i class='fa fa-bar-chart-o' title='Reports'></i> Reports Center", array("/dashboard/index.indexPage"), array('class'=>'changeForm'));?>
	
			<h2><i class="fa fa-bar-chart-o"></i>Reports Center</h2> 
			<ul>
			<?php if(Yii::app()->user->checkAccess('Report.StudInfoReport')) : ?>
	<li><?php echo CHtml::link('Student', array('/report/studInfoReport'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>

	<?php if(Yii::app()->user->checkAccess('Report.EmployeeInfoReport')) : ?>
	<li><?php echo CHtml::link('Employee', array('/report/employeeInfoReport'), array('class'=>'changeForm')); ?></li>
	<?php endif; ?>
	<?php if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.CourseWiseFeesReport')) : ?>	
	<li><?php echo CHtml::link("Student Fees Report",array('/fees/feesPaymentTransaction/courseWiseFeesReport'),array('class'=>'changeForm'));?></li>
	<?php endif; ?>
			</ul>
		  </li>
	<?php } ?>
		 
			<?php if(Yii::app()->user->checkAccess('Loginhistory')) { ?>
		 <li>
	<?php echo CHtml::link("<i class='fa fa-header' title='Login History'></i> Login History",array('/LoginUser/login_user'), array('class'=>'changeForm'));?>
	
		  </li>
	<?php } ?>	 
                </ul>
            </nav>
        </div>


       <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.multilevelpushmenu.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/collapsed.js"></script>
<i class="fa fa-chevron-up" id="back-to-top"></i>
 <script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('#back-to-top').fadeIn(duration);
					} else {
						jQuery('#back-to-top').fadeOut(duration);
					}
				});
				
				jQuery('#back-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
		</script>
 
