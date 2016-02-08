<?php
$this->breadcrumbs=array(
	'Institute'=>array('view', 'id'=>$model->organization_id),
	$model->organization_name,
);
?>

<h1>View Institute </h1>
<div class="operation">
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->organization_id), array('class'=>'btnupdate'));?>
</div>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<table id="yw0" class="custom-view">
  <tbody>
	<tr class="odd">
		<td class="col2"><span class="detail-label">Name  :</span><span class="detail-value"><?php echo $model->organization_name; ?></span></td>
		
	</tr>

	<tr class="even">
		<td class="col2"><span class="detail-label">Address Line1  :</span><span class="detail-value"><?php echo $model->address_line1; ?></span></td>
		<td class="col2"><span class="detail-label">Address Line2  :</span><span class="detail-value"><?php echo $model->address_line2; ?></span></td>
	</tr>
	<tr class="odd">
		<td class="col2"><span class="detail-label">Country  :</span><span class="detail-value"><?php echo $model->Rel_org_country->name; ?></span></td>
		<td class="col2"><span class="detail-label">State  :</span><span class="detail-value"><?php echo !empty($model->state) ? $model->Rel_org_state->state_name : 'N/A'; ?></span></td>

	</tr>
	<tr class="even">
		<td class="col2"><span class="detail-label">City  :</span><span class="detail-value"><?php echo !empty($model->city) ? $model->Rel_org_city->city_name : 'N/A'; ?></span></td>

		<td class="col2"><span class="detail-label">Pincode  :</span><span class="detail-value"><?php echo $model->pin; ?></span></td>
	</tr>
	<tr class="odd">
		<td class="col2"><span class="detail-label">website  :</span><span class="detail-value"><?php echo $model->website; ?></span></td>
		<td class="col2"><span class="detail-label">Email  :</span><span class="detail-value"><?php echo $model->email; ?></span></td>
	</tr>
	<tr class="even">
		<td class="col2"><span class="detail-label">Phone  :</span><span class="detail-value"><?php echo $model->phone; ?></span></td>

		<td class="col2"><span class="detail-label">Fax No  :</span><span class="detail-value"><?php echo $model->fax_no; ?></span></td>
	</tr>
</tbody>
</table>

</div>
