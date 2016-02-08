<?php        
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'master',
	'options'=>array(
		'title'=>'Module List',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'800',
                'resizable'=>false,
                'draggable'=>false,
		
	),
	'htmlOptions'=>array('style'=>'display:none;'),
));
?>

<div class="menu-dialog" >

	<?php if(Yii::app()->user->checkAccess('Configuration')) { ?>
	<div class="pop-master-link">
	<?php echo CHtml::link("<i class='icon-cog' title='Configuration'>&#xf013;</i> Configuration", array("/dashboard/index.indexPage", 'page'=>'configuration'), array('class'=>'changeForm '));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Employeemodule')) { ?>	
	<div class="pop-empmodule-link">
	<?php echo CHtml::link("<i class='icon-user' title='Employee'>&#xf007;</i>Employee", array("/dashboard/index.indexPage", 'page'=>'employee'), array('class'=>'changeForm'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Studentmodule')) { ?>	
	<div class="pop-studentmodule-link">
	<?php echo CHtml::link("<i class='icon-male' title='Student'>&#xf183;</i>Student", array("/dashboard/index.indexPage", 'page'=>'student'), array('class'=>'changeForm'));?>
	</div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Fees')) { ?>
	<div class="pop-fee-link">
	<?php echo CHtml::link("<i class='icon-inr' title='Fees'>&#xf156;</i> Fees", array("/dashboard/index.indexPage", 'page'=>'fees'), array('class'=>'changeForm'));?>
	</div>
	<?php } ?>
	
	<?php //if(Yii::app()->user->checkAccess('Dashboard')) { ?>
	<!-- div class="pop-dashboard-link">
	<?php //echo CHtml::link("<i class='icon-user' title='Dashboard'>&#xf0e4;</i>	Dashboard", array("/dashboard/index.indexPage", 'page'=>'dashboard'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Visitor')) { ?>
	<div class="pop-visitor-link">
	<?php //echo CHtml::link("<i class='icon-user' title='Visitors'>&#xf183;&#xf182;</i> Visitor",array('/visitor/visitorPass/admin'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Controlpanel')) { ?>
	<div class="pop-mainpanel-link">
	
	<?php //echo CHtml::link("<i class='icon-th' title='Control Panel'>&#xf0ad;</i>Control Panel", array("/dashboard/index.indexPage", 'page'=>'controlPanel'), array('class'=>'changeForm'));?>
	</div>
	<?php // } ?>

	<?php //if(Yii::app()->user->checkAccess('Document')) { ?>
	<div class="pop-documentmanagement-link">		
	<?php //echo CHtml::link("<i class='icon-th' title='Document Management'>&#xf0b1;</i>Document", array("/dashboard/index.indexPage", 'page'=>'document'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Room')) { ?>	
	<div class="pop-roommanagement-link">
	<?php //echo CHtml::link("<i class='icon-th' title='Room Management'>&#xf0db;</i>Room", array("/dashboard/index.indexPage", 'page'=>'room'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>
	<?php //if(Yii::app()->user->checkAccess('Timetable')) { ?>
	<div class="pop-timetable-link">
	<?php //echo CHtml::link("<i class='icon-th' title='Institute Timetable'>&#xf017;</i>Institute Timetable",array('/timetable/timetable/admin'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Subject')) { ?>	
	<div class="pop-subjectmanagement-link">
	<?php //echo CHtml::link("<i class='icon-th' title='Subject Management'>&#xf02d;</i>Subject", array("/dashboard/index.indexPage", 'page'=>'subject'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Certificate')) { ?> 
	<div class="pop-certificate-link">
        <?php //echo CHtml::link("<i class='icon-th' title='Certificate Management'>&#xf0a3;</i>Certificate", array("/dashboard/index.indexPage", 'page'=>'certificateModule'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Smsemail')) { ?> 
	<div class="pop-sms-link">
        <?php //echo CHtml::link("<i class='icon-user' title='Send Sms and Email'>&#xf10b;</i> SMS-Email", array("/dashboard/index.indexPage", 'page'=>'smsEmail'), array('class'=>'changeForm'));?>
   	 </div>
	<?php //} ?>
	<?php //if(Yii::app()->user->checkAccess('Hostel')) { ?> 
	<div class="pop-hostel-link">
	<?php //echo CHtml::link("<i class='icon-cog' title='Hostel'>&#xf0f7;</i>Hostel", array("/dashboard/index.indexPage", 'page'=>'hostel'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Examination')) { ?> 
	<div class="pop-exammodule-link">
        <?php //echo CHtml::link("<i class='icon-cog' title='Exam Management'>&#xf059;</i>Examination", array("/dashboard/index.indexPage", 'page'=>'exam'), array('class'=>'changeForm'));?>
   	 </div>
	<?php //} ?>	

	<?php //if(Yii::app()->user->checkAccess('Databasebackup')) { ?> 
	<div class="pop-database-link">
	<?php //echo CHtml::link("<i class='icon-h-sign' title='Database Backup'>&#xf0a0;</i> Database Backup",array('/backup/default/index'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Reports') ) { ?>
	 <div class="pop-report-link">
       <?php //echo CHtml::link("	<i class='icon-bar-chart' title='Reports'>&#xf080;</i> Reports Center", array("/dashboard/index.indexPage", 'page'=>'report'), array('class'=>'changeForm'));?>
        </div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Loginhistory')) { ?>
	<div class="pop-login-history-link">
	<?php //echo CHtml::link("<i class='icon-h-sign' title='Login History'>&#xf05d;</i>Login History",array('/LoginUser/login_user'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>
		
	<?php //if(Yii::app()->user->checkAccess('Photogallery')) { ?>
	<div class="pop-photo-link">
       <?php //echo CHtml::link("	<i class='icon-user' title='Photo Gallery'>&#xf03e;</i> Photo Gallery",array('/photoGallery/Admin'), array('class'=>'changeForm'));?>
       </div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Transport')) { ?>
	<div class="pop-transport-link">
	<?php //echo CHtml::link("<i class='icon-cog' title='Transport'>&#xf0d1;</i>	Transport", array("/dashboard/index.indexPage", 'page'=>'transport'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>		

	<?php //if(Yii::app()->user->checkAccess('Contact')) { ?>	
	<div class="pop-contact-link">
	<?php //echo CHtml::link("<i class='icon-cog' title='Contact Information'>&#xf095;</i> Telephone Diary", array("/dashboard/index.indexPage", 'page'=>'contact'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>

	<?php //if(Yii::app()->user->checkAccess('Assignment')) { ?>
	<div class="pop-assignment-link">
	<?php //echo CHtml::link("<i class='icon-cog' title='Assignment Information'>&#xf0ae;</i>Assignment", array("/dashboard/index.indexPage", 'page'=>'assignments'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>	

	<?php //if(Yii::app()->user->checkAccess('Timetable.TimeTable.Employeelist')) { ?>
	<div class="take-attendance-link">
	<?php //echo CHtml::link("<i class='icon-h-sign' title='Attendance'>&#xf0a6;</i>Attendance",array("/dashboard/index.indexPage", 'page'=>'attendance'), array('class'=>'changeForm'));?>
	</div>
	<?php //} ?>
	<?php //if(Yii::app()->user->checkAccess('Library')) { ?>	
	<div class="pop-library-link">
	<?php //echo CHtml::link("<i class='icon-h-sign' title='Library Management'>&#xf13c;</i>Library",  array("/dashboard/index.indexPage", 'page'=>'library'), array('class'=>'changeForm'));?>
	</div-->
	<?php //} ?>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
