<?php 
use yii\helpers\Html;
$adminUser = array_keys(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
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
      if(Yii::$app->user->can("/student/stu-master/change-status") || Yii::$app->user->can("/student/stu-master/docs-download") || Yii::$app->user->can("/student/stu-master/delete-doc")) {
	$display = "";	
      }
      else {
	$display = "hidden";
      }
?>
<div class="table-responsive disp-doc">

<table class="table table-bordered">
<tr>
	<th class="text-center"><?= Html::activeLabel($stu_docs, 'stu_docs_category_id') ?></th>
	<th class="text-center"><?= Html::activeLabel($stu_docs, 'stu_docs_details') ?></th>
	<th class="text-center"><?= Html::activeLabel($stu_docs, 'stu_docs_status') ?></th>
	<th class="text-center <?= $display ?>" style="width: 34%;"><?= Html::encode('Action') ?></th>
</tr>
<?php
$s_doc_data = app\modules\student\models\StuDocs::find()->where(['stu_docs_stu_master_id' => $_REQUEST['id']])->join('join','document_category dc', 'dc.doc_category_id = stu_docs_category_id AND dc.is_status <> 2')->all();
if(!empty($s_doc_data)) {

foreach($s_doc_data as $d_data) :
?>
<tr>
	<td class="text-center"><?= ($d_data->stu_docs_category_id) ? $d_data->stuDocsCategory->doc_category_name : "" ?></td>
	<td class="text-center"><?= ($d_data->stu_docs_details) ? $d_data->stu_docs_details : ""?></td>
	<?php $d = ''; $s = '';?>
	<td class="text-center"><?php if($d_data->stu_docs_status == 1) { ?>
		<span class="label label-success">Approved</span>
		<?php $d = 'display:none'; $s = "display:block";  ?>
		<?php } elseif($d_data->stu_docs_status == 2) { 
		$d = 'display:block'; $s = "display:none"; ?>
		<span class="label label-danger">Disapproved</span>
		<?php } else { ?>
		<span class="label label-info">Pendding</span>
		<?php } ?>
	</td>

     <td class="text-center <?= $display ?>">
	<div class="col-lg-12 no-padding">
	<?php if(Yii::$app->user->can("/student/stu-master/change-status") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<div class="dropdown" style="width:100%">
		  <button class="btn-block btn-sm btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
		    Action
		    <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		    <li role="presentation" style="<?= $d ?>"><?= Html::a('Approved', ['change-status', 'stu_doc_id' => $d_data->stu_docs_id, 'sid' =>$d_data->stu_docs_stu_master_id, 'd_status' => 'APPROVED'], ['class' => 'btn btn-success btn-block', 'role' => 'menuitem']) ?></li>
		    <li role="presentation" style="<?= $s ?>"><?= Html::a('Disapproved', ['change-status', 'stu_doc_id' => $d_data->stu_docs_id, 'sid' =>$d_data->stu_docs_stu_master_id, 'd_status' => 'DISAPPROVED'], ['class' => 'btn btn-warning btn-block', 'role' => 'menuitem']) ?></li>			
		  </ul>
	      </div>
	</div>
	<?php }
	      if(Yii::$app->user->can("/student/stu-master/docs-download") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<?= Html::a('<span class = "glyphicon glyphicon-download"></span>', ['docs-download', 'stu_doc_id' => $d_data->stu_docs_id,], ['class' => 'btn-sm btn btn-block btn-primary', 'title' => '', 'data' => ['method' => 'post']]) ?>
	</div>
	<?php }
	      if(Yii::$app->user->can("/student/stu-master/delete-doc") && ($_REQUEST['id'] == Yii::$app->session->get('stu_id')) || (in_array("SuperAdmin", $adminUser)) || Yii::$app->user->can("updateAllStuInfo")) { ?>
	<div class="col-lg-4 col-xs-12 col-sm-4 col-md-4 no-padding">
		<?=  Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete-doc', 'stu_doc_id' => $d_data->stu_docs_id], [
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
$docs = app\models\DocumentCategory::find()->andWhere("(doc_category_user_type = '0' OR doc_category_user_type = 'S')")->andWhere(['is_status'=>0])->all();
?>

<?= $this->render('stu_documents', ['stu_docs' => $stu_docs, 'model' => $model, 'docs' => $docs, 's_doc_data' => $s_doc_data]) ?>
