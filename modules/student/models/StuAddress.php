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
 * @package EduSec.modules.student.model
 */
namespace app\modules\student\models;

use Yii;
use app\models\City;
use app\models\State;
use app\models\Country;
/**
 * This is the model class for table "stu_address".
 *
 * @property integer $stu_address_id
 * @property string $stu_cadd
 * @property integer $stu_cadd_city
 * @property integer $stu_cadd_state
 * @property integer $stu_cadd_country
 * @property integer $stu_cadd_pincode
 * @property string $stu_cadd_house_no
 * @property string $stu_cadd_phone_no
 * @property string $stu_padd
 * @property integer $stu_padd_city
 * @property integer $stu_padd_state
 * @property integer $stu_padd_country
 * @property integer $stu_padd_pincode
 * @property string $stu_padd_house_no
 * @property string $stu_padd_phone_no
 *
 * @property City $stuCaddCity
 * @property State $stuCaddState
 * @property Country $stuCaddCountry
 * @property City $stuPaddCity
 * @property State $stuPaddState
 * @property Country $stuPaddCountry
 * @property StuMaster[] $stuMasters
 */
class StuAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stu_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_cadd_city', 'stu_cadd_state', 'stu_cadd_country', 'stu_cadd_pincode', 'stu_padd_city', 'stu_padd_state', 'stu_padd_country', 'stu_padd_pincode'], 'integer'],
            [['stu_cadd', 'stu_padd'], 'string', 'max' => 255],
            [['stu_cadd_house_no', 'stu_cadd_phone_no', 'stu_padd_house_no', 'stu_padd_phone_no'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_address_id' => 'Stu Address ID',
            'stu_cadd' => 'Address',
            'stu_cadd_city' => 'City',
            'stu_cadd_state' => 'State',
            'stu_cadd_country' => 'Country',
            'stu_cadd_pincode' => 'Pincode',
            'stu_cadd_house_no' => 'House No',
            'stu_cadd_phone_no' => 'Phone No',
            'stu_padd' => 'Address',
            'stu_padd_city' => 'City',
            'stu_padd_state' => 'State',
            'stu_padd_country' => 'Country',
            'stu_padd_pincode' => 'Pincode',
            'stu_padd_house_no' => 'House No',
            'stu_padd_phone_no' => 'Phone No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuCaddCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'stu_cadd_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuCaddState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'stu_cadd_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuCaddCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'stu_cadd_country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuPaddCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'stu_padd_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuPaddState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'stu_padd_state']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuPaddCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'stu_padd_country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasters()
    {
        return $this->hasOne(StuMaster::className(), ['stu_master_stu_address_id' => 'stu_address_id']);
    }
}
