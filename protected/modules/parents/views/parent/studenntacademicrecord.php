<?php
$this->breadcrumbs=array(
	'Student'=>'',
	'Qualifications',
);?>
<div id="form6" class="info-form">
<fieldset>
	<legend>Student Qualifications</legend>
<?php

//echo CHtml::button('Add', array('class'=>'submit', 'id'=>'stud_doc_id1', 'submit'=>array('studentAcademicRecordTrans/create', 'id'=>$model->student_transaction_id))); 
	
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-academic-record-trans-grid',
	'dataProvider'=>$stud_qua->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(
	
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		
		array('name' => 'student_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_student_qualification->qualification_name',
                     ),
		array('name' => 'student_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_student_eduboard->eduboard_name',
                     ),
		array('name' => 'student_academic_record_trans_record_trans_year_id',
			'value' => '$data->Rel_student_year->year',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),
		
		
	),
	'pager'=>array(
		'class'=>'AjaxList',
	//	'maxButtonCount'=>25,
		'maxButtonCount'=>$stud_qua->count(),
		'header'=>''
	    ),
)); 

	$config = array( 
		    'scrolling' => 'no',
		    'autoDimensions' => false,
		    'width' => '755',
		    'height' => '430', 
		    'titleShow' => false,
		    'overlayColor' => '#000',
		    'padding' => '0',
		    'showCloseButton' => true,
		    'onClose' => function() {
				return window.location.reload();
			    },

		// change this as you need
		);


		$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'a#update-qualification', 'config'=>$config));
?>
</fieldset>
</div>
