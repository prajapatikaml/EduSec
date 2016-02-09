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
 * This is the model class for table "users".
 * @package EduSec.models
 */

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use app\modules\employee\models\EmpMaster;
use app\modules\student\models\StuMaster;

/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $user_login_id
 * @property string $user_password
 * @property string $user_type
 * @property integer $is_block
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property AdmissionLetter[] $admissionLetters
 * @property BatchSubjectAllot[] $batchSubjectAllots
 * @property Batches[] $batches
 * @property City[] $cities
 * @property Country[] $countries
 * @property Courses[] $courses
 * @property DocumentCategory[] $documentCategories
 * @property EmpCategory[] $empCategories
 * @property EmpDepartment[] $empDepartments
 * @property EmpDesignation[] $empDesignations
 * @property EmpDocs[] $empDocs
 * @property EmpMaster[] $empMasters
 * @property EmpSectionAllot[] $empSectionAllots
 * @property EmpStatus[] $empStatuses
 * @property Languages[] $languages
 * @property LoginDetails[] $loginDetails
 * @property MsgOfDay[] $msgOfDays
 * @property NationalHolidays[] $nationalHolidays
 * @property Nationality[] $nationalities
 * @property Notice[] $notices
 * @property Section[] $sections
 * @property State[] $states
 * @property StuAdmissionAcademic[] $stuAdmissionAcademics
 * @property StuAdmissionDocs[] $stuAdmissionDocs
 * @property StuAdmissionMaster[] $stuAdmissionMasters
 * @property StuCategory[] $stuCategories
 * @property StuDocs[] $stuDocs
 * @property StuMaster[] $stuMasters
 * @property StuStatus[] $stuStatuses
 * @property SubjectAllocate[] $subjectAllocates
 * @property SubjectMaster[] $subjectMasters
 * @property User $createdBy
 * @property User[] $users
 * @property User $updatedBy
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $current_pass,$new_pass,$retype_pass;
    public $create_password, $confirm_password, $admin_user;	

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login_id', 'user_password', 'user_type', 'created_at', 'created_by'], 'required'],
            [['is_block', 'created_by', 'updated_by'], 'integer'],
	    [['current_pass', 'new_pass', 'retype_pass'], 'required','on'=>'change','message'=>''],
	    ['current_pass','checkOldPassword','on'=>'change','message'=>''],
	    ['retype_pass', 'compare','compareAttribute'=>'new_pass'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_login_id'], 'string', 'max' => 65],
            [['user_password'], 'string', 'max' => 150],
            [['user_type'], 'string', 'max' => 2],
            [['user_login_id'], 'unique'],

	    ['confirm_password', 'compare','compareAttribute'=>'create_password', 'on'=>'firstTime'],
	    [['create_password', 'confirm_password', 'admin_user'], 'required', 'on'=>'firstTime'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_login_id' => 'User Login ID',
            'user_password' => 'Password',
            'user_type' => 'User Type',
            'is_block' => 'Is Block',
	    'current_pass' => 'Current Password',
	    'new_pass' => 'New Password',
	    'retype_pass' => 'Retype Password',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
	    'admin_user' => 'Admin Username',
	    'create_password' => 'Admin Password',
	    'confirm_password' => 'Confirm Password',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
	return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */

    public static function findByUsername($username)
    {
	return static::findOne(['user_login_id' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */

    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();

    }
   
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

     /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_password === md5($password.$password);
    }

    // Generates "remember me" authentication key
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    // Generates new password reset token
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    // Removes password reset token
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmissionLetters()
    {
        return $this->hasMany(AdmissionLetter::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatchSubjectAllots()
    {
        return $this->hasMany(BatchSubjectAllot::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batches::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentCategories()
    {
        return $this->hasMany(DocumentCategory::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpCategories()
    {
        return $this->hasMany(EmpCategory::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDepartments()
    {
        return $this->hasMany(EmpDepartment::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDesignations()
    {
        return $this->hasMany(EmpDesignation::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpDocs()
    {
        return $this->hasMany(EmpDocs::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasters()
    {
        return $this->hasMany(EmpMaster::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpSectionAllots()
    {
        return $this->hasMany(EmpSectionAllot::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpStatuses()
    {
        return $this->hasMany(EmpStatus::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginDetails()
    {
        return $this->hasMany(LoginDetails::className(), ['login_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMsgOfDays()
    {
        return $this->hasMany(MsgOfDay::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationalHolidays()
    {
        return $this->hasMany(NationalHolidays::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationalities()
    {
        return $this->hasMany(Nationality::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotices()
    {
        return $this->hasMany(Notice::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuAdmissionAcademics()
    {
        return $this->hasMany(StuAdmissionAcademic::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuAdmissionDocs()
    {
        return $this->hasMany(StuAdmissionDocs::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuAdmissionMasters()
    {
        return $this->hasMany(StuAdmissionMaster::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuCategories()
    {
        return $this->hasMany(StuCategory::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuDocs()
    {
        return $this->hasMany(StuDocs::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasters()
    {
        return $this->hasMany(StuMaster::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuStatuses()
    {
        return $this->hasMany(StuStatus::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectAllocates()
    {
        return $this->hasMany(SubjectAllocate::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectMasters()
    {
        return $this->hasMany(SubjectMaster::className(), ['updated_by' => 'user_id']);
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['updated_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['user_id' => 'updated_by']);
    }

    public function getAuthuser()
    {
    	return $this->hasOne(AuthAssignment::className(), ['user_id' => 'user_id']);
    }

    public function getEmpMaster()
    {
        return $this->hasOne(EmpMaster::className(), ['emp_master_user_id' => 'user_id']);
    }
 
    public function getStuMaster()
    {
        return $this->hasOne(StuMaster::className(), ['stu_master_user_id' => 'user_id']);
    }
    /**
     *  @ check old password is correct or wrong.
     */
    public function checkOldPassword($attribute,$params)
    {
	$record = User::find()->where(['user_password'=>md5($this->current_pass.$this->current_pass)])->one();

	if($record === null) {
		$this->addError($attribute, 'Invalid or Wrong password');
	}
    }
}
