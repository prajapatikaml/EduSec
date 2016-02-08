<?php
$this->breadcrumbs=array(
	'Division Report',
	
);
?>


<?php
	echo CHtml::link('GO BACK',Yii::app()->createUrl('/student/attendence/attendencedivisionreport')); 
	$m=1;
	
if($subject)
{
	$this->menu[]=	array('label'=>'', 'url'=>array('attendencedivisionreport','pdf'=>'pdf','div_id'=>$div_id),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF','target'=>'_blank'));
	$this->menu[]=	array('label'=>'', 'url'=>array('attendencedivisionreport','excel'=>'excel','div_id'=>$div_id),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

 $div_model = Division::model()->findByPk($div_id);
 $acd_model = AcademicTerm::model()->findByPk($div_model->academic_name_id);
?>
<table  border="2px" id="twoColThinTable">
<tr class="row">	
	<td class="col1">Division </td> 
	<td class="col2"><?php echo $div_model->division_code;?></td>
</tr>	
<tr class="row">
	<td class="col1">Semester </td> 
	<td class="col2"> <?php echo $acd_model->academic_term_name;?></td>
</tr>
	<tr class="row">	
	<td class="col1"> Branch </td> 
	<td class="col2"><?php echo Branch::model()->findByPk($div_model->branch_id)->branch_name; ?></td>
</tr>
	</table></br>
	


<?php	echo '<table class="table_data" >
	<tr class="table_header"><th>SI No.</th><th>Subject Name</th><th>Total</th><th>Present</th><th>Attendance %</th></tr>';
	for($i=0;$i<count($subject);$i++)
	{
			if(($m%2) == 0)
			{
			  $class = "odd";
			}
			else
			{
			  $class = "even";
			}			
			$percentage = ($present[$i]*100)/$total[$i];
			echo '<tr class='.$class.'>';?>
			<td>
				<?php echo $i+1;?>
			</td>
			<td>
				<?php echo "<u>".CHtml::link($subject[$i],array('attendence/attendencedivisionreport','subject'=>'view','div_id'=>$div_id,'sb_id'=>$subjectid[$i],'month'=>date('m'),'less'=>20,'greate'=>0),array('target'=>'_blank','title'=>'View'))."</u>";?>
			</td>
			<td>
				<?php echo $total[$i];?>
			</td>
			<td>
				<?php echo $present[$i];?>
			</td>
			<td>
				<?php echo round($percentage,2);?>
			</td></tr>
	<?php
	$m++;			
	}
	echo '</table></br>';
}

else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}


?>
