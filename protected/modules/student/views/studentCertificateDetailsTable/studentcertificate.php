<div id="form">
<?php $visible=Yii::app()->user->checkAccess("studentCertificateDetailsTable.View")? true : false; ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-certificate-details-table-grid',
	'dataProvider'=>$studentcertificate->Studentsearch(),
	//'filter'=>$model,
	'columns'=>array(
	array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
			'header'=>'Name',
			'name'=>'student_first_name',
			'value'=>'$data->cer_student_id->student_first_name',
		), 
		

		array('name'=>'student_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->student_certificate_type_id)->certificate_title',
			'filter' =>CHtml::listData(Certificate::model()->findAll(), 'certificate_id', 'certificate_title'),

		),
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->student_certificate_org_id)->organization_name',
			'filter' => false,
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
			 'buttons'=>array(
			'view' => array(
				'url'=>'Yii::app()->createUrl("/certificate/certificategeneration", array("id"=>$data->student_certificate_type_id,"studid"=>$data->student_certificate_details_table_student_id,"eno"=>StudentInfo::model()->findByAttributes(array("student_info_transaction_id"=>$data->student_certificate_details_table_student_id))->student_enroll_no))',
                        ),
		),
			'visible'=>$visible,
	),),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$studentcertificate->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
</div>
