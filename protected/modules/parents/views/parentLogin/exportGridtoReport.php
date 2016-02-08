<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th >
		      parent_id		</th>
 		<th >
		      parent_user_name		</th>
 		<th >
		      parent_password		</th>
 		<th >
		      created_by		</th>
 		<th >
		      creation_date		</th>
 	</tr>
	<?php foreach($model as $row=>$v): 
	 if($row <> 0) {
            ?>
	<tr>
        		<td>
			<?php echo $v['parent_id']; ?>
		</td>
       		<td>
			<?php echo $v['parent_user_name']; ?>
		</td>
       		<td>
			<?php echo $v['parent_password']; ?>
		</td>
       		<td>
			<?php echo $v['created_by']; ?>
		</td>
       		<td>
			<?php echo $v['creation_date']; ?>
		</td>
       	</tr>
     <?php } endforeach; ?>
</table>
<?php endif; ?>
