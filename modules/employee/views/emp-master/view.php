<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\assets_b\EduSecUserProfile;
EduSecUserProfile::register($this);
?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
	

$this->title = $model->empMasterEmpInfo->emp_first_name." ".$model->empMasterEmpInfo->emp_last_name;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Manage Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!----------------------------------------------------------------------->
<section class="content-header">
<div class="row">
  <div class="col-xs-12">
	<h2 class="page-header">	
		<i class="fa fa-user"></i> Employee Profile
		<div class="pull-right">
		<?php if(Yii::$app->user->can("/employee/export-data/employee-profile-pdf")) { ?>
		    <?= Html::a('<i class="fa fa-file-pdf-o"></i> Generate PDF', ['export-data/employee-profile-pdf', 'eid' => $model->emp_master_id], ['class' => 'btn-sm btn btn-warning', 'id' => 'export-pdf', 'target' => 'blank']) ?>
		<?php } ?>
		</div>
	</h2>
  </div><!-- /.col -->
</div>
</section>

<section class="content edusec-user-profile">
<div class="row">
	<div class="col-md-3 table-responsive edusec-pf-border no-padding" style="margin-bottom:15px">
		<div class="col-md-12 text-center">
			<?= Html::img($info->getEmpPhoto($info->emp_photo), ['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp']); ?>
		<div class="photo-edit">
			<?php if(Yii::$app->user->can("/employee/emp-master/emp-photo") && (Yii::$app->session->get('emp_id') == $_REQUEST['id'])  || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")) { ?>
			<?= Html::a('<i class="fa fa-pencil"></i>', ['emp-photo', 'eid'=>$model->emp_master_id], ['class'=>'photo-edit-icon', 'title'=>'Change Profile Picture', 'data-toggle'=>"modal",
'data-target'=>"#basicModal"]) ?>
			<?php } ?>
		</div>
		</div>
		<table class="table table-striped">
			<tr>
				<th>Employee ID</th>
				<td><?= Html::encode($info->emp_unique_id) ?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?= Html::encode($this->title) ?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td><?= $model->empMasterDepartment->emp_department_alias ?></td>	
			</tr>
			<tr>
				<th>Designation</th>
				<td><?= (!empty($model->empMasterDesignation->emp_designation_alias) ? $model->empMasterDesignation->emp_designation_alias :"") ?></td>			
			</tr>
			<tr>
				<th>Category</th>
				<td><?= (!empty($model->empMasterCategory->emp_category_name) ? $model->empMasterCategory->emp_category_name : "") ?></td>		
			</tr>
			<tr>
				<th><?= Html::activeLabel($info, 'emp_mobile_no') ?></th>
				<td><?= (!empty($info->emp_mobile_no) ? $info->emp_mobile_no : "" )?></td>
			</tr>	
			<tr>
				<th><?= Html::activeLabel($info, 'emp_email_id') ?></th>
				<td><?= (!empty($info->emp_email_id) ? $info->emp_email_id : "") ?></td>
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

	<div class="col-md-9 profile-data">
		<ul class="nav nav-tabs responsive" id = "profileTab">
			<li class="active" id = "personal-tab"><a href="#personal" data-toggle="tab"><i class="fa fa-street-view"></i> Personal</a></li>
			<li id = "guardians-tab"><a href="#guardians" data-toggle="tab"><i class="fa fa-user"></i> Guardians</a></li>
			<li id = "address-tab"><a href="#address" data-toggle="tab"><i class="fa fa-home"></i> Address</a></li>
			<li id = "academic-tab"><a href="#otherinfo" data-toggle="tab"><i class="fa fa-cogs"></i>
 Other Info</a></li>
			<li id = "documents-tab"><a href="#documents" data-toggle="tab"><i class="fa fa-file-text"></i> Documents</a></li>
		</ul>
		 <div id='content' class="tab-content responsive">
			<div class="tab-pane active" id="personal">
				<?= $this->render('_tab_emp_personal',['info' => $info, 'model' => $model])?>	
			</div>
			<div class="tab-pane" id="guardians">
				<?= $this->render('_tab_emp_guardian', ['info'=>$info, 'model'=>$model]) ?>	
			</div>
			<div class="tab-pane" id="address">
				<?= $this->render('_tab_emp_address', ['address' => $address, 'model'=>$model]) ?>	
			</div>
			<div class="tab-pane" id="otherinfo">
				<?= $this->render('_tab_emp_otherinfo', ['info' => $info, 'model' => $model]) ?>	
			</div>
			<div class="tab-pane" id="documents">
				<?= $this->render('_tab_emp_documents', ['emp_docs' => $emp_docs, 'model'=>$model]) ?>	
			</div>
		</div>
	</div>
     </div> <!---End Row Div--->
</section>

<?php $this->registerJs("(function($) {
      fakewaffle.responsiveTabs(['xs', 'sm']);
  })(jQuery);", yii\web\View::POS_END, 'responsive-tab'); ?>


<!-- below code is for fancy box for update photo -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">            
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
