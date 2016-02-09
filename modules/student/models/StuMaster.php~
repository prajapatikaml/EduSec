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
use app\modules\course\models\Batches;
use app\modules\course\models\Courses;
use app\models\User;
/**
 * This is the model class for table "stu_master".
 *
 * @property integer $stu_master_id
 * @property integer $stu_master_stu_info_id
 * @property integer $stu_master_user_id
 * @property integer $stu_master_nationality_id
 * @property integer $stu_master_category_id
 * @property integer $stu_master_course_id
 * @property integer $stu_master_batch_id
 * @property integer $stu_master_section_id
 * @property integer $stu_master_stu_status_id
 * @property integer $stu_master_stu_address_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property StuDocs[] $stuDocs
 * @property StuGuardians[] $stuGuardians
 * @property StuInfo[] $stuInfos
 * @property Users $updatedBy
 * @property StuInfo $stuMasterStuInfo
 * @property Users $stuMasterUser
 * @property Nationality $stuMasterNationality
 * @property StuCategory $stuMasterCategory
 * @property Courses $stuMasterCourse
 * @property Batches $stuMasterBatch
 * @property Section $stuMasterSection
 * @property StuStatus $stuMasterStuStatus
 * @property StuAddress $stuMasterStuAddress
 * @property Users $createdBy
 */
class StuMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $report_batch_id,$report_section_id,$report_city;
    public static function tableName()
    {
        return 'stu_master';
    }

    public static function find()
    {
	return parent::find()->andWhere(['<>', 'stu_master.is_status', 2]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_master_stu_info_id', 'stu_master_user_id', 'stu_master_course_id', 'stu_master_batch_id', 'stu_master_section_id', 'created_at', 'created_by'], 'required', 'message' => ''],
	    [['report_batch_id','report_section_id','report_city'],'integer'],	
            [['stu_master_stu_info_id', 'stu_master_user_id', 'stu_master_nationality_id', 'stu_master_category_id', 'stu_master_course_id', 'stu_master_batch_id', 'stu_master_section_id', 'stu_master_stu_status_id', 'stu_master_stu_address_id', 'created_by', 'updated_by', 'is_status'], 'integer', 'message' => ''],
            [['created_at', 'updated_at', 'stu_master_stu_status_id'], 'safe'],
            [['stu_master_stu_info_id'], 'unique'],
            [['stu_master_user_id'], 'unique']
        ];
    }
	    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_master_id' => 'Stu Master ID',
            'stu_master_stu_info_id' => 'Stu Info ID',
            'stu_master_user_id' => 'User',
            'stu_master_nationality_id' => 'Nationality',
            'stu_master_category_id' => 'Admission Category',
            'stu_master_course_id' => 'Course',
            'stu_master_batch_id' => 'Batch',
            'stu_master_section_id' => 'Section',
            'stu_master_stu_status_id' => 'Student Status',
            'stu_master_stu_address_id' => 'Stu Address ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Active/InActive',
	    'report_batch_id' => 'Batch',	
	    'report_section_id' => 'Section',	
	    'report_city' => 'City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuDocs()
    {
        return $this->hasMany(StuDocs::className(), ['stu_docs_stu_master_id' => 'stu_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuGuardians()
    {
        return $this->hasMany(StuGuardians::className(), ['guardia_stu_master_id' => 'stu_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuInfos()
    {
        return $this->hasMany(StuInfo::className(), ['stu_info_stu_master_id' => 'stu_master_id']);
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
    public function getStuMasterStuInfo()
    {
        return $this->hasOne(StuInfo::className(), ['stu_info_id' => 'stu_master_stu_info_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterUser()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'stu_master_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterNationality()
    {
        return $this->hasOne(\app\models\Nationality::className(), ['nationality_id' => 'stu_master_nationality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterCategory()
    {
        return $this->hasOne(StuCategory::className(), ['stu_category_id' => 'stu_master_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterCourse()
    {
        return $this->hasOne(\app\modules\course\models\Courses::className(), ['course_id' => 'stu_master_course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterBatch()
    {
        return $this->hasOne(\app\modules\course\models\Batches::className(), ['batch_id' => 'stu_master_batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterSection()
    {
        return $this->hasOne(\app\modules\course\models\Section::className(), ['section_id' => 'stu_master_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterStuStatus()
    {
        return $this->hasOne(StuStatus::className(), ['stu_status_id' => 'stu_master_stu_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasterStuAddress()
    {
        return $this->hasOne(StuAddress::className(), ['stu_address_id' => 'stu_master_stu_address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'created_by']);
    }
}
