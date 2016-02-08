<?php

$this->breadcrumbs=array(
	'AICTE Report',
);

Yii::app()->clientScript->registerCss('tableCss', '
[class^="icon-"], [class*=" icon-"] {
  color: #666; 
  text-decoration: none; 
  font-size: 80px; 
  margin-bottom: 10px;
  padding-left: 5px;
}
');

?>
<div class='aictReport'>
  <ul class="links">
	<?php if(Yii::app()->user->checkAccess('ExportToPDFExcel.AdminlibdataExportToExcel')) { ?>
       <li>
       <?php echo CHtml::link("<i class='icon-h-sign' title='Attendance'>&#xf01a;</i>Admin Staff Report",array('/site/export.exportExcel', 'model'=>'EmployeeTransaction','adminstaff'=>'ad'));?>
       </li>
	<?php } ?>

	<?php if(Yii::app()->user->checkAccess('ExportToPDFExcel.EmployeedataExportToExcel')) { ?>
       <li>
       <?php echo CHtml::link("<i class='icon-h-sign' title='Attendance'>&#xf01a;</i>Faculty Report",array('/site/export.exportExcel', 'model'=>'EmployeeTransaction','faculty'=>'fal'));?>
       </li>
	<?php } ?>


	<?php if(Yii::app()->user->checkAccess('ExportToPDFExcel.TechnicalstaffdataExportToExcel')) { ?>
       <li>
       <?php echo CHtml::link("<i class='icon-h-sign' title='Attendance' >&#xf01a;</i>Technical Staff Report",array('/site/export.exportExcel', 'model'=>'EmployeeTransaction','technical'=>'tech'));?>
       </li>
	<?php } ?>
	

	<?php if(Yii::app()->user->checkAccess('ExportToPDFExcel.StudentdataExportExcel')) { ?>
       <li>
       <?php echo CHtml::link("<i class='icon-h-sign' title='Attendance' >&#xf01a;</i>Student Report",array('/site/export.exportExcel', 'model'=>'StudentTransaction','studentdata'=>'data'));?>
       </li>
	<?php } ?>
  </ul>
</div>
