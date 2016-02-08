<?php
$this->breadcrumbs=array('Report',
	'Student Document Search',
	
);?>

<?php
echo CHtml::link('GO BACK',Yii::app()->createUrl('report/StudentDocumentsearch'));
?></br></br>

<table  border="2px" id="twoColThinTable">
<?php if($acdm_period !=0) { ?>
<tr class="row">
	<td class="col1">Academic Year</td>
	<td class="col2"><?php echo AcademicTermPeriod::model()->findByPk($acdm_period)->academic_term_period;?></td>
</tr>
<?php }  ?>
<?php if($sem !=0) {?>
<tr class="row">
	<td class="col1">Semester </td>
	<td class="col2"><?php echo AcademicTerm::model()->findByPk($sem)->academic_term_name;?></td>
</tr>
<?php } ?>
<?php if($branch_id !=0) { ?>
<tr class="row">
	<td class="col1">Branch</td>
	<td class="col2"><?php echo Branch::model()->findByPk($branch_id)->branch_name;?></td>
</tr>
<?php  } ?>
<tr class="row">
	<td class="col1">Document</td>
	<td class="col2"><?php echo DocumentCategoryMaster::model()->findByPk($cat_id)->doc_category_name;?></td>
</tr>
</table>
<?php
$dataProvider =$model->newsearch($branch_id,$cat_id,$acdm_period,$sem);
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-search-grid',
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
		'student_roll_no',		
		'student_enroll_no',
		'student_first_name',
		//'student_docs_path',

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
