<!doctype html>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;

$admin = array_keys(Yii::$app->AuthManager->getRolesByUser(Yii::$app->user->id));
?>
<script>
$(document).ready(function(){
     $('input[type=file]').bootstrapFileInput();
});
</script>
<?php
if(count($s_doc_data) == count($docs))
	$st = "display:none";
else
	$st = "display:block";
	
	if(Yii::$app->user->can('/employee/emp-master/adddocs') && (Yii::$app->session->get('emp_id') == $_REQUEST['id']) || in_array('SuperAdmin',$admin) || Yii::$app->user->can("updateAllEmpInfo")) :
?>
<div class="col-xs-12 col-lg-12 no-padding" style="<?= $st; ?>">
  <div class="row">
	  <div class="col-xs-12">
	    <h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<i class="fa fa-upload"></i> <?= Html::encode('Remaining Uploaded Documents') ?>
	     </h4>
	  </div><!-- /.col -->
  </div>


<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-default'; ?> box view-item col-xs-12 col-lg-12">
       <div class="emp-docs-form">       
	<?php  $form = ActiveForm::begin([
		'id' => 'emp-docs-form',
		'action' => ['adddocs'],
		'options' => ['enctype' => 'multipart/form-data',],
		'fieldConfig' => [
		    'template' => "{label}{input}{error}",
		],
	 	]); 

		$query= new \yii\db\Query();
		$query -> select('emp_docs_category_id')
		       -> from('emp_docs ed')
		       -> join('join',
			'document_category dc', 'dc.doc_category_id = ed.emp_docs_category_id')
			->where('ed.emp_docs_emp_master_id = '.$model->emp_master_id);
		$command=$query->createCommand();
		$doc_id=$command->queryColumn();

		?>
	<?php foreach($docs as $dc=>$v) : 

		if(in_array($v['doc_category_id'], $doc_id))
			continue;
		else
		{
	?>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="background-color:#f4f4f4; border-bottom:2px solid #ddd;margin-bottom:2%;padding:1%">
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($emp_docs, 'emp_docs_category_id_temp['.$v['doc_category_id'].']')->textInput(['maxlength' => 100, 'value' => $v['doc_category_name'], 'readOnly' => true]) ?>
			<?= $form->field($emp_docs, 'emp_docs_category_id['.$v['doc_category_id'].']', ['template' => "{input}"])->hiddenInput(['value' => $v['doc_category_id']]); ?>
		</div>			

		    <div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($emp_docs, 'emp_docs_details['.$v['doc_category_id'].']')->textInput(['maxlength' => 100]) ?>
			<?= $form->field($emp_docs, 'emp_docs_emp_master_id', ['template' => "{input}"])->hiddenInput(['value' => $model->emp_master_id]); ?>
		    </div>

		 		
		  <div class="col-xs-12 col-sm-4 col-lg-4 no-padding">
			<div class="col-lg-10 col-sm-6 col-md-10">
			    <?= $form->field($emp_docs, 'emp_docs_path['.$v['doc_category_id'].']')->fileInput(['data-filename-placement' => "inside",]); ?>
			</div>
		 </div>
	 </div>
	<?php
		}
	     endforeach; 
	?>
	 <div class="form-group col-xs-12 col-sm-3" style="<?= $st; ?>;margin-top: 10px;">
		<?= Html::submitButton('<i class="fa fa-upload"></i> Upload', ['class' => $emp_docs->isNewRecord ? 'btn btn-success btn-block' : 'btn btn-primary btn-block']) ?>
    </div>
	<?php ActiveForm::end(); ?>
    </div>
  </div>
</div>	
              
<?php  endif; ?>
