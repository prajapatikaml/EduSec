	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-docs-final_view',
	'dataProvider'=>$studentdocstrans->mysearch(),
//	'filter'=>$model,
	'summaryText'=>'',
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

