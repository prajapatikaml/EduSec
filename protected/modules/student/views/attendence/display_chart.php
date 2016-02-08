
<?php
//echo $_REQUEST['acdm_period'];
//exit; 
		$xaxis = array();
		$yaxis = array();
		$xaxis=null;
		$yaxis=null;
		if(!empty($_REQUEST['acdm_period']) || !empty($_REQUEST['branch']) || !empty($_REQUEST['subject']))
		{

			$acdmperiodname=null;
			
			//$model->attributes=$_POST['Attendence'];
			$acdmperiodname='attendence="P"';
			
			
			if(!empty($_REQUEST['acdm_period']))
			{
				
				$acdmperiodname=$acdmperiodname.' and sem_name_id='.$_REQUEST['acdm_name'].' and sem_id='.$_REQUEST['acdm_period'];
				
				if(!empty($_REQUEST['branch']))
				{
					$acdmperiodname=$acdmperiodname.' and branch_id='.$_REQUEST['branch'].' and div_id='.$_REQUEST['div'];
					
					$xaxis[0] = Branch::model()->findByPk($_REQUEST['branch'])->branch_name;
					$xaxis[0]=$xaxis[0].' '.Division::model()->findByPk($_REQUEST['branch'])->division_name;
				}
				else
				{

				// IF BRANCH IS NOT SELECTED THEN IT EXECUTE FOLLOWING STATEMENTS...

					$branch = Yii::app()->db->createCommand()
						->selectDistinct('branch_id')
						->from('attendence')
						//->order('branch_id DESC')
						->where('sem_name_id='.$_REQUEST['acdm_name'].' and sem_id='.$_REQUEST['acdm_period'])						
						->queryAll();

						foreach($branch as $xvalue)
						{ 
							foreach($xvalue as $x)
							$xaxis[] = Branch::model()->findByPk($x)->branch_name;			
						}
				}
				if(!empty($_REQUEST['subject']))
				{
					$acdmperiodname=$acdmperiodname.' and sub_id='.$_REQUEST['subject'];
					$xaxis[0] =$xaxis[0].' '. SubjectMaster::model()->findByPk($_REQUEST['subject'])->subject_master_name;
					
				}
			}
			else 
			{
				
				if(!empty($_REQUEST['subject']))
				{
				
					$acdmperiodname=$acdmperiodname.' and sub_id='.$_REQUEST['subject'];
					$xaxis[0]=SubjectMaster::model()->findByPk($_REQUEST['subject'])->subject_master_name;			
							
					if(!empty($_REQUEST['branch']))
					{
						$acdmperiodname=$acdmperiodname.' and branch_id='.$_REQUEST['branch'].' and div_id='.$_POST['Attendence']['div'];
						$xaxis[0] = $xaxis[0].' '.Branch::model()->findByPk($_REQUEST['branch'])->branch_name;
						$xaxis[0]=$xaxis[0].' '.Division::model()->findByPk($_REQUEST['branch'])->division_name;
					}
				}
				else
				{
					
					$acdmperiodname=$acdmperiodname.' and branch_id='.$_REQUEST['branch'].' and div_id='.$_REQUEST['div'];
					$xaxis[0] = Branch::model()->findByPk($_REQUEST['branch'])->branch_name;
					$xaxis[0]=$xaxis[0].' '.Division::model()->findByPk($_REQUEST['branch'])->division_name;
				}
				
				
			}

			//echo $acdmperiodname;
			$attendence = Yii::app()->db->createCommand()
		        	->select('count(attendence) As y')
				->from('attendence')
				->group('branch_id')
				->where($acdmperiodname)
				->queryAll();				
			foreach($attendence as $yvalue)
			{ 	
				foreach($yvalue as $y)		
				$yaxis[] = $y;
			}
			//print_r($yaxis);
			

		}

if(!empty($xaxis))
{
	echo "<div id=\"container\" style=\"min-width: 00px; height: 400px; margin: 0 auto\"></div>";
 
//print_r($xaxis);
//print_r($yaxis);

for($i=0;$i<count($xaxis);$i++)
{
	$t=0;
	$n[$i][$t]=$xaxis[$i];
	$n[$i][$t+1]= $yaxis[$i];
}
//$n=array_merge($xaxis,$yaxis);


//print_r($n);
//print_r($m);
	//echo $m;
	//echo $key;

//print_r($m);

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
        'title'=> array(
			'text'=> 'Branch Wise Attendence'
		      ),
	
	 'xAxis' => array(
        		 'categories' => $xaxis	
     			 ),
	'yAxis'=> array(
			'min'=> 0,
			'max'=> 100,
			'title'=> array(
				'text'=> 'Attendence'
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
		    array('name'=>$xaxis,'data'=>$n),
		)	
 )));
}
else
echo "No chart with this criteria. Please select proper criterias.";
?>

	</div>



