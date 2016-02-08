<?php
$this->breadcrumbs=array(
	'Employee Certificate'=>array('admin'),
	'Manage',
);
?>
<script>
function act()
{
   var certiid = $('input[type=checkbox]:checked').serialize();
    if(certiid) {
      if(confirm('Are you sure want to delete?'))  {     
          $.post('<?php echo Yii::app()->createUrl("/employee/employeeCertificateDetailsTable/delete"); ?>', certiid, function(response) {
              $.fn.yiiGridView.update('employee-certificate-details-table-grid');
	  });
      }
    }
}
</script>

<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Manage Employee Certificates</span>
</div>
 <div class="operation">
  <?php echo CHtml::link('<i class="fa fa-plus-square"></i>Add', Yii::app()->urlManager->createUrl('certificate/employeeCertificategeneration'), array('class'=>'btn green'));?>
  <?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF', array('/site/export.exportPDF', 'model'=>get_class($model)), array('class'=>'btnyellow', 'target'=>'_blank'));?>
  <?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('/site/export.exportExcel', 'model'=>get_class($model)), array('class'=>'btnblue'));?>
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
	'id'=>'employee-certificate-details-table-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('certificate/employeecertificategeneration', array('sctid'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",		
	'columns'=>array(
		array(
		        'class'=>'CCheckBoxColumn',    
			'selectableRows'=>2, 	
			'checkBoxHtmlOptions' => array(
		        'name' => 'certiid[]',
	    	),
		),
		array('name'=>'employee_first_name',
			'value'=>'$data->cer_employee_id->employee_first_name.\'----\'.$data->cer_employee_id->employee_attendance_card_id',
		),		

		array('name'=>'employee_certificate_type_id',
			'value'=>'Certificate::model()->findByPk($data->employee_certificate_type_id)->certificate_title',
			'filter' =>Certificate::items1(),

		),
	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
//		'maxButtonCount'=>25,
		'header'=>''
	    ),
)); ?>
<?php echo CHtml::button('Delete',array('class'=>'submit','onclick'=>'act();','style'=>'font-family:inherit;margin-top:0px;'));?>
<?php $this->endWidget(); ?></div></div>
