<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\switchinput\SwitchRadio;

use app\assets_b\EduSecUserProfile;
EduSecUserProfile::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\student\models\StuMaster */

$this->title = $model->stuMasterStuInfo->stu_first_name." ".$model->stuMasterStuInfo->stu_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Student', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(\Yii::$app->session->hasFlash('file_upload_err')) : ?>
<div class="bg-danger text-danger" style = "padding:10px">
	<?php echo \Yii::$app->session->getFlash('file_upload_err'); ?>
</div>
<?php endif; ?>

<section class="content-header">
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
		<i class="fa fa-user"></i> Student Profile
		<div class="pull-right">
		<?php if(Yii::$app->user->can("/student/export-data/student-profile-pdf")) { ?>
		    <?= Html::a('<i class="fa fa-file-pdf-o"></i> Generate PDF', ['export-data/student-profile-pdf', 'sid' => $model->stu_master_id], ['class' => 'btn-sm btn btn-warning', 'id' => 'export-pdf', 'target' => 'blank']) ?>
		<?php } ?>
		</div>
	</h2>
  </div><!-- /.col -->
</div>
</section>


<section class="content edusec-user-profile">
<div class="row">
	<div class="col-lg-3 table-responsive edusec-pf-border no-padding" style="margin-bottom:15px">
		<div class="col-md-12 text-center">
			<?= Html::img($info->getStuPhoto($info->stu_photo),['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp']); ?>
		<div class="photo-edit">
			<?php if(Yii::$app->user->can("/student/stu-master/stu-photo")) { ?>
			<?= Html::a('<i class="fa fa-pencil"></i>', ['stu-photo', 'sid'=>$model->stu_master_id], ['class'=>'photo-edit-icon', 'title'=>'Change Profile Picture', 'data-toggle' => 'modal', 'data-target' => "#photoup"]) ?>
			<?php } ?>
		</div>
		</div>
		<table class="table table-striped">
			<tr>
				<th><?= $info->getAttributeLabel('stu_unique_id') ?></th>
				<td><?= Html::encode($info->stu_unique_id) ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?= Html::encode($this->title) ?></td>
			</tr>
			<tr>
				<th>Course</th>
				<td><?= $model->stuMasterCourse->course_alias ?></td>
			</tr>
			<tr>
				<th>Batch</th>
				<td><?= $model->stuMasterBatch->batch_name; ?></td>
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
					<span class="label label-success">Active</span>
					<?php else : ?>
					<span class="label label-danger">InActive</span>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</div>

	<div class="col-lg-9 profile-data">
		<ul class="nav nav-tabs responsive" id = "profileTab">
			<li class="active" id = "personal-tab"><a href="#personal" data-toggle="tab"><i class="fa fa-street-view"></i> Personal</a></li>
			<li id = "academic-tab"><a href="#academic" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Academic</a></li>
			<li id = "guardians-tab"><a href="#guardians" data-toggle="tab"><i class="fa fa-user"></i> Guardians</a></li>
			<li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-home"></i> Address</a></li>
			<li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i> Documents</a></li>
			 <?php if(!Yii::$app->session->get('stu_id')) : ?>
				<li id = "fees-tab"><a href="#fees" data-toggle="tab"><i class="fa fa-inr"></i> Fees</a></li>
			<?php endif; ?>
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
				<?= $this->render('_tab_stu_address', ['address' => $address, 'model'=>$model]) ?>	
			</div>
			<div class="tab-pane" id="documents">
				<?= $this->render('_tab_stu_documents', ['stu_docs' => $stu_docs, 'model'=>$model]) ?>	
			</div>
		 <?php if(!Yii::$app->session->get('stu_id')) : ?>
			<div class="tab-pane" id="fees">
				<?= $this->render('_tab_stu_fees', ['model' => $feesTranModel, 'FccModel'=>$feesCatModel, 'stuData'=>$model]) ?>	
			</div>
		<?php endif; ?>
		</div>
	</div>
     </div> <!---End Row Div--->
</section>

<!--  POP UP Window for Photo Upload/Update -->
<div class="modal fade col-xs-12 col-lg-12" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="photoup">
  <div class="modal-dialog">
    <div class="modal-content row">
    </div>
  </div>
</div>

<?php $this->registerJs("(function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);", yii\web\View::POS_END, 'responsive-tab'); ?>


<!--  POP UP Window for Guardian -->
<?php
	yii\bootstrap\Modal::begin([
		'id' => 'guardModal',
		'header' => "<h3>Update Guardian</h3>",
	]);
 	yii\bootstrap\Modal::end(); 
?>
<script>
/***
  * Start Update Gardian Jquery
***/
function updateGuard(stu_guard_id, sid, tab) {
	$.ajax({
	  type:'GET',
	  url:'<?= Url::toRoute(["stu-master/update"]) ?>',
	  data: { stu_guard_id : stu_guard_id, sid : sid, tab : tab },
	  success: function(data)
		   {
		       $(".modal-content").addClass("row");
		       $('.modal-body').html(data);
		       $('#guardModal').modal();

		   }
	});
}
</script>
