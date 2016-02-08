<script type="text/javascript">
function addCourse()
{
    <?php echo CHtml::ajax(array(
            'url'=>array('courseMaster/newCreate'),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogClassroom div.divForForm').html(data.div);
                    $('#dialogClassroom div.divForForm form').submit(addCourse);
                }
                else
                {
		    $('#dialogClassroom').dialog('close');
		    js:$.fn.yiiGridView.update('course-master-grid');
                }
 
            } ",
            ))?>;
    return false; 
 
}
 
</script>
<?php
$this->breadcrumbs=array(
	'Course Master'=>array('admin'),
	'Manage',
);
?>
<h1>Manage Courses</h1>
 
<div class="ope">

<?php echo CHtml::link('Add Course', "",  array(
        'style'=>'cursor: pointer; text-decoration: underline;',
        'onclick'=>"{addCourse(); $('#dialogClassroom').dialog('open');}"));
?>

<?php echo CHtml::ajaxLink("Delete", $this->createUrl('multiDel'), array("type" => "post",
 "data" => "js:{chk:$.fn.yiiGridView.getSelection('course-master-grid')}",
 "success" => 'function() { $.fn.yiiGridView.update("course-master-grid") }' )); ?>

</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-master-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
 	'selectableRows'=>2,
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
			  'value'=>'$data->course_master_id',
                ),  

		'course_name',
		array(
		  'name'=>'course_category_id',
		  'value'=>'$data->relCat->qualification_type_name',
		  'filter'=>CHtml::listData(QualificationType::model()->findAll(), 'qualification_type_id', 'qualification_type_name'), 
		),
		'course_level',
		'course_completion_hours',
		'course_code',
		array(
		   'name'=>'course_cost',
		   'value'=>'$data->concated',
		)
		/*'course_desc',
		'course_created_by',
		'course_creation_date',
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
	'title'=> "Unit of this course",
	'overlay'=> array('opacity'=>0.5, 'background'=>"black"),
	'htmlOptions'=>array('class'=>'custom-dialog'),
	'close'=>'js:function(event, ui) { window.location.href = "admin"; }'
    ),
));
?>
<div id="unitData"></div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClassroom',
    'options'=>array(
        'title'=>'Add Course',
        'autoOpen'=>false,
	'position'=> "center",
        'modal'=>true,
        'width'=>900,
	'height'=>450,
    ),
));?>
<div class="divForForm"></div>
 
<?php $this->endWidget();?>
