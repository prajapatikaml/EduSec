<?php 
use yii\helpers\Html; 
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = 'Employee Module';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---Start First Row Branch Wise Student Total---> 
<div class="row">
<div class="col-md-6">
   <div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa  fa-sitemap"></i> Department Wise Employee</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if(!empty($empDepWise)) {
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
						'alpha'=>60
					]
				],
				'title'=>[
					'text'=>'',
					'margin'=>0,
				],
				'plotOptions'=>[
					'pie'=>[
						'innerSize'=>100,
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
						'name'=>'Total Employee',
						'data'=>$empDepWise
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

<!---Start Designation Wise Display Block--->
<div class="col-md-6">
   <div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa  fa-sitemap"></i> Designation Wise Employee</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if(!empty($empDesignWise)) {
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
						'alpha'=>45,
						'beta'=>0
					],
				],
				'title'=>[
					'text'=>'',
					'margin'=>0,
				],
				'plotOptions'=>[
					'pie'=>[
						'allowPointSelect'=>true,
		        			'cursor'=>'pointer',
		       				'depth'=>35,
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
						'name'=>'Total Employee',
						'data'=>$empDesignWise
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
	
<!---Start Second Row Recently Added Student List Block---> 
<div class="row">
<div class="col-md-12">
	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-list-ul"></i> Recently Added Employee</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-warning btn-sm" title="Remove" data-toggle="tooltip" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table no-margin">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Employee Id</th>
						<th>Employee Name</th>
						<th>Department</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
				<?php if(!empty($empRecent)) : ?>
				<?php foreach($empRecent as $k=>$v) : ?>
					<tr>
						<td><?= ($k+1); ?></td>
						<td><?= $v['emp_unique_id'];?></td>
						<td><?= Html::a($v['emp_name'], ['emp-master/view', 'id'=>$v['emp_master_id']]);?></td>
						<td><?= $v['emp_department_name'];?></td>
						<td><?= $v['cDate'];?></td>
					</tr>
				<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="5" class="text-danger text-center">No results found.</td>
					</tr>
				<?php endif;?>
				</tbody>
			</table>
		</div>
		<div class="box-footer clearfix">
			<?php if(Yii::$app->user->can("/employee/emp-master/create")) { ?>
			   <?php echo Html::a('Add Employee', ['emp-master/create'], ['class'=>'btn btn-sm btn-info btn-flat pull-left']); ?>
			<?php } ?>
			<?php echo Html::a('View All Employees', ['emp-master/index'], ['class'=>'btn btn-sm btn-default btn-flat pull-right']); ?>
		</div>
	</div>	
	

</div>
</div>
<!---End Recently Student Added Block--->
