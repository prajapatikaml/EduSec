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
 * This is the model class for table "stu_info".
 *
 * @property integer $stu_info_id
 * @property string $stu_unique_id
 * @property string $stu_title
 * @property string $stu_first_name
 * @property string $stu_middle_name
 * @property string $stu_last_name
 * @property string $stu_gender
 * @property string $stu_dob
 * @property string $stu_email_id
 * @property string $stu_bloodgroup
 * @property string $stu_birthplace
 * @property string $stu_religion
 * @property string $stu_admission_date
 * @property string $stu_photo
 * @property string $stu_languages
 * @property string $stu_mobile_no
 * @property integer $stu_info_stu_master_id
 *
 * @property StuMaster $stuInfoStuMaster
 * @property StuMaster[] $stuMasters
 */
class StuInfo extends \yii\db\ActiveRecord
{
	const TYPE_MALE='MALE';
	const TYPE_FEMALE='FEMALE';
	const TYPE_APLUS='A+';
	const TYPE_AMINUS='A-';
	const TYPE_BPLUS='B+';
	const TYPE_BMINUS='B-';
	const TYPE_ABPLUS='AB+';
	const TYPE_ABMINUS='AB-';
	const TYPE_OPLUS='O+';
	const TYPE_OMINUS='O-';
	const TYPE_UNKNON='Unknown';
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stu_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_unique_id', 'stu_first_name', 'stu_last_name', 'stu_admission_date',], 'required', 'message' => ''],
	    [['stu_unique_id'], 'unique'],
            [['stu_admission_date'], 'string', 'max' => 15],
	    [['stu_info_stu_master_id'], 'safe'],
	    ['stu_dob', 'required', 'message' => ''],
	  // ['stu_dob','Ckdate'],
            [['stu_mobile_no', 'stu_info_stu_master_id', 'stu_unique_id'], 'integer'],
	    [['stu_mobile_no'], 'integer', 'min' => 10],
            [['stu_first_name', 'stu_middle_name', 'stu_last_name', 'stu_religion', 'stu_email_id'], 'string', 'max' => 50],
            [['stu_title'], 'string', 'max' => 5],
            [['stu_gender', 'stu_bloodgroup'], 'string', 'max' => 10],
            [['stu_email_id'], 'string', 'max' => 65],
            [['stu_birthplace'], 'string', 'max' => 45],
            [['stu_photo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => false, 
'checkExtensionByMimeType'=>false, 'on' => 'photo-upload'],
            [['stu_languages'], 'string', 'max' => 255],
	    [['stu_email_id'], 'email'],
            [['stu_email_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_info_id' => 'Stu Info ID',
            'stu_unique_id' => 'Student ID',
            'stu_title' => 'Title',
            'stu_first_name' => 'First Name',
            'stu_middle_name' => 'Middle Name',
            'stu_last_name' => 'Last Name',
            'stu_gender' => 'Gender',
            'stu_dob' => 'Birth Date',
            'stu_email_id' => 'Email ID',
            'stu_bloodgroup' => 'Bloodgroup',
            'stu_birthplace' => 'Birthplace',
            'stu_religion' => 'Religion',
            'stu_admission_date' => 'Admission Date',
            'stu_photo' => 'Photo',
            'stu_languages' => 'Languages',
            'stu_mobile_no' => 'Mobile No',
            'stu_info_stu_master_id' => 'Stu Info Stu Master ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuInfoStuMaster()
    {
        return $this->hasOne(StuMaster::className(), ['stu_master_id' => 'stu_info_stu_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuMasters()
    {
        return $this->hasMany(StuMaster::className(), ['stu_master_stu_info_id' => 'stu_info_id']);
    }

    public static function getTitleOptions()
    {
	return [
		self::TYPE_MR=>'Mr.',
		self::TYPE_MRS=>'Mrs.', 
		self::TYPE_MISS=>'Ms.',
	];
    }

    public static function getBloodGroup()
    {
	return [
		self::TYPE_UNKNON => 'Unknown',
		self::TYPE_APLUS => 'A+',
		self::TYPE_AMINUS => 'A-',
		self::TYPE_BPLUS => 'B+',
		self::TYPE_BMINUS => 'B-',
		self::TYPE_ABPLUS => 'AB+',
		self::TYPE_ABMINUS => 'AB-',
		self::TYPE_OPLUS => 'O+',
		self::TYPE_OMINUS => 'O-',
	];
    }

    public static function getStuPhoto($imgName)
    {
		$dispImg = is_file(Yii::getAlias('@webroot').'/data/stu_images/'.$imgName) ? true :false;
		return Yii::getAlias('@web')."/data/stu_images/".(($dispImg) ? $imgName : "no-photo.png");
    }

    public function Ckdate($attr,$param) {
		
	$curr_date = date('d-m-Y');
	$dob = date('Y-m-d',strtotime($this->$attr));
	$adm_date = date('Y-m-d',strtotime($this->stu_admission_date));
	
	if(empty($this->stu_admission_date)) {
		return true;
	}
	else {
	  $diff = $adm_date - $dob;
	  $d = date('Y-m-d',strtotime($this->stu_admission_date)) - date('Y-m-d',strtotime($this->$attr));
	   if($d <= 14) {
	
		$this->addError($attr, "Birth date must be less than Admission date.");	
		return false;
	   }
	   else
		return true;
	}
    }

    function getName() {
	return $this->stu_first_name.' '.$this->stu_last_name;
    }
}
