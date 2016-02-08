<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php 
$div_model = Division::model()->findByPk($div_id);
?>

<h5>Division :<?php echo $div_model->division_code;?></h5>
<h5>Semester :<?php echo AcademicTerm::model()->findByPk($div_model->academic_name_id)->academic_term_name;?></h5>
<h5>Branch :  <?php echo Branch::model()->findByPk($div_model->branch_id)->branch_name; ?></h5>

<?php 
$i=0;
$m=1;
if($subject)
{
echo '<table border="1">
<tr><th>Sr No.</th><th>Subject Name</th><th>Total</th><th>Present</th><th>Attendance %</th></tr>';
for($i=0;$i<count($subject);$i++)
{
		$percentage = ($present[$i]*100)/$total[$i];
		echo '<tr>';		
?>
		<td>
			<?php echo $i+1;?>
		</td>
		<td>
			<?php echo $subject[$i];?>
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
echo '</table>';
}
else
{
	print  "No data available";

}
?>
