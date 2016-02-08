<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />


	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sal.css" media="print, projection" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tableview.css" media="print,screen" />


<script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
  });
</script>

<style>
#loading {
  background-color: green;
  border-radius: 0 0 5px 5px;
  color: #FFFFFF;
  display: block;
  height: 20px;
  left: 48%;
  opacity: 0.7;
  position: fixed;
  text-align: center;
  top: 0;
  width: 5%;
  z-index: 99;
}
</style>

<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
				
				var oTable = $('#example').dataTable( {
					"sScrollY": "500px",
					"sScrollX": "100%",
					"sScrollXInner": "100%",
					"bScrollCollapse": true,
					"bPaginate": false,
					"fnPreDrawCallback": function ( oSettings ) {
						/* Need to redo the counters if filtered or sorted */
						if ( oSettings.bSorted || oSettings.bFiltered ) {
							for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
								var nTr = oSettings.aoData[ oSettings.aiDisplay[i] ].nTr;

								// Update the index column and do so without redrawing the table
								this.fnUpdate( i+1, nTr, 0, false, false );
							}
						}
					},
					"aoColumnDefs": [
						{ "bSortable": false, "sClass": "index", "aTargets": [ 0 ] }
					],
					"aaSorting": [[ 1, 'asc' ]]
				} );
				new FixedColumns( oTable );

		
			} );

	
			$(window).load(function() {
				$('#example tr:first-child').addClass('even');
				$("#example tr:nth-child(2)").addClass('odd');
			    });

		</script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="loading" class="oe_loading">Loading...</div>
<div id="header">

	<div id="logo">
	<div id="site-logo">
		<?php
		$org = Organization::model()->findAll();
		echo CHtml::link(CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org[0]['organization_id'])),'No Image',array('width'=>80,'height'=>70)),array('/site/newdashboard'));
		?>
	</div>
	<div id="site-logo" style="text-align:center;padding-top:15px;font-size:20px;">
	  <div style = "float: left; margin-bottom: -8px; padding-top: 3px; margin-left: 29px; font-size: 18px;">
	<?php
		echo $org[0]['organization_name'];
	?>
	  </div>
	</div>
      </div>
</div>
		
<div id="main-content">

<div id="page">

<div id="mainmenu">
  <div id="nav-bar">	
  <div class="left-menu-link">
  <?php 
    $empsession = 0;
    $studsession = 0;
    $count = 0;
    if(!Yii::app()->user->isGuest){
      $studsession = Yii::app()->user->getState('stud_id');
      $empsession = Yii::app()->user->getState('emp_id');
    }
    if(!Yii::app()->user->isGuest && !Yii::app()->user->getState('parent_id') )
    {
	echo '<ul id ="nav"><li class="pwd" style=" text-align: center; padding: 0px;">'.CHtml::link("Menu", "" ,array('onClick'=>'$("#master").dialog("open");return false;')).'</li>';
	echo '</ul></div>';
    }
	$login_user_name = '';
		if(Yii::app()->user->getState('parent_id'))
		{
		   $login_user_name = "Parents of ";
		}

		if(isset($studsession))
		{
		   $stud_model = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$studsession));
		   $login_user_name .= ucfirst(strtolower($stud_model->student_first_name)).' '.ucfirst(strtolower($stud_model->student_last_name));
		}
		else if(isset($empsession))
		{	
		
		   $emp_model = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$empsession));
		   //$ass_comp = assignCompanyUserTable::model()->findAll(array('condition'=>''))
		
		   $login_user_name = ucfirst(strtolower($emp_model->employee_first_name)).' '.ucfirst(strtolower($emp_model->employee_last_name));

		}
		else
		{
		  $login_user_name = ucfirst(strtolower(strstr(Yii::app()->user->name,'@',true)));
		}
		?>

		<?php echo '<div class="right-menu-link"><ul id ="nav"><li class="welcome">Welcome, '. $login_user_name.'</li>';
			echo '<li>'.CHtml::link('Edusec Support','http://124.125.156.120:8081', array('target'=>'_blank'))."</li>";
		if(isset($studsession) && !Yii::app()->user->getState('parent_id') )
		{
			echo '<li>'.CHtml::link("My Account",array('/student/studentTransaction/update?id='.$studsession)).'</li>';
		}
		if(isset($empsession))
		{
			
			echo '<li>'.CHtml::link("My Account",array('/employee/employeeTransaction/update?id='.$empsession)).'</li>';
			
		}
		$change_passlink = '/user/change/';
		
		if(Yii::app()->user->getState('parent_id'))
		{
		  $change_passlink = '/parents/parent/change';		
		}
		echo '<li>'.CHtml::link("Change Password", array($change_passlink)).'</li>';	
		echo '<li class="last-menu-item">'.CHtml::link(" Logout", array('/site/logout')).'</li></ul></div>';
			?>
	
		</div>
	</div><!-- mainmenu -->

<!--menu window-->
<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'menuwindow',
	'options'=>array(
		'title'=>'Control Panel',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'auto',
                'resizable'=>false,
               'draggable'=>false,
		
	),
	'htmlOptions'=>array('style'=>'max-width:800px'),
));
?>

