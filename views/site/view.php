<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchRadio;

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = $model->stuMasterStuInfo->stu_first_name." ".$model->stuMasterStuInfo->stu_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Student Master', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if(\Yii::$app->session->hasFlash('file_upload_err')) 
      {
?>
<div class="bg-danger text-danger" style = "padding:10px">
		<?php echo \Yii::$app->session->getFlash('file_upload_err'); ?>
</div>
<?php }  ?>
<style>
.dropdown {
    float: left;
    padding-right: 4px;
}
.info{
    /*border-top-color:#C73213 !important;*/
}
</style>

<script>
	$( document ).ready(function() {
		var editLinkPath = '<?php echo Yii::$app->homeUrl; ?>';

		  $("#personal-tab").click(function(event) {
		      $('#update-data').attr('href', editLinkPath + 'student/stu-master/update?sid=' + '<?php echo $_REQUEST["id"]; ?>' + '&tab=personal');
		      $('#update-data').show();
		      $('#update-guard-data').css('display','none');
		 });

		 $("#academic-tab").click(function(event) {
		      $('#update-data').attr('href', editLinkPath + 'student/stu-master/update?sid=' + '<?php echo $_REQUEST["id"]; ?>' + '&tab=academic');
		      $('#update-data').show();
		      $('#update-guard-data').css('display','none');
		 });

		 $("#guardians-tab").click(function(event) {
		      $('#update-data').attr('href', editLinkPath + 'student/stu-master/update?sid=' + '<?php echo $_REQUEST["id"]; ?>' + '&tab=guardians');
		      $('#update-data').hide();
		      $('#update-guard-data').css('display','');
		 });

		$("#address-tab").click(function(event) {
		      $('#update-data').attr('href', editLinkPath + 'student/stu-master/update?sid=' + '<?php echo $_REQUEST["id"]; ?>' + '&tab=address');
		      $('#update-data').show();
		      $('#update-guard-data').css('display','none');
		 });


		 $("#documents-tab").click(function(event) {
		      $('#update-data').attr('href', editLinkPath + 'student/stu-master/update?sid=' + '<?php echo $_REQUEST["id"]; ?>' + '&tab=documents');
		      $('#update-data').hide();
		      $('#update-guard-data').css('display','none');
		 });

	});

// ---- Toggle Button ----

/*	$( document ).ready(function() {
		$("[name='change-color-switch']").bootstrapSwitch();
	});*/
// ---- select any one toggle
/*	$( document ).ready(function() {
		$("input:checkbox").on('click', function() {
			  // in the handler, 'this' refers to the box clicked on
			  var $box = $(this);
			  if ($box.is(":checked")) {
			    // the name of the box is retrieved using the .attr() method
			    // as it is assumed and expected to be immutable
			    var group = "input:checkbox[name='" + $box.attr("name") + "']";
			    // the checked state of the group/box on the other hand will change
			    // and the current value is retrieved using .prop() method
			    $(group).prop("checked", false);
			    $box.prop("checked", true);
			  } else {
			    $box.prop("checked", false);
			  }
		});
	});
*/	
</script>

<script type="text/javascript">

	// **** Update Status of is_emp_contact on student Guardian tab ****
	$(document).ready(function(){
		$( "input:radio[name='is_emg_contact']" ).click(function(){
	    		var st_id = this.value;
			var sid = $( this ).attr( "sid" );
			var guard_id = $( this ).attr( "guard_id" );	
			$.ajax({
				type: "POST",
				url: "emg-change-status",
				data: "&sid=" + sid + "&guard_id=" + guard_id,
				success: function(result){
					//window.location = 'index';
				}
			});
		});
	});

	// **** Display Selected Tab after Pafe Refrash/Reload ****
	$(document).ready(function(){
		$('#profileTab a').click(function (e) {
			if($(this).children().length == 0) { 
				var keys = $(this).parent().attr('id');
				if(keys == 'photo'  || keys == 'update-data' || keys == 'update-guard-data' || keys == 'export-pdf')
			      		return true; 
			}
			else {
				e.preventDefault();
			 	$(this).tab('show');
			}
    		});
	// store the currently selected tab in the hash value
		$("ul.nav-pills > li > a").on("shown.bs.tab", function (e) {
			var id = $(e.target).attr("href").substr(1);
			window.location.hash = id;
    		});
	// on load of the page: switch to the currently selected tab
		var hash = window.location.hash;
		$('#profileTab a[href="' + hash + '"]').tab('show');
	});
</script>

