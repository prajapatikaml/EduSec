<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
*****************************************************************************************/

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

class ExportDataController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
					'actions' => [
				],
			],
		];
	}

	public function actionExportToPdf($model)
	{
		$data = $model::getExportData();
		//print_r($data); exit;
		$type = 'Pdf';

		$html = $this->renderPartial($data['exportFile'], 
				['model'=>$data['data'],'type' => $type,
			]);

		return Yii::$app->pdf->exportData($data['title'], $data['fileName'],$html);

	}

	public function actionExportExcel($model) 
	{
		$data = $model::getExportData();
		$type = 'Excel';

		$file = $this->renderPartial($data['exportFile'], 
				['model'=>$data['data'],
				 'type'=>$type,
			]);
		$fileName = $data['fileName'].'.xls';
		$options = ['mimeType'=>'application/vnd.ms-excel'];

		return Yii::$app->excel->exportExcel($file, $fileName, $options);
	
	}

}
?>
