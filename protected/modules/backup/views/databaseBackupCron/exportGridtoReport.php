<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th >      SI No	</th>
		<th >   Schedule Time	</th>

 		<th >   Created By	</th>
 		<th >   Creation Date	</th>
 	</tr>

	<?php $i=0;
	foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        	<td>
			<?php echo ++$i; ?>
		</td>
	 	<td>
			<?php echo ScheduleTiming::model()->findByPk($v['database_backup_cron_schedule_time_id'])->schedule_timing_name; ?>
		</td>

       		<td>
			<?php echo User::model()->findByPk($v['database_backup_cron_created_by'])->user_organization_email_id;?>
		</td>
       		<td>
			<?php echo date_format(new DateTime($v['database_backup_cron_creation_date']), 'd-m-Y'); ?>
		</td>
       	       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