<style>
.edusec-img-disp {
	border: 5px solid #fff;
	box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
	width:120px;
	height:120px;
	margin-bottom: 5%;
}
.nav-tabs {
    border-bottom: 3px solid #00C0EF;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
   background:#00C0EF;
   color:#fff;	
}
.nav > li > a:hover, .nav > li > a:focus {
    background: none;
    border:1px solid #00C0EF;
}
.edusec-profile-label {
    background: #F4F4F4;
    border-bottom: 1px solid #ddd;
    padding:12px;
}
.edusec-profile-text {
    background: #fff;
    border-bottom: 1px solid #ddd;
    padding:12px;
}
.edusec-stu-emg-gur .form-group {
    float:right;
    margin-bottom:0;
}
.edusec-emg-ct-label {
   float: left;
   font-weight: bold;
   margin-right: 5px;
   margin-top: 4px;
}
.edusec-border-bottom-warning {
  border-bottom: 1px solid #f39c12;
}
</style>


<?php 
	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/responsive-tabs.js', ['position' => \yii\web\View::POS_HEAD, 'depends'=>['yii\bootstrap\BootstrapPluginAsset']]);
	
?>


<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
		<i class="fa fa-globe"></i> Student Profile
		<div class="pull-right"><?= Html::a('<i class="fa fa-file-pdf-o"></i> Generate PDF', ['export-data/student-profile-pdf', 'sid' => $model->stu_master_id], ['class' => 'btn btn-warning', 'id' => 'export-pdf', 'target' => 'blank']) ?></div>
	</h2>
  </div><!-- /.col -->
</div>


<div class="row">
	<div class="col-md-3">
		<div class="col-md-12 text-center">
			<?= Html::a(Html::img(Yii::$app->homeUrl."data/stu_images/".$info->stu_photo,['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp']), ['stu-photo', 'sid'=>$model->stu_master_id]); ?>
		</div>
		<table class="table">
			<tr>
				<th>Student No</th>
				<td><?= Html::encode($info->stu_unique_id) ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?= Html::encode($this->title) ?></td>
			</tr>
			<tr>
				<th>Course</th>
				<td><?= $model->stuMasterCourse->course_name ?></td>
			</tr>
			<tr>
				<th><?= $info->getAttributeLabel('stu_email_id') ?></th>
				<td><?= Html::encode($info->stu_email_id) ?></td>
			</tr>
			<tr>
				<th><?= $info->getAttributeLabel('stu_mobile_no') ?></th>
				<td><?= $info->stu_mobile_no ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<?php if($model->is_status==0) : ?>
					<span class="label label-primary">Active</span>
					<?php else : ?>
					<span class="label label-primary">InActive</span>
					<?php endif; ?>
				</td>
			</tr>
		</table>
		<div class="col-md-12 text-center">
			<h4>Profile Complitation Status</h4>
			60%
		</div>
	</div>

	<div class="col-md-9">
		<ul class="nav nav-tabs responsive" id = "profileTab">
			<li class="active" id = "personal-tab"><a href="#personal" data-toggle="tab"><i class="fa fa-globe"></i> Personal</a></li>
			<li id = "academic-tab"><a href="#academic" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Academic</a></li>
			<li id = "guardians-tab"><a href="#guardians" data-toggle="tab"><i class="fa fa-user"></i> Guardians</a></li>
			<li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-map-marker"></i> Address</a></li>
			<li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i> Documents</a></li>
		</ul>
		 <div id='content' class="tab-content responsive">
			<div class="tab-pane active" id="personal">
				<?= $this->render('_tab_stu_personal', ['info' => $info, 'model' => $model]) ?>	
			</div>
			<div class="tab-pane" id="academic">
				<?= $this->render('_tab_stu_academic', ['info' => $info, 'model' => $model]) ?>	
			</div>
			<div class="tab-pane" id="guardians">
				<?= $this->render('_tab_stu_guardians', ['guardian'=>$guardian, 'model'=>$model]) ?>	
			</div>
			<div class="tab-pane" id="address">
				<?= $this->render('_tab_stu_address', ['address' => $address]) ?>	
			</div>
			<div class="tab-pane" id="documents">
				<?= $this->render('_tab_stu_documents', ['stu_docs' => $stu_docs, 'model'=>$model]) ?>	
			</div>
		</div>
	</div>

     </div> <!---End Row Div--->

<script type="text/javascript">
  (function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);
</script>


<!--  POP UP Window for Guardian -->
<?php
	yii\bootstrap\Modal::begin([
		'id' => 'guardModal',
		'header' => "<h3>Update Guardian</h3>",
	]);
		
 	yii\bootstrap\Modal::end(); 
?>
<script>
   function updateGuard(stu_guard_id, sid, tab) {
      $.ajax({
          type:'POST',
          url:'<?= Yii::$app->request->baseUrl ?>/student/stu-master/update?stu_guard_id='+stu_guard_id+'&sid='+sid+'&tab='+tab,
          success: function(data)
                   {
		       $(".modal-body").addClass("row");
                       $('.modal-body').html(data);
                       $('#guardModal').modal();

                   }
      });
   }
</script>
