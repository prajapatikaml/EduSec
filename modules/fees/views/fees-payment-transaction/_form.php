<script>
$(document).ready(function(){
	var chkvalue = $('#feespaymenttransaction-fees_pay_tran_mode').val();
	if(chkvalue==1) {
		$(".cheque-data").hide();
		$(".cash-data").show();
	} 
	else {
		//$("#cheque-data").css("display","block");
		$(".cheque-data").show();
		$(".cash-data").hide();
	}
	$("#feespaymenttransaction-fees_pay_tran_mode").change(function(){
		var chkvalue = $('#feespaymenttransaction-fees_pay_tran_mode').val();
		if(chkvalue==1) {
			$(".cheque-data").hide();
			$(".cash-data").show();
		} 
		else {
			$(".cheque-data").show();
			$(".cash-data").hide();
		}
	});
});

</script>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
?>

<?php if(Yii::$app->session->hasFlash('feeserror')) : ?>
<div class="alert-danger alert">
	<?= Yii::$app->session->getFlash('feeserror'); ?>
</div>
<?php endif; ?>

<div class="col-xs-12 col-lg-12">

<!------------Start Display Block Of Student Details----------->

  <div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box col-xs-12 col-lg-12 no-padding">
   <div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-user"></i><sub><i class="fa fa-info-circle"></i></sub> Student Details</h3>
   </div>
   <div class="box-body no-padding">
    <table class="table">
	<col class="col-sm-2">
  	<col class="col-sm-2">
	<col class="col-sm-8">
	<?php 
	      $imgData = \app\modules\student\models\StuInfo::getStuPhoto($stuData->stuMasterStuInfo->stu_photo);
	      $displayImg = Html::img($imgData, ['alt'=>'No Image', 'class'=>'img-circle edusec-img-disp']); ?> 
	<tr class="visible-xs text-center">
		<td colspan="2"><?= $displayImg ?></td>
	</tr>
	<tr>
		<td rowspan="5" class="hidden-xs"><?= $displayImg ?></td>
		<th>Name</th>
		<td><?php echo $stuData->stuMasterStuInfo->name; ?></td>
	</tr>
	<tr>
		<th><?php echo $stuData->getAttributeLabel('stu_master_course_id'); ?></th>
		<td><?php echo $stuData->stuMasterCourse->course_name; ?></td>
	</tr>
	<tr>
		<th><?php echo $stuData->getAttributeLabel('stu_master_batch_id'); ?></th>
		<td><?php echo $stuData->stuMasterBatch->batch_name; ?></td>
	</tr>
	<tr>
		<th><?php echo $stuData->getAttributeLabel('stu_master_section_id'); ?></th>
		<td><?php echo $stuData->stuMasterSection->section_name; ?></td>
	</tr>
	<tr>
		<th><?php echo $stuData->getAttributeLabel('stu_master_stu_status_id'); ?></th>
		<td><?php echo (empty($stuData->stuMasterStuStatus->status_name) ? "General/Default" : $stuData->stuMasterStuStatus->status_name); ?></td>
	</tr>
    </table>
   </div>
  </div>

<!---End Display Block Of Student Details--->

