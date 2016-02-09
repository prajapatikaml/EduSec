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
 * Student dependent controller use as a ajax request for student modules
 *
 * @package EduSec.modules.student.controllers
 */

namespace app\modules\student\controllers;

use yii\web\Controller;

class DependentController extends Controller
{

	// get student batch based on course selection -------------------

	public function actionStudbatch($id){

		$rows = \app\modules\course\models\Batches::find()->where(['batch_course_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select Batch---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->batch_id'>$row->batch_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}

	// get student section based on batch selection -------------------

	public function actionStudsection($id){

		$rows = \app\modules\course\models\Section::find()->where(['section_batch_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select Section---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->section_id'>$row->section_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}
	
	// get student country's state based on current country updation -----------

	public function actionUstud_c_state($id){

		$rows = \app\models\State::find()->where(['state_country_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select State---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->state_id'>$row->state_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}

	// get student state's city based on current state updation -----------

	public function actionUstud_c_city($id){

		$rows = \app\models\City::find()->where(['city_state_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select City---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->city_id'>$row->city_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}
	
	// get student country's state based on international country updation -----------

	public function actionUstud_p_state($id){

		$rows = \app\models\State::find()->where(['state_country_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select State---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->state_id'>$row->state_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}

	// get student state's city based on international state updation -----------

	public function actionUstud_p_city($id){

		$rows = \app\models\City::find()->where(['city_state_id' => $id, 'is_status' => 0])->all();
	 
		echo "<option value=''>---Select City---</option>";
	 
		if(count($rows)>0){
		    foreach($rows as $row){
		        echo "<option value='$row->city_id'>$row->city_name</option>";
		    }
		}
		else{
		    echo "";
		}
 
    	}
}
