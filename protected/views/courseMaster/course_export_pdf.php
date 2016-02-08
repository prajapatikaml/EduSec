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
		      Course Name 	</th>
		<th align="center" >
		      Course Category	</th>
		<th align="center" >
		      Course Level	</th>
		<th align="center" >
		      Course Completion Hours</th>
		<th align="center" >
		     	Course code</th>
		<th align="center" >
		     	Course cost</th>
		<th align="center" >
		     	Created By</th>

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
			<?php echo $v['course_name']; ?>
		</td>	
		<td>	
			<?php echo QualificationType::model()->findByPk($v['course_category_id'])->qualification_type_name;?> 		
		</td>    
		<td>	
			<?php echo $v['course_level']; ?>
		</td>  
		<td>	
			<?php echo $v['course_completion_hours']; ?>
		</td> 

		<td>	
			<?php echo $v['course_code']; ?>	
		</td>  
		<td>	
			<?php echo $v['course_cost']; ?>
		</td>	
			<td>	
			<?php echo User::model()->findByPk($v['course_created_by'])->user_organization_email_id;?> 		
		</td>    


</tr>
	<?php $k++;?>
	 <?php  }// end if
	
	}// end for loop?>
     </table>

<?php endif; ?>
