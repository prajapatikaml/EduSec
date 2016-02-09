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
 * This is the model class for table "login_details".
 * @package EduSec.models
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_details".
 *
 * @property integer $login_detail_id
 * @property integer $login_user_id
 * @property integer $login_status
 * @property string $login_at
 * @property string $logout_at
 * @property string $user_ip_address
 *
 * @property Users $loginUser
 */
class LoginDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_user_id', 'login_at', 'logout_at', 'user_ip_address'], 'required'],
            [['login_user_id', 'login_status'], 'integer'],
            [['login_at', 'logout_at'], 'safe', 'default' => NULL],
            [['user_ip_address'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login_detail_id' => 'Login Detail ID',
            'login_user_id' => 'Username',
            'login_status' => 'Status',
            'login_at' => 'Login At',
            'logout_at' => 'Logout At',
            'user_ip_address' => 'IP Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'login_user_id']);
    }
}
