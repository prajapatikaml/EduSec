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
		      Academic Year	</th>
		<th width="80px">
		      Created By	</th>
		
	
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
			<?php echo $v['academic_term_period']; ?>
		</td>	
		<td>
		      <?php echo User::model()->findBypk($v['academic_terms_period_created_by'])->user_organization_email_id; ?>	
		</td>		
		 
	</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