<!---Start Display Block For Fees Collection Category Details--->
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box col-xs-12 col-lg-12 no-padding">
<div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-inr"></i><sub><i class="fa fa-info-circle"></i></sub> Fees Collection Category :  <?php echo $FccModel->fees_collect_name;?></h3>
</div>
<div class="box-body table-responsive">
<?php
$totalAmount = $totalPay = 0;
$feesDetails = \app\modules\fees\models\FeesCategoryDetails::find()->where(['fees_details_category_id' => $FccModel->fees_collect_category_id, 'is_status'=>0])->asArray()->all();
	echo '<table class="table table-bordered tbl-pay-fees">';
	echo '<col class="col-xs-1">';
  	echo '<col class="col-xs-9">';
	echo '<col class="col-xs-2">';
	echo '<tr>';
	echo '<th class="">SI No.</th>';
	echo '<th>Fees Details</th>';
	echo '<th>Amount</th>';
	echo '</tr>';
	foreach($feesDetails as $key=>$value) {
		echo '<tr>';
		echo '<td>'.($key+1).'</td>';	
		echo '<td>'.$value['fees_details_name'].'</td>';
		echo '<td>'.$value['fees_details_amount'].'</td>';
		echo '</tr>';
		$totalAmount+=$value['fees_details_amount'];
	}
	echo '<tr><th colspan=2 class="text-right col-md-9">Total Amount</th><td>'.$totalAmount.'</td></tr>';
	echo '<tr><th colspan=2 class="text-right">Total Paid Fees</th><td>'.$totalPay = $model->getStuTotalPayFees($stuData->stu_master_id, $FccModel->fees_collect_category_id).'</th></tr>';
	echo '<tr class="warning"><th colspan=2 class="text-right">Total Unpaid Fees</th><td>'.($totalAmount-$totalPay).'</td></tr>';
	echo '</table>';
?>	
<?php
	$collectOn = true;
	$printOn = false;
	if(($totalAmount-$totalPay)==0 && $model->isNewRecord) {
		$collectOn = false;
		echo '<style>.chk-cash { display:none } </style>';
	}
	$chkFees = $model->getStuTotalPayFees($stuData->stu_master_id, $FccModel->fees_collect_category_id);
	if(!empty($chkFees)) 
		$printOn = true;
?>

    <?php $form = ActiveForm::begin([
			'id'=>'fees-collect-form',
			'errorSummaryCssClass' => 'error-summary text-red',
			'fieldConfig' => [
			    'template' => "{label}{input}{error}",
			]]); 
    ?>
	<?= $form->errorSummary($model);?>

	<!---If select payment mode cash to show this block--->
	<div class="col-xs-12 col-sm-12 col-lg-12 no-padding chk-cash">
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_mode')->dropDownList(['1'=>'Cash', '2'=>'Cheque']);?>
		</div>

		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_date')->widget(yii\jui\DatePicker::className(),
		    [
			'model'=>$model,
			'attribute'=>'fees_pay_tran_date',
			'clientOptions' =>[
				'dateFormat' => 'dd-mm-yyyy',
				'changeMonth'=> true,
				'yearRange'=>(date('Y')-5).':'.(date('Y')+5),
				'changeYear'=> true,
				'readOnly'=>true,
				'autoSize'=>true,
				'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",
			],
			'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('fees_pay_tran_date')
			 ],
		    ]) ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_amount')->textInput(['maxlength' => 10, 'placeholder' => $model->getAttributeLabel('fees_pay_tran_amount')]) ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-lg-12 no-padding cash-data">
		<div class="col-xs-12 col-sm-4 col-lg-4">
			
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			 
		</div>
	</div>	
	<!--End payment mode cash--->

	<div class="col-xs-12 col-sm-12 col-lg-12 no-padding cheque-data">
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_cheque_no')->textInput(['placeholder' => $model->getAttributeLabel('fees_pay_tran_cheque_no')]) ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_bank_id')->dropDownList(ArrayHelper::map(app\modules\fees\models\BankMaster::find()->where(['is_status'=>0])->all(), 'bank_master_id', 'bank_master_name'), ['prompt'=>'Select Bank']) ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_bank_branch')->textInput(['placeholder' => $model->getAttributeLabel('fees_pay_tran_bank_branch')]) ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-lg-12 no-padding cheque-data">
		<div class="col-xs-12 col-sm-4 col-lg-4">
			<?= $form->field($model, 'fees_pay_tran_cheque_date')->widget(yii\jui\DatePicker::className(),
			[
			'model'=>$model,
			'attribute'=>'fees_pay_tran_cheque_date',
			'clientOptions' =>[
				'dateFormat' => 'dd-mm-yyyy',
				'changeMonth'=> true,
				'yearRange'=>(date('Y')-5).':'.(date('Y')+5),
				'changeYear'=> true,
				'readOnly'=>true,
				'autoSize'=>true,
				'buttonImage'=> Yii::$app->homeUrl."images/calendar.png",
			],
			'options'=>[
				'class'=>'form-control',
				'placeholder' => $model->getAttributeLabel('fees_pay_tran_cheque_date')
			 ],
			]) ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-4 col-lg-4"></div>
	</div>
	<!--End cheque related field-->	
 
