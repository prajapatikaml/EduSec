<?php
session_start();

class exportPDF extends CAction{

    public function run($model){
	$pdf = new ExportToPdf;
	$data = $model::getExportData();
	$html = $this->controller->renderPartial($data['pdfFile'], array(
		'model'=>$data['data']
	), true);

	$pdf->exportData($data['filename'],$model.'.pdf',$html);
    }
}
?>
