<?php
$this->breadcrumbs=array(
	'Dashboard',
	);?>	
<!-- start Branchwise data -->
<?php
$org_id = Yii::app()->user->getState('org_id');

$student=Yii::app()->db->createCommand()
	    ->select('count(student_transaction_id) as studcnt,br.branch_name, student_transaction_id as id')
	    ->from('student_transaction stud, ')
	    ->leftjoin('branch br','br.branch_id = stud.student_transaction_branch_id')
	    ->join('academic_term ac','ac.academic_term_id = stud.student_academic_term_name_id')
            ->group('student_transaction_branch_id')
	    ->where("ac.current_sem=1 AND stud.student_transaction_organization_id=".$org_id)
    	    ->queryAll();

if($student)
{
?>
<div class="box">
<div class="box-header">
<h1>Branch Wise Student Details</h1>
</div>
<?php
$dataProvider = new CArrayDataProvider($student);
 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'branchwise-total-student',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
	//'id',
	array(
		'header'=>'Branch',
		'value'=>'$data["branch_name"]'
	    ),
        array(
		'header'=>'Total Student',
		'value'=>'$data["studcnt"]'
	    ),
	
    ),
    'htmlOptions'=>array('class'=>'box-content grid-view'),
    'summaryText'=>'',
)); 
?>
</div>
<?php } ?>
<!-- End Branchwise data -->
<!-- Start Attendence Chart -->
<?php
	$id=Yii::app()->user->getState('org_id');
	/*	if(!empty($id))
		{	
			$branch=Yii::app()->db->createCommand()
					    ->selectDistinct('branch_id')
					    ->from('attendence att')
					    ->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
					    ->where("ac.current_sem=1 AND ac.academic_term_organization_id=".$id)
				    	    ->queryAll();
			
			
			$attendence = Yii::app()->db->createCommand()
		        	->select('count(attendence)')
				->from('attendence att')
				->group('branch_id')
				->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
				->where('ac.current_sem=1 AND att.attendence="P" and att.attendence_organization_id='.$id)
				->queryAll();

			$all = Yii::app()->db->createCommand()
		        	->select('count(attendence)')
				->from('attendence att')
				->group('branch_id')
				->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
				->where('ac.current_sem=1 AND att.attendence_organization_id='.$id)
				->queryAll();	

			$xaxis = array();
			$yaxis = array();
                                            
			//print_r($all[0]['count(attendence)']);
		
			foreach($branch as $xvalue)
			{ 
				foreach($xvalue as $x)
				$xaxis[] = Branch::model()->findByPk($x)->branch_alias;			
			}
			$i=0;
			foreach($attendence as $yvalue)
			{ 	
				foreach($yvalue as $y)		
				$yaxis[] = round($y*100/($all[$i]['count(attendence)']),2);
				$i+=1;
			}

if(!empty($branch)) {
?>
<div class="box">
<div class="box-header">
<h1>Attendance Chart</h1>
</div>


<?php

	echo "<div id=\"container\" style=\"min-width: 00px; height: 230px; margin: 0 auto\"></div>";




for($i=0;$i<count($xaxis);$i++)
{
	$t=0;
	$n[$i][$t]=$xaxis[$i];
	$n[$i][$t+1]= $yaxis[$i];	
}
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
        'title'=> array(
			'text'=> 'Branch Wise Attendance'
		      ),
	
	 'xAxis' => array(
        		 'categories' => $xaxis	
     			 ),
	'yAxis'=> array(
			'min'=> 0,
			'max'=> 100,
			'title'=> array(
				'text'=> 'Attendance'
				       )				
			),
	'legend'=> array(
			'layout'=> 'vertical',
			'backgroundColor'=> '#FFFFFF',
			'align'=> 'left',
			'verticalAlign'=> 'top',
			'x'=> 100,
			'y'=> 70,
			'floating'=> true,
			'shadow'=> true
			),
	'tooltip'=>array(
		        'formatter'=>'js:function() { return "<b>"+ this.x +"</b>: "+ this.y +" Per"; }'
		        ),
	'plotOptions'=> array (
			'column'=> array(
				'pointPadding'=> 0.2,
				'borderWidth'=> 0
			)
		),	
	'series' => array(
		    array('data'=>$n,'showInLegend'=>false),
		),
	'exporting'=> array( 'enabled' => false)	
 )));

?>
</div>
<?php }
} */?>
<!-- End Attendance Chart -->
<!-- Start GTU Notice -->
<?php
$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$result=Gtunotice::model()->findAll(array("condition"=>"gtunotice_organization_id  =  $id","limit"=>4,'order'=>'ID desc'));
		if($result)
		{
?>
<div class="box" >
<div class="box-header">
<h1>GTU Notice</h1>
</div>
<div class="box-content" style="min-height:210px;max-height:210px;">
	<?php 
			echo '<ul>';
			foreach($result as $data)
			echo '<li>'.CHtml::link($data->Description."..",$data->Link,array('target'=>'_blank')).'</li>';
			echo '</ul>';
			

	?>
</div>
<?php  echo CHtml::link('View More...',array('gtunotice/admin'),array('style'=>'float:right;'));?>
</div>
<?php
}
}
?>
<!-- End GTU Notice -->
<!-- Start Mailbox -->
<div class="box">
<div class="box-header">
<h1>MailBox</h1>
</div>
	<?php 
		//Yii::app()->runController('mailbox/message/myinbox');
	?>
</div>
<!-- end Mailbox -->


