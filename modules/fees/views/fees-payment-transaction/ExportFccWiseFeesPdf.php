<?php 
use yii\helpers\Html;
?>
<html>
<head>
	<title>Fees Collection Category Wise PDF Report</title>
</head>
<body>
<?php
	$totalAmount = $gTotalAmount = $gpayFees = $gActualCollect = $payFees = $actualCollect = 0;
	$stuDataTmp = Yii::$app->db->createCommand("SELECT stu_master_id FROM stu_master WHERE stu_master_batch_id=".$FccModel->fees_collect_batch_id." AND is_status=0")->queryColumn();
	$payFeesTmp = Yii::$app->db->createCommand("SELECT fees_pay_tran_stu_id FROM fees_payment_transaction WHERE fees_pay_tran_batch_id=".$FccModel->fees_collect_batch_id." AND is_status=0 AND fees_pay_tran_collect_id=".$FccModel->fees_collect_category_id)->queryColumn();
	$stuData = array_unique(array_merge($stuDataTmp, $payFeesTmp));
	$feesData = \app\modules\fees\models\FeesPaymentTransaction::find()->where(['fees_pay_tran_batch_id' => $FccModel->fees_collect_batch_id, 'is_status'=>0])->asArray()->all();
	$totalAmountTmp = \app\modules\fees\models\FeesCategoryDetails::getFeeCategoryTotal($FccModel->fees_collect_category_id);
	$totalAmount = (!$totalAmountTmp) ? 0 : $totalAmountTmp; 
	
?>
<div class="grid-view">
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
			echo '</tr>';
			$gTotalAmount+=$totalAmount;
			$gpayFees+=$payFees;
			$gActualCollect+=$actualCollect;
		}
		echo '<tr class="bg-aqua"><th colspan="3" class="text-right">GRAND TOTAL </th>';
		echo '<th>'.$gTotalAmount.'</th>';
		echo '<th>'.$gpayFees.'</th>';
		echo '<th>'.$gActualCollect.'</th>';
		echo '</tr>';
		echo '</table>';	
	}
	else {
		echo '<div class="alert alert alert-danger">No student data available</div>';
	}
   ?>
</div>
</body>
</html>
