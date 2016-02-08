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
		<th width="80px">
		      SN.		</th>
 		<th width="80px">
		     Nationality	</th>
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
			<?php echo $v['nationality_name']; ?>

		</td>	
		<td>
		      <?php echo User::model()->findBypk($v['nationality_created_by'])->user_organization_email_id; ?>	
		</td>
		
  	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