<div class="main-div" style="display:none;">
	<?php if(Yii::app()->user->checkAccess('Organization.Admin')) { ?>
	<div class="pop-mainorg-link">
	<?php
	echo CHtml::link("Create Organization",array('/organization/admin'));?>
	</div>
	<?php } ?>

	<div class="pop-user-mng-link">
	<?php echo CHtml::link("User Managements",array('/rights'));?>
	</div>

</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'master',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Module List',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'754',
                'resizable'=>false,
                'draggable'=>false,
		
	),
	'htmlOptions'=>array('style'=>'max-width:720px; display:none;'),
));
?>

<div class="main-dialog" >

	<?php if(Yii::app()->user->checkAccess('Configuration')) { ?>
	<div class="pop-master-link">
	<?php echo CHtml::link("Configuration","", array('onClick'=>'$("#master1").dialog("open");return false;'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Admin')) { ?>
	<div class="pop-emp-link">
	<?php echo CHtml::link("",array('/employee/employeeTransaction/admin'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Admin')) { ?>
	<div class="pop-stud-link">
	<?php echo CHtml::link("",array('/student/studentTransaction/admin'));?>
	</div>
	<?php } ?>
	
	<?php if(Yii::app()->user->checkAccess('MessageOfDay.Admin')) { ?>	
	<div class="pop-message-link big-string-icon">
	<?php echo CHtml::link("Message Of Day",array('/messageOfDay/admin'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Controlpanel')) { ?>
	<div class="pop-mainpanel-link">
	<?php echo CHtml::link("Control Panel","", array('onClick'=>'$("#menuwindow").dialog("open");return false;'));?>
	</div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Document')) { ?>	
	<div class="pop-documentmanagement-link">
<?php echo CHtml::link("Document","", array('onClick'=>'$("#documentmanagement").dialog("open");return false;'));?>
	</div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Resetlogin')) { ?>
	<div class="pop-resetlogin-link">
       <?php echo CHtml::link("Reset Login","", array('onclick'=>'$("#login").dialog("open");return false;'));?>
        </div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Reports') ) { ?>
	 <div class="pop-report-link">
       <?php echo CHtml::link("Reports Center","", array('onclick'=>'$("#reports").dialog("open");return false;'));?>
        </div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Resetpassword')) { ?>	
	<div class="pop-resetpassword-link">
	<?php echo CHtml::link("Reset Password","", array('onclick'=>'$("#password").dialog("open");return false;'));?>
	</div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Loginhistory')) { ?>	
	<div class="pop-login-history-link">
	<?php echo CHtml::link("Login History",array('/LoginUser/login_user'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('StudentTransaction.Admin')) { ?>
	<div class="pop-studaddfee-link">
	<?php echo CHtml::link("",array('/student/studentPaidFeesDetails/takeFees'));?>
	</div>
	<?php } ?>
		
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'documentmanagement',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Document',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>180,
                'width'=>'auto',
                'resizable'=>false,
               'draggable'=>false,
	),
	 'htmlOptions'=>array('style'=>'max-width:800px'),
));
?>

<div class="main-div" style="display:none;">
	
	<?php if(Yii::app()->user->checkAccess('DocumentCategoryMaster.Admin')) { ?>
	<div class="pop-documentcategory-link big-string-icon">
	<?php echo CHtml::link("Document Category",array('/documentCategoryMaster/admin'));?>
	</div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Report.StudentDocumentsearch')) { ?>
	<div class="pop-studentdocument-link big-string-icon">
	<?php echo CHtml::link("Student Document",array('/report/studentDocumentsearch'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('Report.Documentsearch')) { ?>
	<div class="pop-employeedocument-link big-string-icon">
	<?php echo CHtml::link("Employee Document",array('/report/documentsearch'));?>
	</div>
	<?php } ?>

</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
       'id'=>'reports',
       // additional javascript options for the dialog plugin
       'options'=>array(
               'title'=>'Reports Center',
               'autoOpen'=>false,
               'modal'=>true,        
               'height'=>'auto',
               'width'=>'auto',
               'resizable'=>false,
               'draggable'=>false,
       ),
	 'htmlOptions'=>array('style'=>'max-width:425px'),
));
?>

<div class = "main-div" style="display:none;">
	<?php if(Yii::app()->user->checkAccess('Report.StudInfoReport')) { ?>
          <div class="pop-studentinforeport-link">
          <?php echo CHtml::link("Student Info Report",array('/report/StudInfoReport'));?>
          </div>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Report.EmployeeInfoReport')) { ?>
          <div class="pop-empinforeport-link">
          <?php echo CHtml::link("Employee Info Report",array('/report/EmployeeInfoReport'));?>
          </div>
	<?php } ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'password',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Reset Password',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'auto',
                'resizable'=>false,
                 'draggable'=>false,
	),
	'htmlOptions'=>array('style'=>'max-width:800px'),
));
?>
<div class = "main-div" style="display:none;">

	<?php if(Yii::app()->user->checkAccess('User.Resetstudpassword')) { ?>
	<div class="pop-studpassword-link" >
	<?php echo CHtml::link("Reset Student Password",array('/user/resetstudpassword'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('User.Resetemppassword')) { ?>
	<div class="pop-emppassword-link">
	<?php echo CHtml::link("Reset Employee Password",array('/user/resetemppassword'));?>
	</div>
	<?php } ?>
</div>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
       'id'=>'login',
       // additional javascript options for the dialog plugin
       'options'=>array(
               'title'=>'Reset Login',
               'autoOpen'=>false,
               'modal'=>true,        
               'height'=>'auto',
               'width'=>'auto',
               'resizable'=>false,
              'draggable'=>false,
       ),
	'htmlOptions'=>array('style'=>'max-width:800px'),
));
?>

<div class = "main-div" style="display:none;">
       <?php if(Yii::app()->user->checkAccess('User.Resetstudloginid')) { ?>
       <div class="pop-studloginid-link" >
       <?php echo CHtml::link("Reset Student Loginid",array('/user/resetstudloginid'));?>
       </div>
       <?php } ?>
       <?php if(Yii::app()->user->checkAccess('User.Resetemploginid')) { ?>	
       <div class="pop-emploginid-link">
       <?php echo CHtml::link("Reset Employee Loginid",array('/user/resetemploginid'));?>
       </div>
       <?php } ?>
</div>


<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!--student info-->

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'stud',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Student Information',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>210,
                'resizable'=>false,
                'draggable'=>false,
	),
));
?>

