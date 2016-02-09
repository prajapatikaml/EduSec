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
 * @package EduSec.modules.employee.models
 */

namespace app\modules\employee\models;

use Yii;
use app\models\City;
use app\models\State;
use app\models\Country;

/**
 * This is the model class for table "emp_address".
 *
 * @property integer $emp_address_id
 * @property string $emp_cadd
 * @property integer $emp_cadd_city
 * @property integer $emp_cadd_state
 * @property integer $emp_cadd_country
 * @property integer $emp_cadd_pincode
 * @property string $emp_cadd_house_no
 * @property string $emp_cadd_phone_no
 * @property string $emp_padd
 * @property integer $emp_padd_city
 * @property integer $emp_padd_state
 * @property integer $emp_padd_country
 * @property integer $emp_padd_pincode
 * @property string $emp_padd_house_no
 * @property string $emp_padd_phone_no
 *
 * @property Country $empPaddCountry
 * @property City $empCaddCity
 * @property State $empCaddState
 * @property Country $empCaddCountry
 * @property City $empPaddCity
 * @property State $empPaddState
 * @property EmpMaster[] $empMasters
 */
class EmpAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	    [['emp_cadd_city', 'emp_cadd_state', 'emp_cadd_country', 'emp_cadd_pincode', 'emp_padd_city', 'emp_padd_state', 'emp_padd_country', 'emp_padd_pincode','emp_cadd', 'emp_padd','emp_cadd_house_no', 'emp_cadd_phone_no', 'emp_padd_house_no', 'emp_padd_phone_no'],'safe'],	
            [['emp_cadd_city', 'emp_cadd_state', 'emp_cadd_country', 'emp_cadd_pincode', 'emp_padd_city', 'emp_padd_state', 'emp_padd_country', 'emp_padd_pincode'], 'integer'],
            [['emp_cadd', 'emp_padd'], 'string', 'max' => 255],
            [['emp_cadd_house_no', 'emp_cadd_phone_no', 'emp_padd_house_no', 'emp_padd_phone_no'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_address_id' => 'Address',
            'emp_cadd' => 'Address',
            'emp_cadd_city' => 'City/Town',
            'emp_cadd_state' => 'State/Province',
            'emp_cadd_country' => 'Country',
            'emp_cadd_pincode' => 'Pincode',
            'emp_cadd_house_no' => 'House No',
            'emp_cadd_phone_no' => 'Phone No',
            'emp_padd' => 'Address',
            'emp_padd_city' => 'City/Town',
            'emp_padd_state' => 'State/Province',
            'emp_padd_country' => 'Country',
            'emp_padd_pincode' => 'Pincode',
            'emp_padd_house_no' => 'House No',
            'emp_padd_phone_no' => 'Phone No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpPaddCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'emp_padd_country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpCaddCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'emp_cadd_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpCaddState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'emp_cadd_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpCaddCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'emp_cadd_country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpPaddCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'emp_padd_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpPaddState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'emp_padd_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasters()
    {
        return $this->hasMany(EmpMaster::className(), ['emp_master_emp_address_id' => 'emp_address_id']);
    }
}
