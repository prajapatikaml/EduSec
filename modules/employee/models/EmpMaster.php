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
use app\models\Nationality;
use app\models\User;
/**
 * This is the model class for table "emp_master".
 *
 * @property integer $emp_master_id
 * @property integer $emp_master_emp_info_id
 * @property integer $emp_master_user_id
 * @property integer $emp_master_department_id
 * @property integer $emp_master_designation_id
 * @property integer $emp_master_category_id
 * @property integer $emp_master_nationality_id
 * @property integer $emp_master_emp_address_id
 * @property integer $emp_master_status_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property EmpDocs[] $empDocs
 * @property EmpInfo[] $empInfos
 * @property Users $updatedBy
 * @property EmpInfo $empMasterEmpInfo
 * @property Users $empMasterUser
 * @property EmpDepartment $empMasterDepartment
 * @property EmpDesignation $empMasterDesignation
 * @property EmpCategory $empMasterCategory
 * @property Nationality $empMasterNationality
 * @property EmpAddress $empMasterEmpAddress
 * @property EmpStatus $empMasterStatus
 * @property Users $createdBy
 * @property EmpSectionAllot[] $empSectionAllots
 * @property SubjectAllocate[] $subjectAllocates
 */
class EmpMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_master';
    }

   
    public static function find()
    {
	return parent::find()->andWhere(['<>', 'emp_master.is_status', 2]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	    [['emp_master_emp_info_id','emp_master_department_id', 'emp_master_category_id','emp_master_emp_address_id'], 'required', 'message'=>''],
            [['emp_master_emp_info_id', 'emp_master_user_id', 'emp_master_department_id', 'emp_master_designation_id', 'emp_master_category_id', 'emp_master_nationality_id', 'emp_master_emp_address_id', 'emp_master_status_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['emp_master_emp_info_id'], 'unique'],
            [['emp_master_user_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_master_id' => 'Employee ID',
            'emp_master_emp_info_id' => 'Emp Master Emp Info ID',
            'emp_master_user_id' => 'User ',
            'emp_master_department_id' => 'Department',
            'emp_master_designation_id' => 'Designation ',
            'emp_master_category_id' => 'Category ',
            'emp_master_nationality_id' => 'Nationality ',
            'emp_master_emp_address_id' => 'Address',
            'emp_master_status_id' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Active/InActive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDocs()
    {
        return $this->hasMany(EmpDocs::className(), ['emp_docs_emp_master_id' => 'emp_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpInfos()
    {
        return $this->hasMany(EmpInfo::className(), ['emp_info_emp_master_id' => 'emp_master_id']);
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
    public function getEmpMasterEmpInfo()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_info_id' => 'emp_master_emp_info_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterUser()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'emp_master_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterDepartment()
    {
        return $this->hasOne(EmpDepartment::className(), ['emp_department_id' => 'emp_master_department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterDesignation()
    {
        return $this->hasOne(EmpDesignation::className(), ['emp_designation_id' => 'emp_master_designation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterCategory()
    {
        return $this->hasOne(EmpCategory::className(), ['emp_category_id' => 'emp_master_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterNationality()
    {
        return $this->hasOne(Nationality::className(), ['nationality_id' => 'emp_master_nationality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterEmpAddress()
    {
        return $this->hasOne(EmpAddress::className(), ['emp_address_id' => 'emp_master_emp_address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasterStatus()
    {
        return $this->hasOne(EmpStatus::className(), ['emp_status_id' => 'emp_master_status_id']);
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
    public function getEmpSectionAllots()
    {
        return $this->hasMany(EmpSectionAllot::className(), ['emp_id' => 'emp_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectAllocates()
    {
        return $this->hasMany(SubjectAllocate::className(), ['sub_allocate_emp_id' => 'emp_master_id']);
    }
}
