<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = "Fees Collection";
$this->params['breadcrumbs'][] = ['label' => 'Fees', 'url'=>['/fees']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url'=>['collect']];

?>

<!---Start Select Fees Collection Category---> 
<div class="box-info box box-solid view-item col-xs-12 col-lg-12 no-padding">
    <div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
    </div>
    <div class="box-body no-padding">
	<?php $form = ActiveForm::begin([
		'id' => 'fees-collect-form',
		'fieldConfig' => [
			'template' => "{label}{input}{error}",
		],
	]); ?>

    	<div class="col-md-6">
		<?= $form->field($FccModel, 'fees_collect_batch_id')->dropDownList(ArrayHelper::map(app\modules\course\models\Batches::find()->where(['is_status'=>0])->all(), 'batch_id','batch_name', 'batchCourse.course_name'), 
		[
			'prompt'=>'Select Batch',
			'onchange'=>'
				$.get("'.Url::toRoute('dependent/get-fees-category').'", { id: $(this).val() } )
				.done(function( data ) {
				$( "#'.Html::getInputId($FccModel, 'fees_collect_category_id').'" ).html( data );
				}
			);'    
		]); 
		$fccData = [];
		if(!empty($FccModel->fees_collect_batch_id)) {
			$fccData = ArrayHelper::map(app\modules\fees\models\FeesCollectCategory::find()->where(['is_status'=>0, 'fees_collect_batch_id'=>$FccModel->fees_collect_batch_id])->all(), 'fees_collect_category_id', 'fees_collect_name');	
		}
	?>
	</div>

	<div class="col-md-6">
	<?= $form->field($FccModel, 'fees_collect_category_id')->dropDownList($fccData,
	[
		'prompt'=>'Select Fees Category',
		'onchange'=>'this.form.submit()',
	]); ?>
	</div>

	<?php ActiveForm::end(); ?>
    </div>
</div>
<!---End Select Fees Collection Category---> 

<?php 
if($dispStatus) :
	$totalAmount = $gTotalAmount = $gpayFees = $gActualCollect = $payFees = $actualCollect = 0;
	$feesDetails = \app\modules\fees\models\FeesCategoryDetails::find()->where(['fees_details_category_id' => $FccModel->fees_collect_category_id, 'is_status'=>0])->asArray()->all();
	$stuDataTmp = Yii::$app->db->createCommand("SELECT stu_master_id FROM stu_master WHERE stu_master_batch_id=".$FccModel->fees_collect_batch_id." AND is_status=0")->queryColumn();
	$payFeesTmp = Yii::$app->db->createCommand("SELECT fees_pay_tran_stu_id FROM fees_payment_transaction WHERE fees_pay_tran_batch_id=".$FccModel->fees_collect_batch_id." AND is_status=0 AND fees_pay_tran_collect_id=".$FccModel->fees_collect_category_id)->queryColumn();
	$stuData = array_unique(array_merge($stuDataTmp, $payFeesTmp));

	$feesData = \app\modules\fees\models\FeesPaymentTransaction::find()->where(['fees_pay_tran_batch_id' => $FccModel->fees_collect_batch_id, 'is_status'=>0])->asArray()->all();
	
?>

<!---Start display fees collection details---> 
<div class="box-primary box view-item col-xs-12 col-lg-12 no-padding">
   <div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-inr"></i> Fees Collection Details</h3>
   </div>
   <div class="box-body table-responsive no-padding">
   <?php
   	if(!empty($feesDetails)) {  
		echo '<table class="table">';
		echo '<col class="col-xs-1">';
		echo '<tr>';
		echo '<th class="text-center">SI No.</th>';
		echo '<th>Fees Details</th>';
		echo '<th>Description</th>';
		echo '<th>Amount</th>';
		echo '</tr>';
		foreach($feesDetails as $key=>$value) {
			echo '<tr>';
			echo '<td class="text-center">'.($key+1).'</td>';	
			echo '<td>'.$value['fees_details_name'].'</td>';
			echo '<td>'.$value['fees_details_description'].'</td>';
			echo '<td>'.$value['fees_details_amount'].'</td>';
			echo '</tr>';
			$totalAmount+=$value['fees_details_amount'];
		}
		echo '<tr><th colspan=3 class="text-right">Total Amount</th><th>'.$totalAmount.'</th></tr>';
		echo '</table>';
   	} else {
		echo '<div class="alert alert alert-danger" style="margin: 10px;">No Fees Data Available</div>';
	}
   ?>
   </div><!---./end box-body--->
</div><!---./end box--->

<!---Start display student list block---> 	
<div class="box-success box view-item col-xs-12 col-lg-12 no-padding">
   <div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-users"></i> Student Details</h3>
	<?php if(!empty($stuData)) : ?>
	<div class="box-tools pull-right"><?= Html::a('<i class="fa fa-file-pdf-o"></i> Generate PDF', ['export-fcc-wise-fees-pdf', 'fccid'=>$FccModel->fees_collect_category_id], ['class'=>'btn btn-sm btn-warning', 'target'=>'_blank', 'style'=>'color:#fff', 'data-method'=>'POST']) ?></div>
	<?php endif; ?>
   </div>
   <div class="box-body table-responsive no-padding">
   <?php
	if(!empty($stuData)) {
		echo '<table class="table table-striped">';
		echo '<tr>';
		echo '<th class="text-center">SI No.</th>';
		echo '<th>Student No</th>';
		echo '<th>Student Name</th>';
		echo '<th>Total Collection</th>';
		echo '<th>Paid Amount</th>';
		echo '<th>Unpaid Amount</th>';
		echo '<th>Action</th>';
		echo '</tr>';
		$sr = 1;
		foreach($stuData as $key=>$value) {
			$stuDetails = \app\modules\student\models\StuMaster::findOne($value);
			echo '<tr>';		
			echo '<td class="text-center">'.$sr++.'</td>';
			echo '<td>'.(!empty($stuDetails->stuMasterStuInfo->stu_unique_id) ? $stuDetails->stuMasterStuInfo->stu_unique_id : "(Not Set)").'</td>';
			echo '<td>'.$stuDetails->stuMasterStuInfo->name.'</td>';
			echo '<td>'.$totalAmount.'</td>';
			$payFees = $FptModel->getStuTotalPayFees($value, $FccModel->fees_collect_category_id);
			echo '<td>'.(!empty($payFees) ? $payFees : "0").'</td>';
			echo '<td>'.$actualCollect = ($totalAmount-$payFees).'</td>';
			echo '<td>'.Html::a('TakeFees', ['pay-fees', 'sid'=>$value, 'fcid'=>$FccModel->fees_collect_category_id], ["target"=>"_blank", 'class'=>'btn btn-block btn-primary']).'</td>';
			echo '</tr>';
			$gTotalAmount+=$totalAmount;
			$gpayFees+=$payFees;
			$gActualCollect+=$actualCollect;
		}
		echo '<tr class="bg-aqua"><th colspan=3 class="text-right">GRAND TOTAL </th>';
		echo '<th>'.$gTotalAmount.'</th>';
		echo '<th>'.$gpayFees.'</th>';
		echo '<th>'.$gActualCollect.'</th>';
		echo '<th></th></tr>';
		echo '</table>';	
	}
	else {
		echo '<div class="alert alert alert-danger" style="margin: 10px;">No student data available</div>';
	}
   ?>
   </div><!---./end box-body--->
</div><!---./end box--->

<?php endif; ?>