</div><!---End box-body div---->
<div class="box-footer">
	<div class="pull-right" style="padding-bottom:10px">
	<?php if($collectOn) { echo Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus-circle"></i> Take Fees' : '<i class="fa fa-pencil-square-o"></i> Update Fees', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-info']); } ?>
		     
	<?php if($printOn & $model->isNewRecord) { echo Html::a('<i class="fa fa-print"></i> Print receipt',['print-common-receipt', 'sid'=>$stuData->stu_master_id, 'fcid'=>$FccModel->fees_collect_category_id], ['class' => 'btn btn-warning', 'target'=>'_blank']); } ?>

	<?php if(!$model->isNewRecord) { echo Html::a('Cancel',['pay-fees', 'sid'=>$stuData->stu_master_id, 'fcid'=>$FccModel->fees_collect_category_id], ['class' => 'btn btn-default']); } ?>
	</div>
</div>
</div><!---End box div---->

<?php ActiveForm::end(); ?>
<!----End Display Block For Fees Collection Category Details--->


<!---Start Student Payment History Block--->
<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> box col-xs-12 col-lg-12 no-padding">
<div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-inr"></i><sup><i class="fa fa-clock-o"></i></sup> Payment History</h3>
</div>
<div class="box-body table-responsive no-padding">
<?php
$stuFeesData = app\modules\fees\models\FeesPaymentTransaction::find()->where(['fees_pay_tran_stu_id'=>$stuData->stu_master_id, 'fees_pay_tran_collect_id'=>$FccModel->fees_collect_category_id, 'is_status'=>0]);
$dataProvider = new ActiveDataProvider([
	'query' =>$stuFeesData,
	'sort' => [
		'defaultOrder' => [
			'fees_pay_tran_id' => SORT_DESC, 
		],
	],
	'pagination' => [
		'pageSize' => 10,
	],
]);
\yii\widgets\Pjax::begin(['enablePushState'=>FALSE]); 
echo GridView::widget([
	'dataProvider' => $dataProvider,
	'layout' => "{items}\n{pager}",
	'showOnEmpty'=>true,
	'emptyText'=>'No fees results found.',
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'fees_pay_tran_id',
		[
			'attribute'=>'fees_pay_tran_date',
			'value'=>function($data) {
				return Yii::$app->dateformatter->getDateDisplay($data['fees_pay_tran_date']);
			}
		],
		[
			'attribute'=>'fees_pay_tran_mode',
			'value'=>function($data) {
				return ($data->fees_pay_tran_mode==1) ? "Cash" : "Cheque";
			}
		],
		[
			'attribute'=>'fees_pay_tran_cheque_no',
			'value'=>function($data) {
				return (!empty($data->fees_pay_tran_cheque_no) ? $data->fees_pay_tran_cheque_no : "-");
			}
		],
		[
			'attribute'=>'fees_pay_tran_bank_id',
			'value'=>function($data) { 
					return (!empty($data->feesPayTranBank->bank_master_name) ? $data->feesPayTranBank->bank_master_name : "-");
				}
		],
		'fees_pay_tran_bank_branch',
		'fees_pay_tran_amount',
		[
			'class' => 'app\components\CustomActionColumn',
			'template'=>'{update} {delete}',
		],
	],
]);
\yii\widgets\Pjax::end(); 
?>
</div><!---End Pannel Body Of Student Payment History--->
</div><!---End Payment History box Block--->

<!--/div--> <!--------End responcive div tag------>

<!--/div-->
</div>
