<?php
$this->breadcrumbs=array('Report',
	'Employee Document Search',
	
);

$dataProvider =$model->newsearch1($department_id);
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<div class="portlet box blue view" style="width:100%">
       <div class="portlet-title"> <i class="fa fa-plus"></i><span class="box-title">Document Search Details</span>
    </div>
    	<div class="operation">
	  <?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('documentsearch'), array('class'=>'btnyellow'));?>	
	</div>
<div class="portlet-body">
<table  class="report-table">
<tr class="row">
	<td class="col1">Department </td>
	<td class="col2"><?php echo Department::model()->findByPk($department_id)->department_name;?></td>
</tr>
<tr class="row">
	<td class="col1">Document</td>
		
	<td class="col2"><?php  if(!empty($category_id))
			echo DocumentCategoryMaster::model()->findByPk($category_id)->doc_category_name ;
			else 
			echo 'Not Set'; 
?></td>
</tr>
</table>
</div></div>
<div class="portlet box blue" style="margin-top:50px;">
<div class="portlet-title"><i class="fa fa-plus"></i> <span class="box-title">Search Results</span>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-search-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'employee_attendance_card_id',
		'employee_first_name',
		array(
                'name'=>'Document File',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->title),Yii::app()->baseUrl."/college_data/emp_docs/".$data->employee_docs_path, $htmlOptions=array("target"=>"_blank"))',
          	),
		array(
		'header'=>'Document Type',
		'value'=>'DocumentCategoryMaster::model()->findByPk($data->doc_category_id)->doc_category_name',
		),
		array(
                'name'=>'Submit Date',
	        'value'=>'date_format(new DateTime($data->employee_docs_submit_date), "d-m-Y")',
          	),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
