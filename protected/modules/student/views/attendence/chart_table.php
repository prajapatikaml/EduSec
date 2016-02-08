<?php
$this->breadcrumbs=array(
	'Chart Report',
);

echo CHtml::link('GO BACK',Yii::app()->createUrl('/student/attendence/ChartReport')); 
?>

<?php 
	
	$acdm_name=AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$acdm_period.' and  academic_term_organization_id='.Yii::app()->user->getState('org_id')));
	//print_r($acdm_name);
	//exit;
	
	
	
	
	

		$branch = Attendence::model()->findAll(array(
    				'select'=>'branch_id',
				'condition'=>'sem_id='.$acdm_period.' and attendence_organization_id='.Yii::app()->user->getState('org_id'),
 				'distinct'=>true,
							));
$m=1;	
if($branch)
{
?>

<table class="table_data" align=center border="1" style="width:960px; font-size:12px;">
	
<th colspan="11" style="font-size: 18px; color: rgb(255, 255, 255);">
		Attendance Chart Table


        </th>	
<tr class="table_header">
<th>Branch Name\Semester</th>
<?php
foreach($acdm_name as $ac){
?>

<th>
<?php echo "Sem-".$ac['academic_term_name'];?>
</th>

<?php }?>
</tr>
<?php		foreach($branch as $b)
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
			echo "<td  align=center><b>".Branch::model()->findByPk($b['branch_id'])->branch_name."</b></td>";	
	
			foreach($acdm_name as $ac1)
			{			
				echo "<td  align=center><u>".CHtml::link('View Chart',array('attendence/DisplayChart','sem_id'=>$acdm_period,'sem_name_id'=>$ac1['academic_term_id'],'branch_id'=>$b['branch_id']), array('target'=>'_blank'))."</u></td>";
		
			}
			echo "</tr>";
		 $m++;
		}

echo "</table>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>

