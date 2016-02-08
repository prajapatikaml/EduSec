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
		     User ID</th>
		<th align="center" >
		      Status</th>
		<th align="center" >
		      log In Time	</th>
		<th align="center" >
		      Log Out Time</th>
		
		<th align="center" >
		    User Ip Address</th>
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
			
		      <?php echo User::model()->findByPk($v['user_id'])->user_organization_email_id; ?>	
		</td>
		<td>
			<?php echo $v['status']; ?>
		</td>
		<td>
			<?php echo $v['log_in_time']; ?>
		</td>
		<td>
			<?php echo $v['log_out_time']; ?>
		</td>	
		
		<td>	
			
		      <?php echo $v['user_ip_address']; ?>	
		</td>			
 	
		<td>	
			<?php echo Organization::model()->findByPk($v['login_organization_id'])->organization_name;?> 	
		</td>  
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
