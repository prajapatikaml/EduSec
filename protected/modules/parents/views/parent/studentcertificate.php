<?php
$this->breadcrumbs=array(
	'Student'=>'',
	'Certificates',
);?>
<div id="form8" class="info-form">
<fieldset>
	<legend>Certificates</legend>
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
			'filter' =>CHtml::listData(Certificate::model()->findAll(array('condition'=>'certificate_organization_id='.Yii::app()->user->getState('org_id'))),'certificate_id','certificate_title'),

		),
		array('name'=>'Organization',
			'value'=>'Organization::model()->findByPk($data->student_certificate_org_id)->organization_name',
			'filter' => false,
		),
		),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$studentcertificate->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
</fieldset>
</div>
