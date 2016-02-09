<?php
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = "Student Fees Data";
$this->params['breadcrumbs'][] = "Fees";
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<!--div class="table-responsive"-->
<!-----Start Display Block Of Student Details----->
<div class="col-xs-12">
  <div class="col-lg-4 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-inr"></i> <?= $this->title ?></h3></div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
  <div class="box-success box col-xs-12 col-lg-12 no-padding">
   <div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-user"></i><sub><i class="fa fa-info-circle"></i></sub> Student Details</h3>
   </div>
   <div class="box-body no-padding"> 
    <table class="table detail-view">
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
		<td><?php echo (empty($stuData->stuMasterStuStatus->status_name) ? "Regular" : $stuData->stuMasterStuStatus->status_name); ?></td>
	</tr>
     </table>
    </div>
  </div>
</div>

<!-----End Display Block Of Student Details----->

<!-----Start current batch fees details----->

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box box-info col-xs-12 col-lg-12 no-padding">
    <div class="box-header with-border"><h4 class="box-title"><i class="fa fa-inr"></i> Current Fees Details</h4></div>
    <div class="box-body table-responsive">
<?php 
$currFeesData = new ActiveDataProvider([
	'query' =>$FccModel->getBatchFeesCategory($stuData->stu_master_batch_id),
	'sort' => [
		'defaultOrder' => [
			'fees_collect_category_id' => SORT_DESC, 
		],
	],
	'pagination' => [
		'pageSize' => 10,
	],
]);
$currFeesData->sort = false;
echo GridView::widget([
	'dataProvider' => $currFeesData,
	'layout' => "{items}\n{pager}",
	'showOnEmpty'=>true,
	'emptyText'=>'No current fees data available.',
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'fees_collect_name',
		'fees_collect_details',
		[
		'attribute'=>'fees_collect_start_date',
		'value'=>function($data) {
			return Yii::$app->formatter->asDate($data['fees_collect_start_date']);
		}
		],
		[
		'attribute'=>'fees_collect_end_date',
		'value'=>function($data) {
			return Yii::$app->formatter->asDate($data['fees_collect_end_date']);
		}
		],
		[
		'attribute'=>'fees_collect_due_date',
		'value'=>function($data) {
			return Yii::$app->formatter->asDate($data['fees_collect_due_date']);
		}
		],
		[
		'header'=>'Fees Details',
		'format' => 'raw',
		'value'=>function($data) {
			$fcdModel = \app\modules\fees\models\FeesCategoryDetails::find()->where(['is_status'=>0, 'fees_details_category_id'=>$data->fees_collect_category_id])->asArray()->all();
			$tmp = '<ol>';
			foreach($fcdModel as $value) {
				$tmp.= '<li>'.$value['fees_details_name'].' ('.$value['fees_details_amount'].') </li>';
			}
			$tmp.='</ol>';
			return $tmp;
		}
		], 
		[
		'header'=>'Total Amount',
		'value'=>function($data) {
			return \app\modules\fees\models\FeesCategoryDetails::getFeeCategoryTotal($data->fees_collect_category_id);
		}
		], 
		[
		'header'=>'Total Paid Fees',
		'value'=>function($data) use ($model, $stuData) {
			return $model->getStuTotalPayFees($stuData->stu_master_id, $data->fees_collect_category_id);
		}
		],  
	],
]);
?>
    </div>
  </div>
</div>
<!-----End current batch fees details----->

<!-----Start student payment history block----->
<div class="col-xs-12" style="padding-top: 10px;">
    <div class="box box-info col-xs-12 col-lg-12 no-padding">
     <div class="box-header with-border">
	<h3 class="box-title"><i class="fa fa-inr"></i><sup><i class="fa fa-clock-o"></i></sup> Student Payment History</h3>
     </div>
     <div class="box-body table-responsive">
<?php
$stuFeesData = app\modules\fees\models\FeesPaymentTransaction::find()->where(['fees_pay_tran_stu_id'=>$stuData->stu_master_id, 'is_status'=>0]);
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
echo GridView::widget([
	'dataProvider' => $dataProvider,
	'showOnEmpty'=>true,
	'showFooter'=>false,
	'emptyText'=>'No fees results found.',
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'fees_pay_tran_id',
		[
			'attribute'=>'fees_pay_tran_date',
			'value'=>function($data) {
				return Yii::$app->formatter->asDate($data['fees_pay_tran_date']);
			}
		],
		[
			'attribute'=>'fees_pay_tran_collect_id',
			'value'=>'feesPayTranCollect.fees_collect_name',
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
			'attribute'=>'fees_pay_tran_amount',
		]
	],
]);
?>
     </div>
  </div>
</div>
<!-----End student payment history block----->

<!--/div--><!---End table-responsive div tag--->
