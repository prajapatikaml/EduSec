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
		<th>
		      SN.		</th>
 		<th width="60px">
		      Name	</th>
		<th width="80px">
		     Designation Level       </th>
		<th>
		     Created By		
		</th>
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
			<?php echo $v['employee_designation_name']; ?>
		</td>	
		<td>
			<?php echo $v['employee_designation_level']; ?>
		</td>
		<td>
		      <?php echo User::model()->findBypk($v['employee_designation_created_by'])->user_organization_email_id; ?>	
		</td>
	
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
