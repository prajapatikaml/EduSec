<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php if ($model !== null):?>
<?$k=1;?>

	
<table border="1">

	<tr>
		<th align="center" >
		      SN.		</th>
 		<th align="center" >
		      Semester 	</th>
		<th align="center" >
		      Start Date	</th>
		<th align="center" >
		      End Date	</th>
		<th align="center" >
		      Academic Year</th>
		<th align="center" >
		     Current Semester</th>
	
 	</tr>
	<?php foreach($model as $m=>$v)
	{
	   if($m <> 0) {
            ?>
	<tr>
       		<td>
			<?php echo $k; ?>
		</td>
		<td>
			<?php echo "Sem-".$v['academic_term_name']; ?>
		</td>	
		<td>	
			<?php echo ($v['academic_term_start_date'] == 0000-00-00) ? "Not Set" : date_format(new DateTime($v['academic_term_start_date']), "d-m-Y");?>	
		</td>    
		<td>	
			<?php echo ($v['academic_term_end_date'] == 0000-00-00) ? "Not Set" : date_format(new DateTime($v['academic_term_end_date']), "d-m-Y");?>	
		</td>  
		<td>	
			<?php echo AcademicTermPeriod::model()->findByPk($v['academic_term_period_id'])->academic_term_period;?> 	
		</td> 

		<td>	
			<?php echo ($v['current_sem'] == 1) ? "True" : "False";?>	

		</td>  

</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
