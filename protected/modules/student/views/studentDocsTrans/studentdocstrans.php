<?php  if(Yii::app()->user->checkAccess('StudentTransaction.UpdateStudentData')  && (Yii::app()->user->getState('stud_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('StudentTransaction.UpdateAllStudentData')) {

echo CHtml::link('<i class="fa fa-plus-square"></i> Add',array('StudentDocsTrans/Create','id'=>$_REQUEST['id']),array('id'=>'docid','class'=>'submit btn btn-add', 'style'=>'float: right; font-weight: 600;'));
}
?>

<div id="form">
<?php $visible=Yii::app()->user->checkAccess("StudentDocsTrans.Delete")? true : false; ?>
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

		array(
			'class'=>'MyCButtonColumn',
			'template' => '{delete}',
			'buttons'=>array(
			     
                        'delete' => array(
				'url'=>'Yii::app()->createUrl("student/studentDocsTrans/delete", array("id"=>$data->student_docs_trans_id))',
                        ),
			'update' => array(
				'label'=>'',
				'url'=>'',
                        ),
		),
			'visible'=>$visible,	
	    ),
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$studentdocstrans->count(),
		'header'=>''
	    ),
)); ?>
</div>
