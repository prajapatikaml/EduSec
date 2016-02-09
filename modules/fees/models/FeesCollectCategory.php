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
 * @package EduSec.modules.fees.models
 */


namespace app\modules\fees\models;

use Yii;
use app\modules\course\models\Batches;
use app\models\User;
/**
 * This is the model class for table "fees_collect_category".
 *
 * @property integer $fees_collect_category_id
 * @property string $fees_collect_name
 * @property integer $fees_collect_batch_id
 * @property string $fees_collect_details
 * @property string $fees_collect_start_date
 * @property string $fees_collect_end_date
 * @property string $fees_collect_due_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property FeesCategoryDetails[] $feesCategoryDetails
 * @property Users $updatedBy
 * @property Users $createdBy
 */
class FeesCollectCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fees_collect_category';
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
            [['fees_collect_name', 'fees_collect_batch_id', 'fees_collect_start_date', 'fees_collect_end_date', 'fees_collect_due_date', 'created_at', 'created_by'], 'required', 'message' => ''],
            [['fees_collect_batch_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['fees_collect_start_date', 'fees_collect_end_date', 'fees_collect_due_date', 'created_at', 'updated_at'], 'safe'],
	    [['fees_collect_batch_id'], 'integer',],
            [['fees_collect_name'], 'string', 'max' => 70],
            [['fees_collect_details'], 'string', 'max' => 255],
            [['fees_collect_name', 'fees_collect_batch_id'], 'unique', 'targetAttribute' => ['fees_collect_name', 'fees_collect_batch_id'], 'message' => 'The combination of Fees Category and Batch has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fees_collect_category_id' => 'Fees Collect Category',
            'fees_collect_name' => 'Name',
            'fees_collect_batch_id' => 'Batch',
            'fees_collect_details' => 'Description',
            'fees_collect_start_date' => 'Start Date',
            'fees_collect_end_date' => 'End Date',
            'fees_collect_due_date' => 'Due Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Status',
        ];
    }

    public static function getBatchFeesCategory($bid)
    {
	$batchFcc = self::find()->andWhere(['is_status'=>0, 'fees_collect_batch_id'=>$bid]);
	return $batchFcc;
    }
    
    public function getFeesCategoryDetails()
    {
        return $this->hasMany(FeesCategoryDetails::className(), ['fees_details_category_id' => 'fees_collect_category_id']);
    }

    public function getFeesCollectBatch()
    {
        return $this->hasOne(Batches::className(), ['batch_id' => 'fees_collect_batch_id']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'updated_by']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'created_by']);
    }
}
