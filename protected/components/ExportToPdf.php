<?php
class ExportToPdf 
{
  	public function exportData($title,$filename,$html) 
	{

		$mpdf=Yii::app()->ePdf->mpdf('utf-8', 'A4',0,'',15,15,25,16,4,9,'P');		
		$org = Organization::model()->findAll();
		$org_image=CHtml::link(CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org[0]['organization_id'])),'No Image',array('width'=>90,'height'=>70))); 
		$org_name=$org[0]['organization_name'];
		$org_add=$org[0]['address_line1']."<br/>".$org[0]['address_line2'];
		//$org_add=$org->address_line1." ".$org->address_line2."<br/>" . City::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->city)->city_name.", ".State::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->state)->state_name.", ".Country::model()->findBypk(Organization::model()->findByPk(Yii::app()->user->getState('org_id'))->country)->name.".";

		$mpdf->SetHTMLHeader('<table style="border-bottom:1.6px solid #74b9fo;border-top:hidden;border-left:hidden;border-right:hidden;width:100%;"><tr style="border:hidden"><td vertical-align="center" style="width:35px;border:hidden" align="left">'.$org_image.'</td><td style="border:hidden;text-align:left;color:#555555;"><b style="font-size:22px;">'.$org_name.'</b><br/><span style="font-size:10.2px">'.$org_add.'</td></tr></table>');
		$stylesheet = file_get_contents('css/pdf.css'); // external css
		$mpdf->WriteHTML($stylesheet,0);
		$mpdf->WriteHTML('<watermarkimage src="/edusec-school/edusec_new_development/site/loadImage/id/'.$org[0]['organization_id'].'" alpha="0.33" size="50,30"/>');
		//$mpdf->SetWatermarkImage('images/rudraSoftech.png',0.5, '');
		$mpdf->showWatermarkImage = true;
		$arr = array (
		  'odd' => array (
		    'L' => array (
		      'content' => $title,
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'serif',
		      'color'=>'#27292b'
		    ),
		    'C' => array (
		      'content' => 'Page - {PAGENO}/{nbpg}',
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'serif',
		      'color'=>'#27292b'
		    ),
		    'R' => array (
		      'content' => 'Printed @ {DATE j-m-Y}',
		      'font-size' => 10,
		      'font-style' => 'B',
		      'font-family' => 'serif',
		      'color'=>'#27292b'
		    ),
		    'line' => 1,
		  ),
		  'even' => array ()
		);
		$mpdf->SetFooter($arr);
		$mpdf->WriteHTML('<sethtmlpageheader name="main" page="ALL" value="on" show-this-page="1">');
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename,"I");
	}
}
?>
