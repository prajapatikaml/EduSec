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
	const TYPE_MALE= 'MALE';
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
            [['stu_unique_id', 'stu_first_name', 'stu_last_name', 'stu_admission_date',], 'required'],
	    [['stu_unique_id'], 'unique'],
            [['stu_admission_date'], 'string', 'max' => 15],
	    [['stu_info_stu_master_id'], 'safe'],
	    ['stu_dob', 'required', 'message' => ''],
	  // ['stu_dob','Ckdate'],
            [['stu_mobile_no', 'stu_info_stu_master_id', 'stu_unique_id'], 'integer'],
	    [['stu_mobile_no'], 'integer', 'min' => 10],
            [['stu_first_name', 'stu_middle_name', 'stu_last_name', 'stu_religion', 'stu_email_id'], 'string', 'max' => 50],
            [['stu_title'], 'string', 'max' => 15],
            [['stu_gender', 'stu_bloodgroup'], 'string', 'max' => 20],
            [['stu_email_id'], 'string', 'max' => 65],
            [['stu_birthplace'], 'string', 'max' => 45],
            [['stu_photo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => false, 
'checkExtensionByMimeType'=>false, 'on' => 'photo-upload'],
            [['stu_languages'], 'string', 'max' => 255],
	    [['stu_email_id'], 'email'],
            [['stu_email_id'], 'unique'],
			[['stu_dob'], 'checkDateDob', 'on' => 'import-stu'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'stu_info_id' => Yii::t('stu', 'Stu Info ID'),
            'stu_unique_id' => Yii::t('stu', 'Student ID'),
            'stu_title' => Yii::t('stu', 'Title'),
            'stu_first_name' => Yii::t('stu', 'First Name'),
            'stu_middle_name' => Yii::t('stu', 'Middle Name'),
            'stu_last_name' => Yii::t('stu', 'Last Name'),
            'stu_gender' => Yii::t('stu', 'Gender'),
            'stu_dob' => Yii::t('stu', 'Date of Birth'),
            'stu_email_id' => Yii::t('stu', 'Email ID'),
            'stu_bloodgroup' => Yii::t('stu', 'Bloodgroup'),
            'stu_birthplace' => Yii::t('stu', 'Birthplace'),
            'stu_religion' => Yii::t('stu', 'Religion'),
            'stu_admission_date' => Yii::t('stu', 'Admission Date'),
            'stu_photo' => Yii::t('stu', 'Photo'),
            'stu_languages' => Yii::t('stu', 'Languages'),
            'stu_mobile_no' => Yii::t('stu', 'Mobile No'),
            'stu_info_stu_master_id' => Yii::t('stu', 'Stu Info Stu Master ID'),
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
			Yii::t('stu', self::TYPE_MR) => Yii::t('stu', 'Mr.'),
			Yii::t('stu', self::TYPE_MRS) => Yii::t('stu', 'Mrs.'), 
			Yii::t('stu', self::TYPE_MISS) => Yii::t('stu', 'Ms.'),
		];
    }

    public static function getBloodGroup()
    {
		return [
			Yii::t('stu', self::TYPE_UNKNON) => Yii::t('stu', 'Unknown'),
			Yii::t('stu', self::TYPE_APLUS) => Yii::t('stu', 'A+'),
			Yii::t('stu', self::TYPE_AMINUS) => Yii::t('stu', 'A-'),
			Yii::t('stu', self::TYPE_BPLUS) => Yii::t('stu', 'B+'),
			Yii::t('stu', self::TYPE_BMINUS) => Yii::t('stu', 'B-'),
			Yii::t('stu', self::TYPE_ABPLUS) => Yii::t('stu', 'AB+'),
			Yii::t('stu', self::TYPE_ABMINUS) => Yii::t('stu', 'AB-'),
			Yii::t('stu', self::TYPE_OPLUS) => Yii::t('stu', 'O+'),
			Yii::t('stu', self::TYPE_OMINUS) => Yii::t('stu', 'O-'),
		];
    }

	public static function getGenderOptions()
	{
		return [
			Yii::t('stu', self::TYPE_MALE) => Yii::t('stu', 'MALE'),
			Yii::t('stu', self::TYPE_FEMALE) => Yii::t('stu', 'FEMALE'), 
		];	
	}

    public static function getStuPhoto($imgName)
    {
		$dispImg = is_file(Yii::getAlias('@webroot').'/data/stu_images/'.$imgName) ? true :false;
		return Yii::getAlias('@web')."/data/stu_images/".(($dispImg) ? $imgName : "no-photo.png");
    }

	public function checkDateDob($attr,$param) 
    {
		$currentDate = strtotime(date('Y-m-d')); 
		$bdDate = date('Y-m-d',strtotime($this->$attr));
		if(strtotime($bdDate) > $currentDate) {					
			$this->addError($attr, Yii::t('stu', 'Birth date must be less than current date.'));	
			return false;	
		}
		
		return true;
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

	/*
	* get unique id of student
	*/
	public function getUniqueId()
	{
		$stud_uniq_no = \app\modules\student\models\StuInfo::find()->max('stu_unique_id');
		$uniq_id = NULL;
		if(empty($stud_uniq_no)) {
			$uniq_id = $info->stu_unique_id = 1;
		}
		else {
			$chk_id = StuInfo::find()->where(['stu_unique_id' => $stud_uniq_no])->exists(); 
			if($chk_id)
				$uniq_id = $stud_uniq_no + 1;
			else
				$uniq_id = $stud_uniq_no;		
		}
		
		return $uniq_id;
	}
}
