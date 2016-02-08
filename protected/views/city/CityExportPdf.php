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

if ($model != null):
$k=0;
?>
<table border="1">

	<tr>
		<th>
		    SN.	
		</th>
 		<th>
		     City		
		</th>
		<th>
		     State	
		</th>
		<th>
		     Country		
		</th>
		
 	</tr>
	<?php 
	foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>	
		</td>
		<td>
		      <?php echo $v['city_name']; ?>	
		</td>
		<td>
		      <?php echo State::model()->findBypk($v['state_id'])->state_name; ?>	
		</td>
		<td>
		     <?php echo Country::model()->findBypk($v['country_id'])->name; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
