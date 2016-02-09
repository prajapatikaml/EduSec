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
use app\models\User;
/**
 * This is the model class for table "fees_category_details".
 *
 * @property integer $fees_category_details_id
 * @property string $fees_details_name
 * @property integer $fees_details_category_id
 * @property string $fees_details_description
 * @property string $fees_details_amount
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property Users $updatedBy
 * @property FeesCollectCategory $feesDetailsCategory
 * @property Users $createdBy
 */
class FeesCategoryDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fees_category_details';
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
            [['fees_details_name', 'fees_details_category_id', 'fees_details_amount', 'created_at', 'created_by'], 'required', 'message' => ''],
            [['fees_details_category_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['fees_details_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['fees_details_name'], 'string', 'max' => 70],
            [['fees_details_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fees_category_details_id' => 'Fees Category Details ID',
            'fees_details_name' => 'Name',
            'fees_details_category_id' => 'Fees Category',
            'fees_details_description' => 'Description',
            'fees_details_amount' => 'Amount',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Is Status',
        ];
    }

    public static function getFeeCategoryTotal($cid)
    {
	$totalAmount = Yii::$app->db->createCommand("SELECT SUM(fees_details_amount) FROM fees_category_details WHERE fees_details_category_id=".$cid." AND is_status=0")->queryScalar();
	return $totalAmount;
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
    public function getFeesDetailsCategory()
    {
        return $this->hasOne(FeesCollectCategory::className(), ['fees_collect_category_id' => 'fees_details_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'created_by']);
    }
}
