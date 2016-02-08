<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'Rel_Stud_Info.student_roll_no',
		'Rel_Stud_Info.student_first_name',
		'Rel_Stud_Info.student_last_name', 
	),
)); ?>
