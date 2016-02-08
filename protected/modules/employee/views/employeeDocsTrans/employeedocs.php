<?php if(Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData')  && (Yii::app()->user->getState('emp_id') == $_REQUEST['id']) || Yii::app()->user->checkAccess('EmployeeTransaction.UpdateAllEmployeeData')) { 
   echo CHtml::link('<i class="fa fa-plus-square"></i> Add', array('employeeDocsTrans/create' ,'id'=>$_REQUEST['id']), array('id'=>'docid','class'=>'submit btn btn-add', 'style'=>'float: right; font-weight: 600;'));
    }?>
<div class="form">

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-docs-final_view',
	'dataProvider'=>$emp_doc->mysearch(),
	'enableSorting'=>false,

	'columns'=>array(
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
              'value'=>'date_format(new DateTime($data->Rel_Emp_doc->employee_docs_submit_date), "d-m-Y")',
          	),

		array(
			'class'=>'MyCButtonColumn',
			'template' => '{delete}',
			'buttons'=>array(
                        
                        'delete' => array(
				
				'url'=>'Yii::app()->createUrl("/employee/employeeDocsTrans/delete", array("id"=>$data->employee_docs_trans_id))',

                        ),
		   ),
		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$emp_doc->count(),
		'header'=>''
	    ),
)); ?>
</div>

