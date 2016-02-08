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

if ($model != null):?>
<?$k=0;?>
<table border="1">

	<tr>
		<th align="center">
		      SN.		
		</th>
		<th>
		      Organization 	
		</th>
		<th>
		      Address Line1	 	
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
		<th>
		     Pin	
		</th>
		<th>
		     Phone	
		</th>
		<th>
		     Website	
		</th>
		<th>
		     Email	
		</th>
		<th>
		     Fax No	
		</th>
		<th>
		     Created By		
		</th>
		<th>
		     Creation Date		
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
			<?php echo $v['organization_name']; ?>
		</td>
		<td>
			<?php echo $v['address_line1']; ?>
		</td>
		
		
		<td>
		     <?php echo City::model()->findByPk($v['city'])->city_name; ?>		
		</td>
			
		<td>
		     <?php echo State::model()->findByPk($v['state'])->state_name; ?>		
		</td>
		<td>
		     <?php echo Country::model()->findByPk($v['country'])->name; ?>		
		</td>
			
		<td>
			<?php echo $v['pin']; ?>
		</td>
		<td>
			<?php echo $v['phone']; ?>
		</td>
	
		<td>
			<?php echo $v['website']; ?>
		</td>
		<td>
			<?php echo $v['email']; ?>
		</td>
		<td>
			<?php echo $v['fax_no']; ?>
		</td>
		<td>
		     <?php echo User::model()->findByPk($v['organization_created_by'])->user_organization_email_id; ?>		
		</td>
		<td>
		      <?php echo $v['organization_creation_date']; ?>	
		</td>
			
 	   </tr> 
       <?php
    
       }// end if
     }// end for loop
	
?>
</table>
<?php endif; ?>
