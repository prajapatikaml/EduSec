<?php 
use yii\helpers\Html; 
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = 'Fees Module';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---Start display module links block---->
<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
	      <div class="edusec-link-box">
	        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-university"></i></i></span>
	        <div class="edusec-link-box-content">
	          <span class="edusec-link-box-text"><?= Html::a('Bank Master', ['/fees/bank-master']);?></span>
	          <span class="edusec-link-box-number"><?= app\modules\fees\models\BankMaster::find()->andWhere(['is_status'=>0])->count(); ?></span>
		 <span class="edusec-link-box-desc">Manage Bank Details</span>
		  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/fees/bank-master/create']); ?></span>
	        </div><!-- /.info-box-content -->
	      </div><!-- /.info-box -->
	</div>

	<div class="col-md-4 col-sm-6 col-xs-12">
	      <div class="edusec-link-box">
	        <span class="edusec-link-box-icon bg-teal"><i class="fa fa-cog"></i></span>
	        <div class="edusec-link-box-content">
	          <span class="edusec-link-box-text"><?= Html::a('Fees Category', ['/fees/fees-collect-category']);?></span>
	          <span class="edusec-link-box-number"><?= app\modules\fees\models\FeesCollectCategory::find()->andWhere(['is_status'=>0])->count(); ?></span>
		 <span class="edusec-link-box-desc"></span>
		  <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/fees/fees-collect-category/create']); ?></span>
	        </div><!-- /.info-box-content -->
	      </div><!-- /.info-box -->
	</div>

	<div class="col-md-4 col-sm-6 col-xs-12">
	      <div class="edusec-link-box">
	        <span class="edusec-link-box-icon bg-aqua"><i class="fa fa-inr"></i></span>
	        <div class="edusec-link-box-content">
	          <span class="edusec-link-box-text"><?= Html::a('Collect Fees', ['/fees/fees-payment-transaction/collect']);?></span>
	          <span class="edusec-link-box-number">&nbsp;</span>
		 <span class="edusec-link-box-desc">Category Wise Fees Collect</span>
		  <span class="edusec-link-box-bottom"></span>
	        </div><!-- /.info-box-content -->
	      </div><!-- /.info-box -->
	</div>

</div> <!-- /. End Row-->
<!---End display module link block--->
<!---Start First Row Course Wise Collect Fees---> 
<div class="row">
<div class="col-sm-6">
   <div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-pie-chart"></i> Course Wise Collect Fees</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if(!empty($courseWiseCollect)) {
		echo Highcharts::widget([
			'scripts' => [
				'highcharts-3d',   
			],
			'options' => [	
				'exporting'=>[
				 	'enabled'=>false 
				],
				'legend'=>[
				    'align'=>'center',
				    'verticalAlign'=>'bottom',
				    'layout'=>'vertical',
				    'x'=>0,
				    'y'=>0,
				],
				'credits'=>[
	    				'enabled'=>false
	  			 ],
				'chart'=> [
					'type'=>'pie',
					'options3d'=>[
						'enabled'=>true,
						'alpha'=>45
					]
				],
				'title'=>[
					'text'=>'',
					'margin'=>0,
				],
				'plotOptions'=>[
					'pie'=>[
						'depth'=>45,
						'dataLabels'=>[
							'enabled'=>false
					    	 ],
						 'showInLegend'=>true,
					],	
					'series'=>[
						'pointPadding'=>0,
						'groupPadding'=>0,      
					 ],
				],
				'series'=> [
					[
						'name'=>'Collect Amount',
						'data'=>$courseWiseCollect
					]
				]
			],
		]);
	} else {
		echo '<div class="alert alert-danger">No results found.</div>';
	}
	?>
	</div>
   </div>
