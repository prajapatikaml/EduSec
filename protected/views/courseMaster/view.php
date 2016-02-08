<h1>View Course </h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->course_master_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->course_master_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>
 
<table id="yw0" class="custom-view">
  <tbody>
    <tr class="odd">
     <td class="col2">
         <span class="detail-label">Course Name  :</span>
         <span class="detail-value"><?php echo $model->course_name; ?></span>
     </td>
     <td class="col2">
         <span class="detail-label">Course Category  :</span>
         <span class="detail-value"><?php echo $model->relCat->qualification_type_name; ?></span>
     </td>
    </tr>
    <tr class="even">
      <td class="col2">
         <span class="detail-label">Course Level  :</span>
         <span class="detail-value"><?php echo $model->course_level; ?></span>
      </td>
      <td class="col2">
         <span class="detail-label">Course Completion Hours  :</span>
         <span class="detail-value"><?php echo $model->course_completion_hours; ?></span>
       </td>
     </tr>
     <tr class="odd">
        <td class="col2">
           <span class="detail-label">Course Code  :</span>
           <span class="detail-value"><?php echo $model->course_code; ?></span>
        </td>
        <td class="col2">
           <span class="detail-label">Course Cost  :</span>
           <span class="detail-value"><?php echo $model->concated; ?></span></td>
    </tr>
    <tr class="even">
       <td class="col2 detail-area">
          <span class="detail-label">Course Description  :</span>
          <span class="detail-value"><?php echo $model->course_desc; ?></span>
        </td>
</tr></tbody></table>


</div>

<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
          'Course Units' =>$this->renderPartial("application.views.courseUnitTable.admin", array('unit'=>$unit), $this),
         // 'Course Lessons' =>$this->renderPartial("application.views.unitDetailTable.admin", array('lesson'=>$lesson), $this),

        ),        
        'options'=>array(
            'collapsible'=>true,
        ),
	'htmlOptions'=>array('class'=>'profile-tab', 'style'=>'float: left; width: 700px;'),
    ));
?>

