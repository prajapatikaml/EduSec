<?php use yii\helpers\Html; ?>
<?php $empSession =  Yii::$app->session->get('emp_id');
$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id) );
$role = Yii::$app->AuthManager->getRoles();
?>
<!---Start Permenant Address Block--->
<div class="row">
  <div class="col-xs-12">
	<h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<i class="fa fa-files-o"></i> <?= Html::encode('Uploaded Documents') ?>
	</h4>
  </div><!-- /.col -->
</div>

<?php
      if(Yii::$app->user->can("/employee/emp-master/change-status") || Yii::$app->user->can("/employee/emp-master/docs-download") || Yii::$app->user->can("/employee/emp-master/delete-doc")) {
	$display = "";	
      }
      else {
	$display = "hidden";
      }
?>
<div class="table-responsive disp-doc">

<table class="table table-bordered">
<tr>
	<th class="text-center"><?= Html::activeLabel($emp_docs, 'emp_docs_category_id') ?></th>
	<th class="text-center"><?= Html::activeLabel($emp_docs, 'emp_docs_details') ?></th>
	<th class="text-center"><?= Html::activeLabel($emp_docs, 'emp_docs_status') ?></th>
	<th class="text-center <?= $display ?>" style="width: 34%;"><?= Html::encode('Action') ?></th>
</tr>
<?php 
$s_doc_data = app\modules\employee\models\EmpDocs::find()->where(['emp_docs_emp_master_id' => $_REQUEST['id']])->join('join','document_category dc', 'dc.doc_category_id = emp_docs_category_id AND dc.is_status <> 2')->all();
if(!empty($s_doc_data)) {

foreach($s_doc_data as $d_data) :
?>
<tr>
	<td class="text-center"><?= ($d_data->emp_docs_category_id) ? $d_data->empDocsCategory->doc_category_name : "" ?></td>
	<td class="text-center"><?= ($d_data->emp_docs_details) ? $d_data->emp_docs_details : ""?></td>
	<?php $d = ''; $s = '';?>
	<td class="text-center"><?php if($d_data->emp_docs_status == 1) { ?>
		<span class="label label-success">Approved</span>
		<?php $d = 'display:none'; $s = "display:block";  ?>
		<?php } elseif($d_data->emp_docs_status == 2) { ?>
		<span class="label label-danger">Disapproved</span>
		<?php $d = 'display:block'; $s = "display:none"; ?>
		<?php } else { ?>
		<span class="label label-info">Pendding</span>
		<?php } ?>
	</td>

     <td class="text-center <?= $display ?>">
	<div class="col-lg-12 no-padding">
	<?php if(Yii::$app->user->can("/employee/emp-master/change-status")&& ($_REQUEST['id'] == Yii::$app->session->get('emp_id')) || (in_array("SuperAdmin", $admin)) || Yii::$app->user->can("updateAllEmpInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<div class="dropdown" style="width:100%">
		  <button class="btn-block btn-sm btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		    Action
		    <span class="caret"></span>
		  </button>

		  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		    <li role="presentation" style="<?= $d ?>"><?= Html::a('Approved', ['change-status', 'emp_doc' => $d_data->emp_docs_id, 'eid' =>$d_data->emp_docs_emp_master_id, 'd_status' => 'APPROVED'], ['class' => 'btn btn-success btn-block', 'role' => 'menuitem']) ?></li>
		    <li role="presentation" style="<?= $s ?>"><?= Html::a('Disapproved', ['change-status', 'emp_doc' => $d_data->emp_docs_id, 'eid' =>$d_data->emp_docs_emp_master_id, 'd_status' => 'DISAPPROVED'], ['class' => 'btn btn-warning btn-block', 'role' => 'menuitem']) ?></li>	

		  </ul>
	      </div>
	</div>
	<?php }
	      if(Yii::$app->user->can("/employee/emp-master/docs-download")&& ($_REQUEST['id'] == Yii::$app->session->get('emp_id')) || (in_array("SuperAdmin", $admin)) || Yii::$app->user->can("updateAllEmpInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<?= Html::a('<span class = "glyphicon glyphicon-download"></span>', ['docs-download', 'emp_doc_id' => $d_data->emp_docs_id,], ['class' => 'btn-sm btn btn-block btn-primary', 'title' => '', 'data' => ['method' => 'post']]) ?>
	</div>
	<?php }
	      if(Yii::$app->user->can("/employee/emp-master/delete-doc")&& ($_REQUEST['id'] == Yii::$app->session->get('emp_id')) || (in_array("SuperAdmin", $admin)) || Yii::$app->user->can("updateAllEmpInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<?=  Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete-doc', 'emp_doc_id' => $d_data->emp_docs_id], [
		    'class' => 'btn-sm btn btn-danger btn-block',
		    'data' => [
			'confirm' => 'Are you sure you want to delete this item?',
			'method' => 'post',
		    ],
		])  ?>
	<?php } ?>
	</div>
	</div>
    </td>

</tr>	
<?php
endforeach;
}
else { ?>
<tr>
	<th class="text-center" colspan="4"><?= Html::encode('No Documents Uploaded..') ?></th>
</tr>		
<?php	}
echo "</table></div>";
$docs = app\models\DocumentCategory::find()->andWhere("(doc_category_user_type = '0' OR doc_category_user_type = 'E')")->andWhere(['is_status'=>0])->all();
?>

<?= $this->render('emp_docs_add', ['emp_docs' => $emp_docs, 'model' => $model, 'docs' => $docs, 's_doc_data' => $s_doc_data]) ?>
