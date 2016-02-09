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
 * This is the model class for table "city".
 * @package EduSec.models
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property integer $city_state_id
 * @property integer $city_country_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property State $cityState
 * @property Country $cityCountry
 * @property EmpAddress[] $empAddresses
 * @property StuAddress[] $stuAddresses
 * @property StuAdmissionMaster[] $stuAdmissionMasters
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    public static function find()
    {
	return parent::find()->andWhere(['<>', 'is_status', 2]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'city_state_id', 'city_country_id', 'created_at', 'created_by'], 'required', 'message' => ''],
            [['city_state_id', 'city_country_id', 'created_by', 'updated_by', 'is_status'], 'integer', 'message' => ''],
            [['created_at', 'updated_at'], 'safe'],
            [['city_name'], 'string', 'max' => 35],
            [['city_name', 'city_state_id'], 'unique', 'targetAttribute' => ['city_name', 'city_state_id'], 'message' => 'The combination of City Name and State has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City/Town',
            'city_state_id' => 'State/Province',
            'city_country_id' => 'Country',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityState()
    {
        return $this->hasOne(State::className(), ['state_id' => 'city_state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'city_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpAddresses()
    {
        return $this->hasMany(EmpAddress::className(), ['emp_padd_city' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuAddresses()
    {
        return $this->hasMany(StuAddress::className(), ['stu_padd_city' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuAdmissionMasters()
    {
        return $this->hasMany(StuAdmissionMaster::className(), ['stu_padd_city' => 'city_id']);
    }
}
