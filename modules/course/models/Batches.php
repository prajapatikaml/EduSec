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
 * This is the model class for table "batches".
 *
 * @property integer $batch_id
 * @property string $batch_name
 * @property integer $batch_course_id
 * @property string $batch_alias
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property BatchSubjectAllot[] $batchSubjectAllots
 * @property Courses $batchCourse
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Section[] $sections
 * @property StuMaster[] $stuMasters
 * @property SubjectAllocate[] $subjectAllocates
 */
namespace app\modules\course\models;

use Yii;
use app\models\User;

class Batches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batches';
    }

    public static function find()
    {
	return parent::find()->andWhere(['<>', 'is_status', 2]);
    }

   /* public static function defaultScope($query)
    {
        $query->andWhere(['is_status' => self::STATUS_OPEN]);
    }*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_name', 'batch_course_id', 'batch_alias', 'start_date', 'end_date', 'created_at', 'created_by'], 'required', 'message' => ''],
            [['batch_course_id', 'created_by', 'updated_by', 'is_status'], 'integer', 'message' => ''],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe', 'message' => ''],
            [['batch_name'], 'string', 'max' => 120],
            [['batch_alias'], 'string', 'max' => 35],
	    [['batch_name', 'batch_course_id'], 'unique', 'targetAttribute' => ['batch_name', 'batch_course_id'], 'message' => 'Batch Already Exists for this Course.', 'when' => function ($model){ return $model->is_status == 0;}],
            [['batch_alias'], 'unique', 'targetAttribute' => ['batch_alias'],]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'batch_id' => 'Batch ID',
            'batch_name' => 'Batch Name',
            'batch_course_id' => 'Batch Course ',
            'batch_alias' => 'Batch Alias',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatchSubjectAllots()
    {
        return $this->hasMany(BatchSubjectAllot::className(), ['batch_sub_allot_batch_id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatchCourse()
    {
        return $this->hasOne(Courses::className(), ['course_id' => 'batch_course_id']);
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
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['section_batch_id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasters()
    {
        return $this->hasMany(StuMaster::className(), ['stu_master_batch_id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectAllocates()
    {
        return $this->hasMany(SubjectAllocate::className(), ['sub_allocate_batch_id' => 'batch_id']);
    }

    public function getCheckUniq()
    {
	return $this->is_status = 0;
    }
}
