<?php
$this->breadcrumbs=array(
	'Student Certificate'=>array('admin'),
	'Manage',
);
?>
<script>
function act()
{
  var certiid = $('input[type=checkbox]:checked').serialize();
    if(certiid) {
      if(confirm('Are you sure want to delete?'))  {     
          $.post('<?php echo Yii::app()->createUrl("/student/studentCertificateDetailsTable/delete"); ?>', certiid, function(response) {
              $.fn.yiiGridView.update('student-certificate-details-table-grid');
	  });
      }
    }
}
</script>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"> <span class="box-title">Manage Student Certificate</span>
<div class="operation">
<?php echo CHtml::link('Add New', Yii::app()->urlManager->createUrl('certificate/Certificategeneration', 'page'=>Yii::app()->request->getParam('page')), array('class'=>'btn green'));
   echo CHtml::link('PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));
   echo CHtml::link('Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue')); 
?>
    </div>
</div>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>
<div class="form">
<?php 
$form=$this->beginWidget('CActiveForm', array(
        'id'=>'book-search-form',
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-certificate-details-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('certificate/certiview',  array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		 array(
                      'class'=>'CCheckBoxColumn',    
		      'selectableRows'=>2, 	
		      'checkBoxHtmlOptions' => array(
                         'name' => 'certiid[]',
	    	      ),
		      'value'=>'$data->student_certificate_details_table_id',    	
	        ),
		array('name'=>'student_first_name',
			'value'=>'$data->cer_student_id->student_first_name',
		), 

		array('name'=>'student_last_name',
			'value'=>'$data->cer_student_id->student_last_name',
		), 

		array('name'=>'student_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->student_certificate_type_id)->certificate_title',
			'filter' =>Certificate::items(),

		),
		'certificate_reference_number',
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?><?php $this->endWidget(); ?>
<?php echo CHtml::button('Delete',array('class'=>'submit','onclick'=>'act();','style'=>'font-family:inherit;margin-top:0px;'));?>
</div></div>
