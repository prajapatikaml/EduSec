<?php
$this->breadcrumbs=array(
	'Student'=>array('update', 'id'=>$_REQUEST['id']),
	'Documents',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Documents
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateprofiletab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Academic Record', array('studentacademicrecord', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Document', array('Studentdocs', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

<div class="ui-tabs-panel form">

<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData')) {

echo CHtml::link('Add New+',array('StudentDocsTrans/Create','id'=>$_REQUEST['id']),array('class'=>'btn green'));
}
?>

	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-final_view',
	'dataProvider'=>$studentdocstrans->mysearch(),
//	'filter'=>$model,
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(
		
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array(
                'name'=>'Title',
                'type'=>'raw',
                'value'=>'CHtml::link(CHtml::encode($data->Rel_Stud_doc->title),Yii::app()->baseUrl."/college_data/stud_docs/".$data->Rel_Stud_doc->student_docs_path, $htmlOptions=array("target"=>"_blank"))',
          	),

		array('name' => 'Document Category',
	              'value' => 'DocumentCategoryMaster::model()->findByPk($data->Rel_Stud_doc->doc_category_id)->doc_category_name',
                ),

		array(
                'name'=>'Description',
               // 'type'=>'raw',
                'value'=>'$data->Rel_Stud_doc->student_docs_desc',
          	),
		array(
                'name'=>'Submit Date',
               // 'type'=>'raw',
                //'value'=>'$data->Rel_Stud_doc->student_docs_submit_date',
	        'value'=>'date_format(new DateTime($data->Rel_Stud_doc->student_docs_submit_date), "d-m-Y")',
          	),

	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$studentdocstrans->count(),
		'header'=>''
	    ),
	
)); ?>
</fieldset>
</div>
