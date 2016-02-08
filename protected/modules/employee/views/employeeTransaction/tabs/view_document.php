<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-final_view',
	'dataProvider'=>$emp_doc->mysearch(),
//	'filter'=>$model,
	//'ajaxUpdate'=>false,
	'summaryText'=>'',
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
