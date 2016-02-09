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
 * Class used for fetch different date/time formate when required.
 * 
 * @package EduSec.components 
 */

namespace app\components;

use Yii;
use yii\base\Component;

class DateFormat extends Component
{         
        public function getDateFormat($param)
        {
                $datef = (!empty($param) ? date('Y-m-d',strtotime($param)) : NULL);
                return $datef;
        }

	public function getDTFormat($param) // for event date
        {
                $datef = (!empty($param) ? date("d-m-Y H:i:s", $param) : NULL);
                return $datef;
        }

	public function getDateTimeFormat($param)
        {
                $datet = (!empty($param) ? Yii::$app->formatter->asDateTime($param) : NULL);
                return $datet;
        }

	public function storeDateTimeFormat($param)
        {
                $datet = (!empty($param) ? date('Y-m-d H:i:s',strtotime($param)) : NULL);
                return $datet;
        }

	public function getDateDisplay($param)
        {
                $datef = (!empty($param) ? Yii::$app->formatter->asDate($param) : NULL);
                return $datef;
        }
}
?>
