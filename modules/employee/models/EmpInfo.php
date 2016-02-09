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
 * This is the model class for table "emp_info".
 * @package EduSec.modules.employee.models
 */

namespace app\modules\employee\models;

use Yii;

/**
 * @property integer $emp_info_id
 * @property string $emp_unique_id
 * @property string $emp_attendance_card_id
 * @property string $emp_title
 * @property string $emp_first_name
 * @property string $emp_middle_name
 * @property string $emp_last_name
 * @property string $emp_name_alias
 * @property string $emp_mother_name
 * @property string $emp_gender
 * @property string $emp_dob
 * @property string $emp_religion
 * @property string $emp_bloodgroup
 * @property string $emp_joining_date
 * @property string $emp_birthplace
 * @property string $emp_email_id
 * @property string $emp_maritalstatus
 * @property string $emp_mobile_no
 * @property string $emp_photo
 * @property string $emp_languages
 * @property string $emp_bankaccount_no
 * @property string $emp_qualification
 * @property string $emp_specialization
 * @property integer $emp_experience_year
 * @property integer $emp_experience_month
 * @property string $emp_hobbies
 * @property string $emp_reference
 * @property string $emp_guardian_name
 * @property string $emp_guardian_relation
 * @property string $emp_guardian_qualification
 * @property string $emp_guardian_occupation
 * @property string $emp_guardian_income
 * @property string $emp_guardian_homeadd
 * @property string $emp_guardian_officeadd
 * @property string $emp_guardian_mobile_no
 * @property string $emp_guardian_phone_no
 * @property string $emp_guardian_email_id
 * @property integer $emp_info_emp_master_id
 *
 * @property EmpMaster $empInfoEmpMaster
 * @property EmpMaster[] $empMasters
 */

