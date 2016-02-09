<?php 
use yii\helpers\Html; 
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
$this->title = 'Report Center';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

<!---Start Count Active Student--->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
             <h3><?php echo \app\modules\student\models\StuMaster::find()->where(['is_status'=>0])->count(); ?></h3>
            <p>Active Students</p>
        </div>
        <div class="icon">
              <i class="fa fa-toggle-on" style="font-size: 60px;"></i>
        </div>
	  <?php echo Html::a('More Info <i class="fa fa-arrow-circle-right"></i>', ['/report/student/stuinforeport'], ['class'=>'small-box-footer']); ?>
    </div>
</div>

<!---Start Count Deactive Student--->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
           <h3><?php echo \app\modules\student\models\StuMaster::find()->where(['is_status'=>1])->count(); ?></h3>
            <p>Deactive Students</p>
        </div>
        <div class="icon">
            <i class="fa fa-toggle-off" style="font-size: 60px;"></i>
        </div>
        <?php echo Html::a('More Info <i class="fa fa-arrow-circle-right"></i>', ['/report/student/stuinforeport'], ['class'=>'small-box-footer']); ?>
    </div>
</div>

<!---Start Count Active Employee--->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo \app\modules\employee\models\EmpMaster::find()->where(['is_status'=>0])->count(); ?></h3>
            <p>Active Employee</p>
        </div>
        <div class="icon">
            <i class="fa fa-toggle-on" style="font-size: 60px;"></i>
        </div>
	<?php echo Html::a('More Info <i class="fa fa-arrow-circle-right"></i>', ['/report/employee/empinforeport'], ['class'=>'small-box-footer']); ?>
    </div>
</div>

<!---Start Count Deactive Employee--->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3><?php echo \app\modules\employee\models\EmpMaster::find()->where(['is_status'=>1])->count(); ?></h3>
            <p>Deactive Employee</p>
        </div>
        <div class="icon">
           <i class="fa fa-toggle-off" style="font-size: 60px;"></i>
        </div>
	    <?php echo Html::a('More Info <i class="fa fa-arrow-circle-right"></i>', ['/report/employee/empinforeport'], ['class'=>'small-box-footer']); ?>
    </div>
</div>

</div>



<div class="row">
<div class="col-md-12">
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bar-chart"></i> Course Wise Student Status</h3>
	</div>
	<div class="box-body">

<?php
$stuStatusData[] = [
		'type' => 'pie',
		'name' => 'Total Students',
		'data' => $stuStatusWise,
		'center' => [70, 40],
		'size' => 88,
		'showInLegend' => false,
		'dataLabels' => [
			'enabled' => false,
		],
	];

echo Highcharts::widget([
	'scripts' => [
		//'modules/exporting',
		//'themes/grid-light',
		'highcharts-3d',   
	],

	'options' => [
		'credits'=>[
    			'enabled'=>false
  		],
		'exporting'=>[
			'enabled'=>false 
		],
		'chart'=> [
			'type'=>'column',
			'options3d'=>[
				'enabled'=>true,
				'alpha'=>10,
				'beta'=>0,
				'viewDistance'=>25,
        			'depth'=>100
			],
			'marginTop'=>80,
    			'marginRight'=>40
		],
		'title' => [
			'text' => '',
		],
		'xAxis' => [
			'categories' => $courseData,
		],
		'yAxis'=>[
			'title'=>[
				'text'=>'Student Count',
			]
		],
		'series' => $stuStatusData,
	]
]);
?>
	</div> <!--End Body--->
</div> <!--End Box Info-->
</div>
</div>




<div class="row">

<!---Gender Wise Students--->
<div class="col-md-4">
	<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-pie-chart"></i> Gender Wise Student</h3>
	</div>
	<div class="box-body">
<?php
	echo Highcharts::widget([
		'options' => [	
			'exporting'=>[
			 	'enabled'=>false 
			],
			'colors'=>['#F45B5B', '#F7A35C', '#2B908F'],
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
				'text'=>'',
				'margin'=>0,
			],
			'plotOptions'=>[
				'pie'=>[
					'innerSize'=>80,
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
					'name'=>'Total Student',
					'data'=>$stuGenWise
				]
			]
		],
	]);
	?>
	</div>
   </div>
</div>

<!---Category Wise Students--->
<div class="col-md-8">
	<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bar-chart"></i> Category Wise Student</h3>
	</div>
	<div class="box-body">
<?php
	echo Highcharts::widget([
		'scripts' => [
			'highcharts-3d',   
		],
		'options' => [	
			'exporting'=>[
			 	'enabled'=>false 
			],
			'xAxis'=>[
			    'categories'=>$stuCatWiseDisp,
			],
			'credits'=>[
    				'enabled'=>false
  			 ],
			'chart'=> [
				'type'=>'column',
				'margin'=>50,
				'options3d'=>[
					'enabled'=>true,
					'alpha'=>0,
					'beta'=>0,
					'depth'=>100
				],

			],
			'title'=>[
				'text'=>'',
				//'margin'=>0,
			],
			'plotOptions'=>[
				'column'=> [
					'pointPadding'=> 0.2,
					//'borderWidth'=> 5,
					//'colorByPoint'=>true,
					'depth'=>25
				],
			],
			'yAxis'=>[
				'title'=>[
					'text'=>'Student Count',
				]
			],
			'series'=> [
				[
					'name'=>'Male',
					'data'=>$stuCatWiseDataMale,
					'showInLegend'=>true,
					'color'=>'#2B908F',
				],
				[
					'name'=>'Female',
					'data'=>$stuCatWiseDataFemale,
					'showInLegend'=>true,
					'color'=>'#F7A35C',
				]
			]
		],
	]);
	?>
	</div>
   </div>
</div>

</div>

<!---Start Employee Related Pie Chart Information--->
<div class="row">
<!---Designation Wise Employee--->
<div class="col-md-4">
	<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-pie-chart"></i> Gender Wise Employee</h3>
	</div>
	<div class="box-body">
<?php
	echo Highcharts::widget([
		'options' => [	
			'exporting'=>[
			 	'enabled'=>false 
			],
			'colors'=>['#F45B5B', '#F7A35C', '#2B908F'],
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
				'text'=>'',
				'margin'=>0,
			],
			'plotOptions'=>[
				'pie'=>[
					'allowPointSelect'=>true,
                			'cursor'=>'pointer',
					'innerSize'=>80,
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
					'data'=>$empGenWise
				]
			]
		],
	]);
	?>
	</div>
   </div>
</div>

<!---Current Status Wise Employees--->
<div class="col-md-8">
	<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bar-chart"></i> Year Wise Joining Employees</h3>
	</div>
	<div class="box-body">
<?php

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
			'text'=>'Department Wise Joining Average'
		],
		'subtitle'=>[
			'text'=>'',
			'margin'=>0,
		],
		'xAxis'=>[
			'categories'=> $depDisp,
		],
		'yAxis'=>[
			'title'=>[
				'text'=>'Total Employee',
			]
		],
		'plotOptions'=>[
			 'column'=>[
				'pointPadding'=>0.2,
				'borderWidth'=>0
			 ],
		],
		'series'=>$empYearWiseJoin,
	    ],
	]);
?>
	</div>
   </div>
</div>
</div>

