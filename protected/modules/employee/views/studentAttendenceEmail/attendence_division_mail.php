<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>

<!--<h5>Attendance Report</h5>-->
<h4>Division Name : <?php echo Division::model()->findByPk($div_id)->division_code; ?></h4>

<?php 
$i=0;
$m=1;
if($subject)
{
echo '<table border="1">
<tr><th>Lacture No</th><th>Faculty Name</th><th>Subject Name</th><th>Total</th><th>Present</th><th>Attendance %</th></tr>';
for($i=0;$i<count($subject);$i++)
{
		$percentage = ($present[$i]*100)/$total[$i];
		echo '<tr>';		
?>
		<td>
			<?php echo $lecture[$i];?>
		</td>
		<td>
			<?php echo $faculty[$i];?>
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
