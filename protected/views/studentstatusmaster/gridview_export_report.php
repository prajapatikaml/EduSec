<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<table border="1">
		<tr>
			<th>SN.</th>
			<th>Status</th>
			<th>Created By</th>				
		</tr>
<?php
$k=0;
foreach($model as $m=>$v) {
          if($m <> 0) {
            ?>	<tr>
		<td>
		      <?php echo ++$k; ?>		
		</td>
 		<td> 	 	 	 	 	
		      <?php echo $v['status_name']; ?>			
		</td>
		
		<td>
		     <?php echo User::model()->findByPk($v['created_by'])->user_organization_email_id; ?>		
		</td>
		</tr> 
       <?php
    
       }// end if
     }// 
?>
</table>

