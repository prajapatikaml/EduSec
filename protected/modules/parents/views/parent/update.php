<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	$model->Rel_Stud_Info->student_first_name,
	'Edit',
);
/*
if(Yii::app()->user->checkAccess('StudentTransaction.Create') || Yii::app()->user->checkAccess('StudentTransaction.*'))
$this->menu[]=array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Add'));

if(Yii::app()->user->checkAccess('StudentTransaction.Admin') || Yii::app()->user->checkAccess('StudentTransaction.*'))
$this->menu[]=array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage'));

if(Yii::app()->user->checkAccess('ExportTOPDFExcel.*'))
$this->menu[]=array('label'=>'', 'url'=>array('ExportToPDFExcel/StudentFinalViewExportToPdf', 'id'=>$_REQUEST['id']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export To Pdf','target'=>'_blank'));
*/
?>
<style>
.grid-view {
    padding-top: 0px;
}
</style>
<h1>Student Profile<?php //echo $key; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>$flag,'studentcertificate'=>$studentcertificate,'parent'=>$parent)); ?>
