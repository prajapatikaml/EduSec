<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Admin Dashboard"; 
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
$(document).ready(function(){
    $('.tab-content').slimScroll({
        height: '300px'
    });
});
$(document).ready(function(){
    $('#coursList').slimScroll({
        height: '250px'
    });
});
</script>
<style>
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
});");

$this->registerJs(
"$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
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

                    <!-- Small boxes (Stat box) -->
		<?php $stuMsg= app\modules\dashboard\models\MsgOfDay::find()->where('is_status = 0  AND (msg_user_type = "E" OR msg_user_type = "0")')->one();
		if(!empty($stuMsg)) :
		?>
		<div class="callout callout-info msg-of-day">
			    <h4><i class="fa fa-bullhorn"></i> Message of day box</h4>
			    <p><marquee onmouseout="this.setAttribute('scrollamount', 6, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left"><?= $stuMsg->msg_details; ?></marquee></p>
		</div>
		<?php endif; ?>

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                      <?= app\modules\student\models\StuMaster::find()->where(['is_status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        Students
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-people"></i>
                                </div>
				<?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/student/stu-master/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?= app\modules\employee\models\EmpMaster::find()->where(['is_status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        Employees
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
				<?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/employee/emp-master/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?= app\modules\course\models\Courses::find()->where(['is_status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        Active Courses
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
				<?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/course/courses/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?= app\modules\course\models\Batches::find()->where(['is_status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        Active Batches
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-sitemap"></i>
                                </div>
                                <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['/course/batches/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">

			   <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li><a href="#emp-notice" data-toggle="tab">Employee</a></li>
                                    <li><a href="#stu-notice" data-toggle="tab">Student</a></li>
				    <li class="active"><a href="#all-notice" data-toggle="tab">General</a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i>Notice Board</li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Notice -->
                                    <div class="tab-pane active" id="all-notice">
					
					<?php $noticeList = app\modules\dashboard\models\Notice::find()->where("is_status = 0 AND notice_user_type = '0'")->all();

				    if(!empty($noticeList)) {
					foreach($noticeList as $nl) :
					?>
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
						echo "No Notice....";
						echo '</div></div>';
				     }
					?>
				    </div>
                                    <div class="tab-pane" id="stu-notice">
					
					<?php $noticeList = app\modules\dashboard\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'S'")->all();

				    if(!empty($noticeList)) {
					foreach($noticeList as $nl) :
					?>
					 <div class="notice-main bg-aqua">
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
						echo "No Notice....";
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
							 <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class'=>'noticeModalLink', 'data-value'=>Url::to(['dashboard/notice/view-popup','id'=>$nl->notice_id])]); ?>&nbsp; </div>
							 <div class="notice-desc"><?= $nl->notice_description; ?> </div>
						</div>					          
					</div>
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
                            <div class="box box-info">
                                <div class="box-header with-border">
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
		                                                <img src="<?= $el->getEmpPhoto($el->emp_photo); ?>" class="img-circle" alt="no image" width="40px" height="40px">
		                                            </div>
							<h3 class="box-title"><?php echo $el->getEmpName(); ?>&nbsp;
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
                            <div class="box box-primary">
                                <div class="box-header with-border">
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
                                            <?php $stuCount = app\modules\student\models\stuMaster::find()->where(['stu_master_course_id' => $cl->course_id, 'is_status' => 0])->count();?>
					    <span class="notification-container pull-right text-teal" title="<?= $stuCount; ?> Students"><i class="fa fa-users"></i><span class="label label-info notification-counter"><?= $stuCount; ?></span></span>
                                        </li>
				     <?php endforeach; ?>
                                    </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->

