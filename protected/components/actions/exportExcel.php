<?php
session_start();
Yii::import('application.extensions.eexcelview.EExcelBehavior');
class exportExcel extends CAction {

    public function run($model) {

	$data = $model::getExportData();
	
	if(isset($data['data']))	
	EExcelBehavior::toExcel($data['data'],$data['attributes'],$data['filename'],
	array(
	    'creator' => 'Rudrasoftech',
	),
	'Excel5'
    );
	else{
		echo "No Data Found</br>"; 
		echo CHtml::link('Go Back',$_SERVER['HTTP_REFERER']);
	}			
  }
}
?>
