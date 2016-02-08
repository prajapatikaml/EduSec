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
		     Organization Email ID</th>
		
		<th align="center" >
		      User Type	</th>
		<th align="center" >
		      Created By</th>
		

		<th align="center" >
		     Organization</th>
		
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
			<?php echo $v['user_organization_email_id']; ?>
		</td>
		
		<td>
			<?php echo $v['user_type']; ?>
		</td>	
		
		<td>	
			
		      <?php echo User::model()->findBypk($v['user_created_by'])->user_organization_email_id; ?>	
		</td>			
 	
		<td>	
			<?php echo Organization::model()->findByPk($v['user_organization_id'])->organization_name;?> 	
		</td>  
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
