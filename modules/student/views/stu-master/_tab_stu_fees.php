<?php 
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
?>
<!-----Start current batch fees details----->

<div class="row">
  <div class="col-xs-12">
	<h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<i class="fa fa-inr"></i> Current Fees Details
	</h4>
  </div><!-- /.col -->
</div>

<div class="box box-solid">
    <div class="box-body table-responsive no-padding">
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
<!-----End current batch fees details----->

<!-----Start student payment history block----->

<div class="row">
  <div class="col-xs-12">
	<h4 class="edusec-border-bottom-warning page-header edusec-profile-title-1">	
		<i class="fa fa-inr"></i> Student Payment History
	</h4>
  </div><!-- /.col -->
</div>

<div class="box box-solid">
     <div class="box-body table-responsive no-padding">
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
\yii\widgets\Pjax::begin(['enablePushState'=>FALSE]); 
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
\yii\widgets\Pjax::end();
?>
     </div>
</div>
<!-----End student payment history block----->
