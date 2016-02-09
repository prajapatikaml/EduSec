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

/**
 * This is the model class for table "stu_guardians".
 *
 * @property integer $stu_guardian_id
 * @property string $guardian_name
 * @property string $guardian_relation
 * @property string $guardian_mobile_no
 * @property string $guardian_phone_no
 * @property string $guardian_qualification
 * @property string $guardian_occupation
 * @property string $guardian_income
 * @property string $guardian_email
 * @property string $guardian_home_address
 * @property string $guardian_office_address
 * @property integer $guardia_stu_master_id
 *
 * @property StuMaster $guardiaStuMaster
 */
class StuGuardians extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stu_guardians';
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
            [['guardian_mobile_no', 'guardia_stu_master_id', 'created_by', 'is_emg_contact', 'updated_by', 'is_status'], 'integer'],
            [['guardia_stu_master_id', 'created_at', 'created_by', 'is_emg_contact'], 'required'],
            [['guardian_name', 'guardian_email'], 'string', 'max' => 65],
            [['guardian_relation'], 'string', 'max' => 30],
            [['guardian_phone_no'], 'string', 'max' => 25],
	    [['created_at', 'updated_at'], 'safe'],
            [['guardian_qualification', 'guardian_occupation', 'guardian_income'], 'string', 'max' => 50],
            [['guardian_home_address', 'guardian_office_address'], 'string', 'max' => 255],
            [['guardian_email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_guardian_id' => 'Stu Guardian ID',
            'guardian_name' => 'Name',
            'guardian_relation' => 'Relation',
            'guardian_mobile_no' => 'Mobile No',
            'guardian_phone_no' => 'Phone No',
            'guardian_qualification' => 'Qualification',
            'guardian_occupation' => 'Occupation',
            'guardian_income' => 'Income',
            'guardian_email' => 'Email',
            'guardian_home_address' => 'Home Address',
            'guardian_office_address' => 'Office Address',
            'guardia_stu_master_id' => 'Guardia Stu Master ID',
	    'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
	    'is_emg_contact' => 'Is Emg Contact',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuardiaStuMaster()
    {
        return $this->hasOne(StuMaster::className(), ['stu_master_id' => 'guardia_stu_master_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'created_by']);
    }
}
