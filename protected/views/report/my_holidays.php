<?php
$this->breadcrumbs=array(
	'Holidays List',	
);
?>

<?php 
	echo '<table class="table_data" >
	<tr class="table_header"><th>SI No.</th><th>Date</th><th>Name of Holiday</th></tr>';
	$m = 0;
	foreach($date_list as $list) { 

		if(($m%2) == 0)
		   $class = "odd";
		else
		   $class = "even";
					
		echo '<tr class='.$class.'>'; ?>
		   <td>
			<?php echo ++$m;?>
		   </td>
		   <td>
			<?php echo date('d-m-Y',strtotime($list['national_holiday_date'])); ?>
		   </td>
		   <td>
			<?php echo $list['national_holiday_name'];?>
		   </td>
		</tr>	
		
   <?php } ?>
</table>