<div class="main-div" style="display:none;">
	<?php if(Yii::app()->user->checkAccess('StudentTransaction.Create')) { ?>
	<div class="pop-studadd-link">
	<?php echo CHtml::link("Add Student",array('/studentTransaction/create'));?>
	</div>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('StudentTransaction.Admin')) { ?>
	<div class="pop-studaddfee-link">
	<?php echo CHtml::link("Add Student Fees",array('/studentTransaction/admin'));?>
	</div>
	<?php } ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'master1',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Master',
		'autoOpen'=>false,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>'auto',
                'resizable'=>false,
                'draggable'=>false,
	),
	'htmlOptions'=>array('style'=>'max-width:765px'),
));
?>

<div class="main-div" style="display:none;">

<div class="master2">

<?php if(Yii::app()->user->checkAccess('AcademicTermPeriod.Admin')) { ?>	
<div class="pop-academicTermPeriod-link">
<?php echo CHtml::link("Academic Year",array('/academicTermPeriod/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('AcademicTerm.Admin')) { ?>	
<div class="pop-academicTermName-link">
<?php echo CHtml::link("Semester",array('/academicTerm/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('Department.Admin')) { ?>	
<div class="pop-department-link">
<?php echo CHtml::link("Department",array('/department/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('EmployeeDesignation.Admin')) { ?>	
<div class="pop-empdesi-link">
<?php echo CHtml::link("Employee Designation",array('/employeeDesignation/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('Nationality.Admin')) { ?>	
<div class="pop-nationality-link">
<?php echo CHtml::link("Nationality",array('/nationality/admin'));?>
</div>
<?php } ?>


<?php if(Yii::app()->user->checkAccess('Country.Admin')) { ?>	
<div class="pop-country-link">
<?php echo CHtml::link("Country",array('/country/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('State.Admin')) { ?>	
<div class="pop-state-link">
<?php echo CHtml::link("State",array('/state/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('City.Admin')) { ?>	
<div class="pop-city-link">
<?php echo CHtml::link("City",array('/city/admin'));?>
</div>
<?php } ?>
<?php if(Yii::app()->user->checkAccess('Languages.Admin')) { ?>
<div class="pop-language-link">
<?php echo CHtml::link("Languages",array('/languages/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('Eduboard.Admin')) { ?>
<div class="pop-eduboard-link">
<?php echo CHtml::link("Education Board",array('/eduboard/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('Qualification.Admin')) { ?>
<div class="pop-qualification-link">
<?php echo CHtml::link("Qualification",array('/qualification/admin'));?>
</div>
<?php } ?>



<?php if(Yii::app()->user->checkAccess('Studentstatusmaster.Admin')) { ?>
<div class="pop-studentstatus-link">
<?php echo CHtml::link("Student Status",array('/Studentstatusmaster/admin'));?>
</div>
<?php } ?>

<?php if(Yii::app()->user->checkAccess('Year.Admin')) { ?>
<div class="pop-year-link">
<?php echo CHtml::link("Year",array('/Year/admin'));?>
</div>
<?php } ?>

</div>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		    'homeLink'=>CHtml::link('Home', array('/site/newdashboard')),
		    'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->


	<?php endif?>

	<?php echo $content; ?>



</div><!-- page -->
</div><!-- content -->

	<div id="footer">
<div class="powered-by"><span class="powered-text">© Copyright 2013 Rudra Softech. All Rights Reserved.
</span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/rudraSoftech.png" /> </div>
	</div><!-- footer -->



</body>
</html>

