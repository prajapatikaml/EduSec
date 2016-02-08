<script type="text/javascript">
function addCourseUnit()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('courseUnitTable/newCreate?courseId='.$_REQUEST['id']),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogCourseUnit div.divForForm').html(data.div);
                    $('#dialogCourseUnit div.divForForm form').submit(addCourseUnit);
                }
                else
                {
		    $('#dialogCourseUnit').dialog('close');
		    js:$.fn.yiiGridView.update('course-unit-table-grid');
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

<h1>Unit of this course</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$courseModel,
	'attributes'=>array(
		'course_name',
		array(
		  'name'=>'course_category_id',
		  'value'=> $courseModel->relCat->qualification_type_name,
		),
		'course_completion_hours',
		'course_cost',
	),
)); ?>

<div class="ope">
<?php echo CHtml::link('Add Course Units', "",  array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{addCourseUnit(); $('#dialogCourseUnit').dialog('open');}"));
?>

<?php echo CHtml::ajaxLink("Delete", $this->createUrl('multiDel'), array("type" => "post",
 "data" => "js:{chk:$.fn.yiiGridView.getSelection('course-unit-table-grid')}",
 "success" => 'function() { $.fn.yiiGridView.update("course-unit-table-grid") }' )); ?>
</div>
 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-unit-table-grid',
	'dataProvider'=>$model->coursewisesearch(),
	'filter'=>$model,	
 	'selectableRows'=>2,
	'summaryText'=>'',
	'selectionChanged'=>'
		function(id){
			 id=$.fn.yiiGridView.getSelection(id);
                      $.ajax({
                                "type":"POST",
				"dataType":"html",
                                "url":"'.CHtml::normalizeUrl(array("view")).'",
                                "data": "id="+id,
                                "success":function(data){
				 $(".items td").click(function() {
				   if(!$(this).hasClass("checkbox-column")) {
					//alert("checkbox");
					$("#unitData").html(data);
				   	$("#custom-dialog").dialog("open");
					
				   }
				   
				});
			 },				  
                    });
		}',
	'columns'=>array(
 		array(
                          'class'=>'CCheckBoxColumn',   
                          'id'=>'chk',
			  'value'=>'$data->course_unit_id',
                ),
		'course_unit_ref_code',
		'course_unit_name',
		'course_unit_level',
		'course_unit_credit',
		'course_unit_hours',
		/*'course_unit_created_by',
		'course_unit_creation_date',
		*/

	),
)); ?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'custom-dialog',
    'options'=>array(
        'autoOpen'=>false,
	'width'=> 900,
	'modal'=> true,
	'position'=> "center",
	'autoOpen'=>false,
	'title'=> "Unit of this course",
	'overlay'=> array('opacity'=>0.5, 'background'=>"black"),
	'htmlOptions'=>array('class'=>'custom-dialog'),
	'close'=>'js:function(event, ui) { window.location.href = "admin?id='.$_REQUEST['id'].'"; }'
    ),
));
?>
<div id="unitData"></div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'dialogCourseUnit',
    'options'=>array(
        'title'=>'Add Course Units',
        'autoOpen'=>false,
	'position'=> "center",
        'modal'=>true,
        'width'=>900,
	'height'=>450,
    ),
));?>
<div class="divForForm"></div>
 
<?php $this->endWidget();?>
