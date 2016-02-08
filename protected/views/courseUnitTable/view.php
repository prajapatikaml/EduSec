<!--<?php $course = $model->course_unit_master_id; ?>
<style>
.error.required {
  color: red;
}
</style>
<script type="text/javascript">
function updateCourseUnit()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('courseUnitTable/newUpdate?id='.$_REQUEST['id']),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#updateCourseUnit div.divUpdateForm').html(data.div);
                    $('#updateCourseUnit div.divUpdateForm form').submit(updateCourseUnit);
                }
                else
                {
		    $('#updateCourseUnit').dialog('close');
		    window.location='admin?id='+$course;
                }
 
            } ",
            ))?>;
    return false; 
 
}

function addLessonUnit()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('unitDetailTable/newcreate?id='.$_REQUEST['id'].'&cid='.$course),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#addLesson div.divLessonForm').html(data.div);
                    $('#addLesson div.divLessonForm form').submit(addLessonUnit);
                }
                else
                {
		    $('#addLesson').dialog('close');
		    window.location='admin?id='+$course;
                }
 
            } ",
            ))?>;
    return false; 
 
}
 
</script>
<?php
$this->breadcrumbs=array(
	'Course Master'=>array('courseMaster/admin'),
	'Manage',
);
?>

<h1>View Course Unit Details  </h1>

<div class="ope">

<?php echo CHtml::link('Add Lesson', "",  array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{addLessonUnit(); $('#addLesson').dialog('open');}"));
?>

<?php echo CHtml::link('Edit', "",  array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{updateCourseUnit(); $('#updateCourseUnit').dialog('open');}"));
?>

<?php echo CHtml::link('Delete', array('delete','id'=>$model->course_unit_id, 'courseId'=>$model->course_unit_master_id), array("onclick" => "return (confirm('Are you sure want to delete this units ?'))")); ?>

</div>
-->
<?php 
	
?>

<h1>View Course Unit Details</h1>


<div class="operation">
<?php echo CHtml::link('Back', array('/courseMaster/view','id'=>$model->course_unit_master_id), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->course_unit_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->course_unit_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>


<?php $this->widget('ext.DetailView4Col', array(
	'data'=>$model,
	'attributes'=>array(
		'course_unit_ref_code',
		'course_unit_name',
		'course_unit_level',
		'course_unit_credit',
		'course_unit_hours',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>

<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
          
         'Course Lessons' =>$this->renderPartial("application.views.unitDetailTable.admin", array('lesson'=>$unitLesson,'unitid'=>$model->course_unit_id), $this),

        ),        
        'options'=>array(
            'collapsible'=>true,
        ),
	'htmlOptions'=>array('class'=>'profile-tab', 'style'=>'float: left; width: 700px;'),
    ));
?>



<!--
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'updateCourseUnit',
    'options'=>array(
        'title'=>'Add Course Units',
        'autoOpen'=>false,
	'position'=> "center",
        'modal'=>true,
        'width'=>900,
	'height'=>450,

    ),
));?>
<div class="divUpdateForm"></div>
 
<?php $this->endWidget();?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'addLesson',
    'options'=>array(
        'title'=>'Add Course Units',
        'autoOpen'=>false,
	'position'=> "center",
        'modal'=>true,
        'width'=>900,
	'height'=>450,

    ),
));?>
<div class="divLessonForm"></div>
 
<?php $this->endWidget();?>



