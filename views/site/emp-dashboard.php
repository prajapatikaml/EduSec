<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Employee Dashboard"; 
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
//jQuery.noConflict();
$(document).ready(function(){
    $('.tab-content').slimScroll({
        height: '300px'
    });
});

$(document).ready(function(){
    $('#coursList').slimScroll({
        height: '250px'
    });
    $('#holidayList').slimScroll({
        height: '470px'
    });
});
</script>

<style>
img {
    vertical-align: inherit !important;   
}
.tab-content {
   padding:15px;
}
.box .box-body .fc-widget-header {
    background: none;
}
.popover{
    max-width:450px;   
}
</style>

<?php
$this->registerJs(
"$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});")
?>

<?php
	yii\bootstrap\Modal::begin([
	    'header' => '<h4><i class="fa fa-eye"></i> View Notice Details</h4>',
	    'id'=>'NoticeModal',
	]);
	echo '<div id="NoticeModalContent"></div>';
	yii\bootstrap\Modal::end();
?>

<!-- Main content -->
            <section class="content">
	<?php  $msg = app\modules\dashboard\models\MsgOfDay::find()->andWhere(['is_status' => 0,'msg_user_type'=> ['0','E' ]])->one(); ?>
<?php		if(!empty($msg))
		{ ?>				
		<div class="callout callout-info show msg-of-day" >
		    <h4><i class="fa fa-bullhorn"></i> Message of day box</h4>
		    <marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left"><?php echo $msg->msg_details; ?></marquee>
		    
		</div>
		<?php } else {   ?>
		<div class="callout callout-info hide msg-of-day" >
		    <h4>Message of day box</h4>
		   	<marquee behavior="scroll" direction="left"></marquee>
		   
		</div>
		<?php } ?>
       <?php $empSession = Yii::$app->session->get('emp_id'); ?>
       <?php $EmpMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $empSession])->one(); ?>
       <?php $EmpInfo = app\modules\employee\models\EmpInfo::findOne($EmpMaster->emp_master_emp_info_id);  ?>
	<?php $empDepartment = app\modules\employee\models\EmpDepartment::findOne($EmpMaster->emp_master_department_id);  ?>

<!---start first row block for employee info and holiday list--->
 <div class="row">
	<div class="col-sm-4 col-xs-12">
	      <div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> My Information</h3>
		</div>
		<div class="box-body table-responsive no-padding">
		<div class="col-md-12 text-center">
			<?= Html::img($EmpInfo->getEmpPhoto($EmpInfo->emp_photo),['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp', 'style'=>'margin: 7px;']); ?>
		</div>
		<table class="table table-striped">
			<tr>
				<th>Employee ID</th>
				<td><?= Html::encode($EmpInfo->emp_unique_id) ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?= $EmpInfo->getEmpFullName()?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td><?= $EmpMaster->empMasterDepartment->emp_department_name ?></td>	
			</tr>
			<tr>
				<th>Designation</th>
				<td><?= (!empty($EmpMaster->empMasterDesignation->emp_designation_name) ? $EmpMaster->empMasterDesignation->emp_designation_name :"") ?></td>			
			</tr>
			
			<tr>
				<th><?= Html::activeLabel($EmpInfo, 'emp_mobile_no') ?></th>
				<td><?= (!empty($info->emp_mobile_no) ? $info->emp_mobile_no : "" )?></td>
			</tr>	
			<tr>
				<th><?= Html::activeLabel($EmpInfo, 'emp_email_id') ?></th>
				<td><?= (!empty($EmpInfo->emp_email_id) ? $EmpInfo->emp_email_id : "") ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<?php if($EmpMaster->is_status==0) : ?>
					<span class="label label-success">Active</span>
					<?php else : ?>
					<span class="label label-danger">InActive</span>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	      </div><!---/. box-body--->
	      <div class="box-footer text-right">
			<?= Html::a('More Info <i class="fa fa-arrow-circle-right"></i>', ['/employee/emp-master/view', 'id' => $EmpMaster->emp_master_id], ['class' => 'btn btn-default btn-sm']) ?>
	      </div>
	     </div><!---/. box--->
	    </div><!---/. col-sm-4-->
	   
	    <div class="col-sm-8 col-xs-12">
		<div class="box box-info">
		   <div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-calendar-o"></i> Holiday List</h3>
		   </div>
		   <div class="box-body" id="holidayList">
		     <div class="table-responsive">
			<?php if(!empty($holidayData)) : ?>
			<table class="table no-margin">
				<col class="col-sm-3">
				<col class="col-sm-9">
				<tr>
					<th>Date</th>
					<th>Holiday</th>
				</tr>
				<?php foreach($holidayData as $v) : ?>	
				<tr>
					<td><?= Yii::$app->formatter->asDate($v['national_holiday_date']) ?></td>
					<td><?= $v['national_holiday_name']?></td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php else : ?>
			<div class="box-header bg-warning">
				<div style="padding:5px">
					No data available...
				</div>
			</div>
			<?php endif; ?>
		     </div><!---/. end-responsive-div--->
		   </div><!---/. box-body---> 	
		</div><!---/. box---> 	
	</div>	
