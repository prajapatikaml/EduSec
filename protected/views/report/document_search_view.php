<?php
$this->breadcrumbs=array('Report',
	'Employee Document Search',
	
);
echo CHtml::link('GO BACK',Yii::app()->createUrl('report/documentsearch'));

echo "</br>";
echo "</br>";
$dataProvider =$model->newsearch($department_id,$category_id);
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Department </td>
	<td class="col2"><?php echo Department::model()->findByPk($department_id)->department_name;?></td>
</tr>
<tr class="row">
	<td class="col1">Document</td>
	<td class="col2"><?php echo DocumentCategoryMaster::model()->findByPk($category_id)->doc_category_name;?></td>
</tr>
</table>
<?php


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-search-grid',
	'dataProvider'=>$dataProvider,
//	'filter'=>$model,
	//'enableSorting'=>false,
	'columns'=>array(
		//'employee_docs_trans_id',
		//'employee_docs_trans_user_id',
		//'employee_docs_trans_emp_docs_id',
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'employee_attendance_card_id',
		//'employee_transaction_id',
		'employee_first_name',
		//'employee_docs_path',
		//'title',
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