class EmpInfo extends \yii\db\ActiveRecord
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
	const TYPE_MARRIED='MARRIED';
	const TYPE_UNMARRIED='UNMARRIED';
	const TYPE_DIVORCED='DIVORCED';
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';
	const TYPE_PROF='Prof.';
	const TYPE_DR='Dr.';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	 
        return [
	    [['emp_unique_id', 'emp_first_name', 'emp_last_name', 'emp_info_emp_master_id'], 'required','message'=>''],
            [['emp_photo', 'emp_email_id', 'emp_attendance_card_id', 'emp_dob'], 'safe'],
			[['emp_attendance_card_id'], 'default', 'value' => NULL],
            [['emp_mobile_no', 'emp_experience_year', 'emp_experience_month', 'emp_guardian_mobile_no', 'emp_info_emp_master_id', 'emp_unique_id'], 'integer'],
            [['emp_attendance_card_id', 'emp_mother_name', 'emp_religion', 'emp_birthplace', 'emp_qualification', 'emp_guardian_qualification', 'emp_guardian_occupation', 'emp_guardian_income'], 'string', 'max' => 50],
            [['emp_title'], 'string', 'max' => 15],
            [['emp_first_name', 'emp_middle_name', 'emp_last_name', 'emp_maritalstatus', 'emp_reference'], 'string', 'max' => 35],
            [['emp_name_alias', 'emp_gender', 'emp_bloodgroup'], 'string', 'max' => 20],
            [['emp_email_id', 'emp_guardian_name', 'emp_guardian_email_id'], 'string', 'max' => 65],
			[['emp_photo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => false, 'checkExtensionByMimeType'=>false, 'on' => 'photo-upload'],
            [['emp_languages', 'emp_specialization', 'emp_guardian_homeadd', 'emp_guardian_officeadd'], 'string', 'max' => 255],
            [['emp_bankaccount_no', 'emp_guardian_phone_no'], 'string', 'max' => 25],
            [['emp_hobbies'], 'string', 'max' => 100],
            [['emp_guardian_relation'], 'string', 'max' => 30],
	    [['emp_email_id','emp_guardian_email_id'],'email'], 			       
	    [['emp_email_id','emp_guardian_email_id','emp_attendance_card_id','emp_mobile_no',
		'emp_info_emp_master_id','emp_unique_id'], 'unique'],
	    [['emp_dob', 'emp_joining_date'], 'string'],
            ['emp_dob', 'bdate'],
	    ['emp_joining_date','ckjoindate'],
	    [['emp_guardian_mobile_no','emp_mobile_no'], 'integer', 'min' =>10],
	    
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
		'emp_info_id' => Yii::t('emp', 'Employee'),
            'emp_unique_id' => Yii::t('emp', 'Employee ID'),
            'emp_attendance_card_id' => Yii::t('emp', 'Attendance Card ID'),
            'emp_title' => Yii::t('emp', 'Title'),
            'emp_first_name' => Yii::t('emp', 'First Name'),
            'emp_middle_name' => Yii::t('emp', 'Middle Name'),
            'emp_last_name' => Yii::t('emp', 'Last Name'),
            'emp_name_alias' => Yii::t('emp', 'Name Alias'),
            'emp_mother_name' => Yii::t('emp', 'Mother Name'),
            'emp_gender' => Yii::t('emp', 'Gender'),
            'emp_dob' => Yii::t('emp', 'Emp Date of Birth'),
            'emp_religion' => Yii::t('emp', 'Religion'),
            'emp_bloodgroup' => Yii::t('emp', 'Blood Group'),
            'emp_joining_date' => Yii::t('emp', 'Joining Date'),	
   			'emp_birthplace' => Yii::t('emp', 'Birth Place'),
            'emp_email_id' => Yii::t('emp', 'Email ID'),
            'emp_maritalstatus' => Yii::t('emp', 'Marital Status'),
            'emp_mobile_no' => Yii::t('emp', 'Mobile No'),
            'emp_photo' => Yii::t('emp', 'Browse Photo'),
            'emp_languages' => Yii::t('emp', 'Languages'),
            'emp_bankaccount_no' => Yii::t('emp', 'Bank Account No'),
            'emp_qualification' => Yii::t('emp', 'Qualification'),
            'emp_specialization' => Yii::t('emp', 'Specialization'),
            'emp_experience_year' => Yii::t('emp', 'Year'),
            'emp_experience_month' => Yii::t('emp', 'Month'),
            'emp_hobbies' => Yii::t('emp', 'Hobbies'),
            'emp_reference' => Yii::t('emp', 'Reference'),
            'emp_guardian_name' => Yii::t('emp', 'Full Name'),
            'emp_guardian_relation' => Yii::t('emp', 'Relation'),
            'emp_guardian_qualification' => Yii::t('emp', 'Qualification'),
            'emp_guardian_occupation' => Yii::t('emp', 'Occupation'),
            'emp_guardian_income' => Yii::t('emp', 'Total Income'),
			'emp_guardian_homeadd' => Yii::t('emp', 'Home Address'),
            'emp_guardian_officeadd' => Yii::t('emp', 'Office Address'),
            'emp_guardian_mobile_no' => Yii::t('emp', 'Mobile No'),
            'emp_guardian_phone_no' => Yii::t('emp', 'Phone No'),
            'emp_guardian_email_id' => Yii::t('emp', 'Email ID'),
            'emp_info_emp_master_id' => Yii::t('emp', 'Info Emp Master ID'),
	    	'emp_experience_year_temp' => Yii::t('emp', 'Total Experience'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpInfoEmpMaster()
    {
        return $this->hasOne(EmpMaster::className(), ['emp_master_id' => 'emp_info_emp_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpMasters()
    {
        return $this->hasMany(EmpMaster::className(), ['emp_master_emp_info_id' => 'emp_info_id']);
    }

    public static function getGenderOptions()
    {
	return[
	Yii::t('emp', self::TYPE_MALE) => Yii::t('emp', 'MALE'),
	Yii::t('emp', self::TYPE_FEMALE) => Yii::t('emp', 'FEMALE'),
	];
    }

    /**
     * @return employee profile photo
     */
    public static function getEmpPhoto($imgName)
    {
	$dispImg = is_file(Yii::getAlias('@webroot').'/data/emp_images/'.$imgName) ? true :false;
	return Yii::getAlias('@web')."/data/emp_images/".(($dispImg) ? $imgName : "no-photo.png");
    }

    /**
    * This method is for static Blood Group Drop Down.
    */
    public static function getBloodGroup()
    {
	return[
	Yii::t('emp', self::TYPE_UNKNON) => Yii::t('emp', 'Unknown'),
	Yii::t('emp', self::TYPE_APLUS) => Yii::t('emp', 'A+'),
	Yii::t('emp', self::TYPE_AMINUS) => Yii::t('emp', 'A-'),
	Yii::t('emp', self::TYPE_BPLUS) => Yii::t('emp', 'B+'),
	Yii::t('emp', self::TYPE_BMINUS) => Yii::t('emp', 'B-'),
	Yii::t('emp', self::TYPE_ABPLUS) => Yii::t('emp', 'AB+'),
	Yii::t('emp', self::TYPE_ABMINUS) => Yii::t('emp', 'AB-'),
	Yii::t('emp', self::TYPE_OPLUS) => Yii::t('emp', 'O+'),
	Yii::t('emp', self::TYPE_OMINUS) => Yii::t('emp', 'O-'),
	];
     }

     /**
      * This method is for static Marital Status Drop Down.
     */
     public static function getMaritialStatus()
     {
	return[
	Yii::t('emp', self::TYPE_MARRIED) => Yii::t('emp', 'MARRIED'),
	Yii::t('emp', self::TYPE_UNMARRIED) => Yii::t('emp', 'UNMARRIED'),
	Yii::t('emp', self::TYPE_DIVORCED) => Yii::t('emp', 'DIVORCED'),
	];
     }
	
      /**
      * This method is for Title Gender Drop Down.
       */
      public static function getTitleOptions()
      {
	 return[
	 Yii::t('emp', self::TYPE_MR) => Yii::t('emp', 'Mr.'),
	 Yii::t('emp', self::TYPE_MRS) => Yii::t('emp', 'Mrs.'), 
	 Yii::t('emp', self::TYPE_MISS) => Yii::t('emp', 'Ms.'),
	 Yii::t('emp', self::TYPE_PROF) => Yii::t('emp', 'Prof.'),
	 Yii::t('emp', self::TYPE_DR) => Yii::t('emp', 'Dr.'),
	];
       }

      /* check birthdate   */
      public function bdate($attr,$param) 
      {			
	$currentDate = strtotime(date('Y-m-d')); 
	$dob = date('Y-m-d',strtotime($this->$attr));
	if(strtotime($dob) >= $currentDate)  {
		$this->addError($attr, "Birth date must be less than Current date.");	
		return false;
	}
	else
		return true;
		
      }

      /* check joining date  */
      public function ckjoindate($attr,$param)
      {
	$currentDate = strtotime(date('Y-m-d')); 
	$joinDate =date('Y-m-d',strtotime($this->$attr));
	if(strtotime($joinDate) >= $currentDate)
	{					
		$this->addError($attr,"Joining date must be less than Current date.");	
		return false;	
	}
	else
		return true;
     }

     function getEmpName()
     {
		return ($this->emp_first_name." ".$this->emp_last_name);
     }
     
     function getEmpFullName()
     {
		return ($this->emp_first_name." ".$this->emp_middle_name." ".$this->emp_last_name);
     }		
}