</div>
<!---end first row block for employee info and holiday list--->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

	   <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li><a href="#emp-notice" data-toggle="tab">Employee</a></li>
                  <!--  <li><a href="#stu-notice" data-toggle="tab">Student</a></li> -->
		    <li class="active"><a href="#all-notice" data-toggle="tab">General</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i>Notice Board</li>
                </ul>
                <div class="tab-content">
                    <!-- Notice -->
                    <div class="tab-pane active" id="all-notice">
			
			<?php $noticeList = app\modules\dashboard\models\Notice::find()->where("is_status = 0 AND notice_user_type = '0'")->all();

		    if(!empty($noticeList)) {
			foreach($noticeList as $nl) : ?>
			 <div class="notice-main bg-light-blue">
				<div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
				</div>
				<div class="notice-body">
					 <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class'=>'noticeModalLink', 'data-value'=>Url::to(['dashboard/notice/view-popup','id'=>$nl->notice_id])]); ?>&nbsp; </div>
					 <div class="notice-desc"><?= $nl->notice_description; ?> </div>
				</div>					          
			</div>
			<?php endforeach; 
		     } else {
				echo '<div class="box-header bg-warning"><div style="padding:5px">';
				echo "No Notice For You....";
				echo '</div></div>';
		     }
			?>
		    </div>
		    <div class="tab-pane" id="emp-notice">
			
			<?php $noticeList = app\modules\dashboard\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'E'")->all();

		    if(!empty($noticeList)) {
			foreach($noticeList as $nl) :
			?>
			    <div class="notice-main bg-teal">
			        <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
				</div>
				<div class="notice-body">
					 <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class'=>'noticeModalLink', 'data-value'=>Url::to(['dashboard/notice/view-popup','id'=>$nl->notice_id])]); ?> &nbsp; </div>
					 <div class="notice-desc"><?= $nl->notice_description; ?> </div>
				</div>	
			    </div><!-- /.box -->
			<?php endforeach;
		      } else {
				echo '<div class="box-header bg-warning"><div style="padding:5px">';
				echo "No Notice....";
				echo '</div></div>';
		      }
			?>
		    </div>
                </div> <!--  /.tab-content -->
            </div><!-- /.nav-tabs-custom -->

	    <!-- Calendar -->
            <div class="box box-info ">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--The calendar -->
	<?php
	$JSEventClick = <<<EOF
		function(event, jsEvent, view) {
		    $('.fc-event').on('click', function (e) {
			$('.fc-event').not(this).popover('hide');
		    });
		}
EOF;
	$JsF = <<<EOF
		function (event, element) {
			var start_time = moment(event.start).format("DD-MM-YYYY, h:mm:ss a");
		    	var end_time = moment(event.end).format("DD-MM-YYYY, h:mm:ss a");

		        element.clickover({
		            title: event.title,
		            placement: 'top',
		            html: true,
			    global_close: true,
			    container: 'body',
		            content: "<table class='table'><tr><th>Event Detail : </th><td>" + event.description + " </td></tr><tr><th> Event Type : </th><td>" + event.event_type + "</td></tr><tr><th> Start Time : </t><td>" + start_time + "</td></tr><tr><th> End Time : </th><td>" + end_time + "</td></tr></table>"
        		});
               }
