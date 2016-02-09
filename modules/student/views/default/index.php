<?php 
use yii\helpers\Html; 
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
$this->title = 'Student Module';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---Start First Row Branch Wise Student Total---> 
<div class="row">
<div class="col-md-6">
   <div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-graduation-cap"></i> Current Course Wise Total Student</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if($stuCount) {
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
				
				],
				'series'=> [
					[
						'name'=>'Total Student',
						'data'=>$stuCount
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


<!---Start Year Wise Admission Block--->
<div class="col-md-6">
   <div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bar-chart"></i> Year Wise Admission</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
<?php
	if($fYearWiseAdm) {
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
				'text'=>'Monthly Average Admission'
			],
			'subtitle'=>[
				'text'=>'',
				'margin'=>0,
			],
			'xAxis'=>[
				'categories'=> ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			],
			'yAxis'=>[
				'title'=>[
					'text'=>'Admission Count',
				]
			],
			'plotOptions'=>[
				 'column'=>[
					'pointPadding'=>0.2,
					'borderWidth'=>0
				 ],
			],
			'series'=>$fYearWiseAdm,
		    ],
		]);
	} else {
		echo '<div class="alert alert-danger">No results found.</div>';
	}
?>
	</div>
   </div>
</div>
<!---End Year Wise Admission Block--->
</div>
<!---End First Row Student Branch Wise Total & Year Wise Admission--->
	
<!---Start Second Row Recently Added Student List Block---> 
<div class="row">
<div class="col-md-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-list-ul"></i> Recently Added Student</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-info btn-sm" title="Remove" data-toggle="tooltip" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table no-margin">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Student Id</th>
						<th>Student Name</th>
						<th>Course</th>
						<th>Batch</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
				<?php if($stuLast) : ?>
				<?php foreach($stuLast as $k=>$v) : ?>
					<tr>
						<td><?= ($k+1); ?></td>
						<td><?= $v['stu_unique_id'];?></td>
						<td><?= Html::a($v['stu_name'], ['stu-master/view', 'id'=>$v['stu_master_id']]);?></td>
						<td><?= $v['course_name'];?></td>
						<td><?= $v['batch_name'];?></td>
						<td><?= $v['cDate'];?></td>
					</tr>
				<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="6" class="text-danger text-center">No results found.</td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
		<div class="box-footer clearfix">
			<?php if(Yii::$app->user->can("/student/stu-master/create")) { ?>
			    <?php echo Html::a('Add Student', ['stu-master/create'], ['class'=>'btn btn-sm btn-info btn-flat pull-left']); ?>
			<?php } ?>
			<?php echo Html::a('View All Students', ['stu-master/index'], ['class'=>'btn btn-sm btn-default btn-flat pull-right']); ?>
		</div>
	</div>	
	

</div>
</div>
<!---End Recently Student Added Block--->
