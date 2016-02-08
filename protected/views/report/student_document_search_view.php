<?php
$this->breadcrumbs=array('Report',
	'Student Document Search',
	
);?>

<div class="portlet box blue view" style="width:100%">
	<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Document Search Details</span>
</div>
	<div class="operation">
	<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('studentDocumentsearch'), array('class'=>'btnyellow'));?>
	</div>
  	<div class="portlet-body">
<table  border="2px" class="report-table">
<tr class="row">
	<td class="col1">Document</td>
	<td class="col2"><?php echo DocumentCategoryMaster::model()->findByPk($cat_id)->doc_category_name;?></td>
</tr>
</table>
</div>
</div>

<div class="portlet box blue" style="margin-top:50px;">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Search Results</span>
</div>
<?php
$dataProvider =$model->newsearch($cat_id);
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-search-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'student_roll_no',		
		//'student_enroll_no',
		'student_first_name',
		array(
                'name'=>'Document File',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->title),Yii::app()->baseUrl."/college_data/stud_docs/".$data->student_docs_path, $htmlOptions=array("target"=>"_blank"))',

          	),
		array(
		'header'=>'Document Type',
		'value'=>'DocumentCategoryMaster::model()->findByPk($data->doc_category_id)->doc_category_name',
		),
		array(
                'name'=>'Submit Date',
	        'value'=>'date_format(new DateTime($data->student_docs_submit_date), "d-m-Y")',
          	),
	
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
