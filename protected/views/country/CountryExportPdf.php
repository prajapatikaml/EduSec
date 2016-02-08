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
$k=0;
if ($model != null):

?>
<table border="1">

	<tr>
		<th>
		     SN.
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
		     <?php echo $v['name']; ?>		
		</td>
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
