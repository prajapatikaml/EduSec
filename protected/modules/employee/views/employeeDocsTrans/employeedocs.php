<?php
$this->breadcrumbs=array(
	'Employee List'=>array('admin'),
	'Documents',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Documents
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateTab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Academic Record', array('EmployeeAcademicRecords', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Document', array('Employeedocs', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

</ul>

<div class="ui-tabs-panel form">

<?php 

  if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData')) { 

echo CHtml::link('Add New+',array('EmployeeDocsTrans/Create','id'=>$_REQUEST['id']),array('class'=>'btn green','style'=>'text-decoration:none;'));
}
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-final_view',
	'dataProvider'=>$emp_doc->mysearch(),
//	'filter'=>$model,
	//'ajaxUpdate'=>false,
	'enableSorting'=>false,
	'columns'=>array(
		//'employee_docs_trans_id',
		//'employee_docs_trans_user_id',
		//'employee_docs_trans_emp_docs_id',
		array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array(
                'name'=>'Title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->Rel_Emp_doc->title),Yii::app()->baseUrl."/college_data/emp_docs/".$data->Rel_Emp_doc->employee_docs_path, $htmlOptions=array("target"=>"_blank"))',
          	),
		array('name' => 'Document Category',
	              'value' => 'DocumentCategoryMaster::model()->findByPk($data->Rel_Emp_doc->doc_category_id)->doc_category_name',
                ),

		array(
                'name'=>'Description',
                //'type'=>'raw',
                'value'=>'$data->Rel_Emp_doc->employee_docs_desc',
          	),
		array(
                'name'=>'Submit Date',
               // 'type'=>'raw',
                //'value'=>'$data->Rel_Stud_doc->student_docs_submit_date',
	        'value'=>'date_format(new DateTime($data->Rel_Emp_doc->employee_docs_submit_date), "d-m-Y")',
          	),

	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$emp_doc->count(),
		'header'=>''
	    ),
)); ?>
</div>