</div>
<!---Start Inner Row For Paid/Unpaid Student--->
<div class="col-sm-6">
   <div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-pie-chart"></i> Paid/Unpaid Amount</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if(!empty($paidUnpaidData[0]['y']) || !empty($paidUnpaidData[1]['y'])) {
		echo Highcharts::widget([
			'options' => [	
				'exporting'=>[
				 	'enabled'=>false 
				],
				'legend'=>[
				    'align'=>'center',	
				    'verticalAlign'=>'bottom',
				    'layout'=>'horizontal',
				    'x'=>0,
				    'y'=>0,
				],
				'credits'=>[
	    				'enabled'=>false
	  			 ],
				'chart'=> [
					'type'=>'pie',
				],
				'title'=>[
					'text'=>'Paid/Unpaid',
					'margin'=>0,
					'align'=>'center',
		    			'verticalAlign'=>'middle',
		    			'y'=>0
				],
				'subtitle'=>[
					'text'=>'Current Active Fees Collection Category Wise',
					'margin'=>0,
				],
				'plotOptions'=>[
					'pie'=>[
						'innerSize'=>130,
						'depth'=>45,
						'dataLabels'=>[
							'enabled'=>false
					    	 ],
						 'showInLegend'=>true,
					],	
					'series'=>[
						'pointPadding'=>0,
						'groupPadding'=>0,      
					 ],
				],
				'series'=> [
					[
						'name'=>'Collect Amount',
						'colors'=>'#ededed',
						'data'=>$paidUnpaidData
					]
				]
			],
		]);
	} else {
		echo '<div class="alert alert-danger">No results found.</div>';
	}
	?>
	</div>
   </div>
</div>
<!---End Course Wise Total Student Block--->
</div>
<!---End First Row Student Branch Wise Total & Year Wise Admission--->


<!--Start Paid/Due amount graph block--->
<div class="row">
<div class="col-md-12">
   <div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bar-chart"></i> Individual Category Wise Fees Collection </h3>
		<div class="box-tools pull-right">
			<button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if(!empty($fcCategory) && !empty($fccWisePaidUnPaid)) {
		echo Highcharts::widget([
		'options' => [	
			'chart'=>[
				'type'=>'column', 
			
			],
			'exporting'=>[
				'enabled'=>false, 
			],
			'credits'=>[
	    			'enabled'=>false,
	  		],
			'title'=>[
				'text'=>'',
			],
			'subtitle'=>[
				'text'=>'Current Active Fees Collection Category Wise',
				'margin'=>0,
			],
			'xAxis'=>[
				'categories'=>$fcCategory,
			],
			'yAxis'=>[
				'title'=>[
					'text'=>'Fees Amount',
				]
			],
			'plotOptions'=>[
				 'column'=>[
					'pointPadding'=>0.2,
					'borderWidth'=>0
				 ],
			],
			'series'=>$fccWisePaidUnPaid,
		    ],
		]);
	} else {
		echo '<div class="alert alert-danger">No results found.</div>';
	}  
?>
	</div>
   </div>
</div>
</div>
<!--End Paid/Due amount graph block--->	

<!---Start Second Row Recently Added Student List Block---> 
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Recently Fees Transaction</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-primary btn-sm" title="Remove" data-toggle="tooltip" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table no-margin">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Receipt No.</th>
						<th>Fees Category</th>
						<th>Amount</th>
						<th>Transaction Date</th>
					</tr>
				</thead>
				<tbody>
				<?php if(!empty($feeRecent)) : ?>
				<?php foreach($feeRecent as $k=>$v) : ?>
					<tr>
						<td><?= ($k+1); ?></td>
						<td><?= $v['stu_unique_id'];?></td>
						<td><?= $v['stu_name'];?></td>
						<td><?= $v['fees_pay_tran_id'] ?></td>
						<td><?= $v['fees_collect_name'];?></td>
						<td><?= $v['fees_pay_tran_amount']; ?></td>
						<td><?= $v['tranDate'];?></td>
					</tr>
				<?php endforeach; ?>
				<?php else :?>
					<tr>
						<td colspan="7" class="text-danger text-center"><h4>No results found.</h4></td>
					</tr>
				<?php endif; ?>

				</tbody>
			</table>
		</div>
		<div class="box-footer clearfix">
			<?php echo Html::a('Collect Fees', ['fees-payment-transaction/collect'], ['class'=>'btn btn-sm btn-primary btn-flat pull-left']); ?>
		</div>
	</div>	
	

</div>
</div>
<!---End Recently Student Added Block--->
