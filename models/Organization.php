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
 * This is the model class for table "organization".
 * @package EduSec.models
 */

namespace app\models;
use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property integer $org_id
 * @property string $org_name
 * @property string $org_alias
 * @property string $org_address_line1
 * @property string $org_address_line2
 * @property string $org_phone
 * @property string $org_email
 * @property string $org_website
 * @property resource $org_logo
 * @property string $org_logo_type
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Users $updatedBy
 * @property Users $createdBy
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_name', 'org_alias', 'org_address_line1', 'org_logo_type', 'created_at', 'org_stu_prefix', 'org_emp_prefix'], 'required'],
	    [['org_logo'], 'required', 'on'=>'insert'],
	    [['org_logo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true, 
'checkExtensionByMimeType'=>false],
            [['org_logo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['org_name', 'org_address_line1', 'org_address_line2'], 'string', 'max' => 255],
            [['org_alias', 'org_phone'], 'string', 'max' => 25],
            [['org_email'], 'string', 'max' => 65],
 	    [['org_stu_prefix', 'org_emp_prefix'], 'string', 'max' => 10],
            [['org_website'], 'string', 'max' => 120],
            [['org_logo_type'], 'string', 'max' => 35],
            [['org_name'], 'unique'],
            [['org_alias'], 'unique'],
	    [['org_email'], 'email'],
	    [['org_website'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_id' => 'Institute ID',
            'org_name' => 'Name',
            'org_alias' => 'Alias',
            'org_address_line1' => 'Address Line 1',
            'org_address_line2' => 'Address Line 2',
            'org_phone' => 'Phone',
            'org_email' => 'Email',
            'org_website' => 'Website',
            'org_logo' => 'Logo',
            'org_logo_type' => 'Logo Type',
            'created_at' => 'Created Time',
            'created_by' => 'Created User',
            'updated_at' => 'Updated Time',
            'updated_by' => 'Updated User',
	    'org_stu_prefix'=>'Student Login Prefix',
	    'org_emp_prefix'=>'Employee Login Prefix',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'created_by']);
    }
}
