<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      SI No.		</th>
 		<th width="80px">
		      From Date		</th>
 		<th width="80px">
		      To Date		</th>
 		<th width="80px">
		      title		</th>
 		</tr>
	<?php $m=0;
		foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        	<td>
			<?php echo ++$m; ?>
		</td>
            	<td>
			<?php echo date('d-m-Y',strtotime($v['alert_after_date'])); ?>
		</td>
       		<td>
			<?php echo date('d-m-Y',strtotime($v['alert_before_date'])); ?>
		</td>
       		<td>
			<?php echo $v['title']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
