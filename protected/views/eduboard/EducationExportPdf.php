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
		      Education Board		
		</th>
		<th>
		      Created By		
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
		      <?php echo $v['eduboard_name']; ?>	
		</td>
		<td>
		      <?php echo User::model()->findByPk($v['eduboard_created_by'])->user_organization_email_id; ?>	
		</td>
		
		
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
