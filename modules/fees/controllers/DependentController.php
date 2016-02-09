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
/**
 * Dependent controller it use ajax request.
 *
 * @package EduSec.modules.fees.controllers
 */

namespace app\modules\fees\controllers;
use yii\helpers\Html;
use yii\web\Controller;

class DependentController extends Controller
{

	//Get fees category based on batch selection in fees collection
	public function actionGetFeesCategory($id) 
	{
		$rows = \app\modules\fees\models\FeesCollectCategory::find()->where(['is_status'=>0, 'fees_collect_batch_id'=>$id])->all();	
		echo Html::tag('option', Html::encode('---Select Fees Collect Category---'), ['value'=>'']); 
		foreach($rows as $row)
			echo Html::tag('option',Html::encode($row->fees_collect_name), ['value'=>$row->fees_collect_category_id]); 
    	}

}
