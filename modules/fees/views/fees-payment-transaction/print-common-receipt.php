<?php 
use yii\helpers\Html;
?>
<html>
<head>
<title><?= $title ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl;?>/css/print-receipt.css" media="screen, print, projection" />
</head>
<body>

<div id="pcr">
<?php $orgData = \app\models\Organization::find()->asArray()->one(); ?>

<table class="table table-bordered table-main">
	<tr>
		<td colspan=3 class="text-left padding-left padding-right" style="border-bottom:1px solid #000;height:80px">
		<table>
			<tr>
				<td rowspan=2><?php echo Html::img(Yii::$app->urlManager->createUrl('/site/loadimage'), ['style'=>'width:70px; height:50px']); ?></td>
				<td class="text-left org-title"><?php echo $orgData['org_name']; ?></td>
			</tr>
			<tr><td class="text-left org-address"><?php echo $orgData['org_address_line1']; ?></td></tr>
		</table>
		</td>
	</tr>
	<tr>
		<th colspan=3 class="border-none"> 
			<?php $paidAmount = $model->getStuTotalPayFees($_GET['sid'], $_GET['fcid']);
			      $totalAmount = \app\modules\fees\models\FeesCategoryDetails::getFeeCategoryTotal($_GET['fcid']);
			      echo ($paidAmount<$totalAmount) ? "Partial Payment Fees Receipt" : "Fees Receipt";?>
		</th>
	</tr>
	<tr>
		<td class="text-left padding-left"><?php echo "<b>Student No : </b>".$stuData->stuMasterStuInfo->stu_unique_id;?></td>
		<td></td>
		<td class="text-right padding-right"><?php echo "<b>Receipt Date : </b>".Yii::$app->formatter->asDate(date('Y-m-d')); ?></td>
	</tr>
	<tr>
		<td colspan=3 class="text-left padding-left"><?php echo "<b>Name : </b>".$stuData->stuMasterStuInfo->name;?></td>
	</tr>
	<tr>
		<td colspan=3 class="text-left padding-left"><?php echo "<b>Course : </b>".$stuData->stuMasterCourse->course_name; ?></td>
	</tr>
	<tr>
		<td class="text-left padding-left"><?php echo "<b>Batch : </b>".$stuData->stuMasterBatch->batch_name; ?></td>
		<td></td>
		<td class="text-right padding-right"><?php echo "<b>Section : </b>".$stuData->stuMasterSection->section_name; ?></td>
	</tr>
	<tr>
		<th colspan=3 style="padding:1%;" class="border-none"><?php echo "Fees Collection Category : ".$FccModel->fees_collect_name; ?></th>
	</tr>
	<!-----Start fees collection category fees details description---->
	<tr>
		<td colspan=3 class="padding-left padding-right">
		<?php $totalAmount = 0;
		$feesDetails = \app\modules\fees\models\FeesCategoryDetails::find()->where(['fees_details_category_id' => $FccModel->fees_collect_category_id, 'is_status'=>0])->asArray()->all(); ?>
		<table border="1" class="table table-border" style="width:100%;">
			<tr class="header">
				<th>SI.No</th>
				<th>Fees Details</th>
				<th>Amount</th>
			</tr>
			<?php 
			foreach($feesDetails as $key=>$value) {
				echo '<tr>';
				echo '<td class="text-center">'.($key+1).'</td>';	
				echo '<td class="text-center">'.$value['fees_details_name'].'</td>';
				echo '<td class="text-center">'.$value['fees_details_amount'].'</td>';
				echo '</tr>';
				$totalAmount+=$value['fees_details_amount'];
			}
			?>
			<tr>
				<th class="text-right border-hide padding-right" colspan=2>Total Amount</th>
				<th><?php echo $totalAmount; ?></th>
			</tr>
			<tr>
				<th class="text-right border-hide padding-right" colspan=2>Total Paid Fees</th>
				<th><?php echo $paidAmount;?></th>
			</tr>
			<tr>
				<th class="text-right border-hide padding-right" colspan=2>Total Unpaid Fees</th>
				<th><?php echo ($totalAmount-$paidAmount); ?></th>
			</tr>
		</table>
		</td>
	</tr>
	<!---End fees collection category fees details description--->
	<!---Start payment history of this category--->
	<tr>
		<th class="border-none text-left padding-left" colspan=3 style="height:50px">Payment History</th>
	</tr>
	<tr>
		<td colspan=3 class="padding-left padding-right" style="padding-bottom:2%;">
		<?php $stuFeesData = app\modules\fees\models\FeesPaymentTransaction::find()->where(['fees_pay_tran_stu_id'=>$stuData->stu_master_id, 'fees_pay_tran_collect_id'=>$FccModel->fees_collect_category_id, 'is_status'=>0])->asArray()->all(); ?>
		<table class="table table-border" style="width:100%;">
			<tr class="header">
				<th>SI.No</th>
				<th>Recepit No</th>
				<th>Date</th>
				<th>Payment mode</th>
				<th>Cheque No</th>
				<th>Amount</th>
			</tr>
		<?php foreach($stuFeesData as $key=>$value) {
				echo '<tr>';
				echo '<td class="text-center">'.($key+1).'</td>';
				echo '<td class="text-center">'.$value['fees_pay_tran_id'].'</td>';
				echo '<td class="text-center">'.Yii::$app->formatter->asDate($value['fees_pay_tran_date']).'</td>';
				echo '<td class="text-center">'.(($value['fees_pay_tran_mode']==1) ? "Cash" : "Cheque").'</td>';
				echo '<td class="text-center">'.(!empty($value['fees_pay_tran_cheque_no']) ? $value['fees_pay_tran_cheque_no'] : "-").'</td>';
				echo '<td class="text-center">'.$value['fees_pay_tran_amount'].'</td>';
				echo '</tr>';
		      } ?>
		</table>
		</td>
	</tr>
	<!----End payment history of this category---->
	<!----------Start footer signation------------>
	<tr>
		<td colspan=3 class="text-right vcenter" style="height:80px;padding-right:12%;font-weight:bold;border-top:1px solid #000;">
			Signature :
		</td>
	</tr>
	<!----------End footer signation------------>
	

</table>
</div>
</body>
</html>