EOF;
	?>
                    <?= \yii2fullcalendar\yii2fullcalendar::widget([
				'options' => ['language' => 'es',],
				'clientOptions' => [
					'fixedWeekCount' => false,
					'weekNumbers'=>true,
					'editable' => true,
					'eventLimit' => true,
					'eventLimitText' => 'more Events',
					'header' => [
						'left' => 'prev,next today',
						'center' => 'title',
						'right' => 'month,agendaWeek,agendaDay'
					],
					'eventClick' => new \yii\web\JsExpression($JSEventClick),
					'eventRender' => new \yii\web\JsExpression($JsF),
					'contentHeight' => 380,
					'timeFormat' => 'hh(:mm) A', 
				],
				'ajaxEvents' => yii\helpers\Url::toRoute(['/dashboard/events/view-events'])
			]);
		    ?>
		   <div class="row">
			<ul class="legend">
			    <li><span class="holiday"></span> Holiday</li>
			    <li><span class="importantnotice"></span> Important Notice</li>
			    <li><span class="meeting"></span> Meeting</li>
			    <li><span class="messages"></span> Messages</li>
			</ul>
		   </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

	    <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li><a href="#birth-upcoming" data-toggle="tab">Upcoming</a></li>
		    <li class="active"><a href="#birth-taday" data-toggle="tab">Today's</a></li>
                    <li class="pull-left header"><i class="fa fa-birthday-cake"></i>Birthdays</li>
                </ul>
                <div class="tab-content">
                    <!-- Birthdays -->
		    <div class="tab-pane active" id="birth-taday">
			<?php $empList = app\modules\employee\models\EmpInfo::find()->where(["LIKE", "emp_dob", date('m-d')])->all();
			if(!empty($empList)) {
				foreach($empList as $el) :
				?>
				    <div class="box box-solid bg-aqua">
					<div class="box-header">
					    <div class="pull-left" style="padding:5px">
                                                <img src="<?= $el->getEmpPhoto($el->emp_photo); ?>" class="img-circle edusec-img-disp" alt="no image" width="40px" height="40px">
                                            </div>
					<h3 class="box-title"><?php echo $el->getEmpFullName(); ?>&nbsp;
					<small class="label label-success"><i class="fa fa-calendar"></i> <?php echo date('d M',strtotime($el->emp_dob)); ?></small></h3>
					</div>
				    </div><!-- /.box -->
				<?php endforeach; 
			} else {
				echo '<div class="box-header bg-warning"><div style="padding:5px">';
				echo "No Birthday Today";
				echo '</div></div>';
			}
			?>
		    </div>
                    <div class="tab-pane" id="birth-upcoming">
			<?php $empLi = "SELECT * FROM  emp_info WHERE  DATE_ADD(emp_dob, INTERVAL YEAR(CURDATE())-YEAR(emp_dob) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(emp_dob),1,0) YEAR) BETWEEN CURDATE()+1 AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";
			$empList = app\modules\employee\models\EmpInfo::findBySql($empLi)->all(); 
			if(!empty($empList)) {
				foreach($empList as $el) :
				?>
				    <div class="box box-solid bg-aqua">
					<div class="box-header">
					    <div class="pull-left" style="padding:5px">
                                               <img src="<?= $el->getEmpPhoto($el->emp_photo); ?>" class="img-circle" alt="no image" width="40px" height="40px">
                                            </div>
					    <h3 class="box-title"><?php echo $el->getEmpName(); ?>&nbsp;
					    <small class="label label-warning"><i class="fa fa-calendar"></i> <?php echo date('d M',strtotime($el->emp_dob)); ?></small></h3>
					</div>
				    </div><!-- /.box -->
				<?php endforeach; 
			} else {
				echo '<div class="box-header bg-warning"><div style="padding:5px">';
				echo "No Birthday within 30 days duration";
				echo '</div></div>';
			}
			?>
		    </div>
                </div> <!--  /.tab-content -->
            </div><!-- /.nav-tabs-custom -->

	    <!-- TO DO List -->
            <div class="box box-info ">
                <div class="box-header">
                    <i class="ion ion-university"></i>
                    <h3 class="box-title">Courses</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list" id="coursList">
		     <?php 
			$courseList = app\modules\course\models\Courses::find()->where(['is_status' => 0])->all(); 

			foreach($courseList as $cl) :
		     ?>
                        <li>
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <span class="text"><?php echo $cl->course_name;?></span>
                            <?php $stuCount = app\modules\student\models\StuMaster::find()->where(['stu_master_course_id' => $cl->course_id, 'is_status' => 0])->count();?>
			    <span class="notification-container pull-right text-teal" title="<?= $stuCount; ?> Students"><i class="fa fa-users"></i><span class="label label-info notification-counter"><?= $stuCount; ?></span></span>
                        </li>
		     <?php endforeach; ?>
                    </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- right col -->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->

<!-- add new calendar event modal -->
