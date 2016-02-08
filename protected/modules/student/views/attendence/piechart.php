
<?php
//$p=(float)(96.3);
//$a=(float)(3.7);
$acdm_name=AcademicTerm::model()->findByPk($_REQUEST['sem_name_id'])->academic_term_name;
$branch=Branch::model()->findByPk($_REQUEST['branch_id'])->branch_name;
$acdm_period=AcademicTermPeriod::model()->findByPk($_REQUEST['sem_id'])->academic_term_period;

echo '</br><h3 style="color:#3E576F">Attendence Chart of '.$branch.'-Sem:'.$acdm_name.'('.$acdm_period.')</h3>';
if($present!=0)
{

echo "<div id='piechart'>";
echo "<div id=\"container\" style=\"min-width: 400px; height: 400px; margin: 0 auto\"></div>";
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart'=> array(
            'renderTo'=>'container',
            'plotBackgroundColor'=>'#D5DEE5',
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
      'title' => array('text' => ''),
        'tooltip'=>array(
                'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }'
                     ),
        'plotOptions'=>array(
            'pie'=>array(
                'allowPointSelect'=> true,
                'cursor'=>'pointer',
                'dataLabels'=>array(
                    'enabled'=> false,
                    'color'=>'#000000',
                    'connectorColor'=>'#000000',
                    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+this.percentage +" %"; }'  
 
                                   )
                        )
                 ),
 
      'series' => array(
         array('type'=>'pie','name' => 'Browser share', 'data' => array(array('Present Student',round($present,1)),array(
                    'name'=>'Absent Student',
                    'y'=>round($absent,1),
                    'sliced'=>true,
                    'selected'=>false
                    ))),
 
      ),
	'exporting'=> array('enabled' => false)
 
   )
));
/*
}
else
{
	echo '<h1 align=center style=margin-top:50px;>No chart availble</h1>';
}
*/
?>
</div>
<div id="piecharttable">

<table align=left style="width:300px;" class="table_data">
<th colspan="11" style="font-size: 18px; color: rgb(255, 255, 255);">
		Attendence Table<br/>

        </th>
<tr class="table_header">
<th>SI No.</th><th>Subject Name</th><th>Attendance %</th>
</tr>
<?php 


		/*$subject=SubjectMaster::model()->findAllByAttributes(
								array(),
								$condition  = 'subject_master_academic_terms_period_id = :acdm_term_id AND subject_master_academic_terms_name_id = :acdm_term_name_id AND subject_master_branch_id = :branch_id',
								$params     = array(
									':acdm_term_id' => $_REQUEST['sem_id'],
									':acdm_term_name_id' => $_REQUEST['sem_name_id'],
						 			':branch_id' => $_REQUEST['branch_id'],
									
									));*/
		
		
		$subject = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where attendence="P" and branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'].')')
				->queryAll();



		
		$i=1;
		$m=1;
		foreach($subject as $sub)
		{
			if(($m%2) == 0)
			{
			  $class = "odd";
			}
			else
			{
			  $class = "even";
			}
			echo "<tr class=".$class.">";
			echo "<td>".$i."</td>";
			echo "<td>".$sub['subject_master_name'].'('.SubjectType::model()->findByPk($sub['subject_master_type_id'])->subject_type_name.")</td>";
			
			$attendence = Yii::app()->db->createCommand()
		        	->select('attendence')
				->from('attendence')
				->where('attendence="P" and branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'].' and sub_id='.$sub['subject_master_id'])
				->queryAll();
		
			
			$totalstudent = Yii::app()->db->createCommand()
		        	->select('attendence')
				->from('attendence')
				->where('branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'].' and sub_id='.$sub['subject_master_id'])
				->queryAll();
		
			if(count($attendence)!=0)
			{
				$present=(count($attendence)*100)/count($totalstudent);
			}
			else
			{
				$present=0;
				$absent=0;
			
			}
			echo "<td>".round($present,2)."</td>";
			echo "</tr>";
			$i++;
			$m++;
		}
echo "</table>";
//echo "Hi";
}
else
{
	print "<br>";
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}?>
</div>

