<?php

/**
 * This is the model class for table "student_registration_info".
 *
 * The followings are the available columns in table 'student_registration_info':
 * @property integer $student_registration_id
 * @property string $student_first_name
 * @property string $student_middle_name
 * @property string $student_last_name
 * @property string $student_merit_no
 * @property double $student_merit_marks
 * @property integer $student_category_id
 * @property string $student_gender
 * @property string $student_date_of_registration
 * @property integer $student_branch_id
 * @property string $student_board
 * @property string $student_dob
 * @property string $student_place_of_birth
 * @property string $student_current_address
 * @property string $student_permanent_address
 * @property string $student_email_id
 * @property string $student_phoneno
 * @property string $student_mobile
 * @property string $student_guardian_phoneno
 * @property string $student_guardian_mobile
 * @property string $student_last_school_attended
 * @property string $student_last_school_attended_address
 * @property string $student_father_name
 * @property string $student_mother_name
 * @property string $student_father_occupation
 * @property string $student_mother_occupation
 * @property string $studnet_father_office_address
 * @property string $student_mother_office_address
 * @property string $student_photo
 */
class StudentRegistrationInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentRegistrationInfo the static model class
	 */
	public $stud_address_chkbox;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_registration_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_first_name, student_middle_name, student_last_name, student_merit_no, student_merit_marks, student_date_of_registration, student_branch_id, student_email_id,student_photo,student_title,organization_id,,acpc_fees_receipt_no,acpc_fees_amount', 'required'),
			array('student_category_id', 'numerical', 'integerOnly'=>true),
			array('student_merit_marks', 'numerical'),
			array('student_first_name, student_middle_name, student_last_name', 'length', 'max'=>25),
			array('student_email_id','unique', 'message'=>'email id must be unique'),
			array('student_merit_no, student_gender,student_title', 'length', 'max'=>10),
			array('student_board, student_phoneno, student_mobile, student_guardian_phoneno, student_guardian_mobile', 'length', 'max'=>15),
			array('student_place_of_birth', 'length', 'max'=>30),
			array('student_phoneno,student_mobile, student_guardian_phoneno, student_guardian_mobile,$stud_address_chkbox','numerical'),
			array('student_mobile,student_guardian_mobile','length','max'=>10),	
			array('student_current_address, student_permanent_address, student_last_school_attended_address, student_father_name, student_mother_name, studnet_father_office_address, student_mother_office_address', 'length', 'max'=>100),
			array('student_email_id', 'length', 'max'=>60),
			array('student_last_school_attended, student_father_occupation, student_mother_occupation', 'length', 'max'=>50),
			array('student_photo', 'length', 'max'=>150),
			array('student_address_p_line1,student_address_p_line2, student_address_p_taluka, student_address_p_district, student_address_p_country, student_address_p_city, student_address_p_pin,student_address_p_state,student_address_c_line1,student_address_c_line2, student_address_c_taluka, student_address_c_district, student_address_c_country, student_address_c_city, student_address_c_pin,student_address_c_state,student_dob,acpc_fees_bank,acpc_fees_date', 'safe'),
			array('student_status','safe'),
			array('student_photo','file','types'=>'jpg, gif, png, jpeg','allowEmpty'=>true,'on'=>'update'),
			array('student_photo', 'length', 'max'=>255, 'on'=>'insert,update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_registration_id,student_title, student_first_name, student_middle_name, student_last_name, student_merit_no, student_merit_marks, student_category_id, student_gender, student_date_of_registration, student_branch_id, student_board, student_dob, student_place_of_birth, student_email_id, student_phoneno, student_mobile, student_guardian_phoneno, student_guardian_mobile, student_last_school_attended, student_last_school_attended_address, student_father_name, student_mother_name, student_father_occupation, student_mother_occupation, studnet_father_office_address, student_mother_office_address, student_photo,student_aproved, organization_id,student_address_p_line1,student_address_p_line2, student_address_p_taluka, student_address_p_district, student_address_p_country, student_address_p_city, student_address_p_pin,student_address_p_state,student_address_c_line1,student_address_c_line2, student_address_c_taluka, student_address_c_district, student_address_c_country, student_address_c_city, student_address_c_pin,student_address_c_state,acpc_fees_receipt_no,acpc_fees_amount,acpc_fees_bank,acpc_fees_date,student_status', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_registration_id' => 'Registration',
			
			'student_first_name' => 'First Name',
			'student_title' => 'Title',
			'student_middle_name' => 'Middle Name',
			'student_last_name' => 'Last Name',
			'student_merit_no' => 'Merit No',
			'student_merit_marks' => 'Merit Marks',
			'student_category_id' => 'Category',
			'student_gender' => 'Gender',
			'student_date_of_registration' => 'Date of registration',
			'student_branch_id' => 'Branch',
			'student_board' => 'Board',
			'student_dob' => 'Date of Birth',
			'student_place_of_birth' => 'Place of Birth',
			'student_email_id' => 'E-mail ID',
			'student_phoneno' => 'Phone No',
			'student_mobile' => 'Mobile No',
			'student_guardian_phoneno' => 'Parents\'s Phone No',
			'student_guardian_mobile' => 'Parents\'s Mobile No',
			'student_last_school_attended' => 'Name of last school attended',
			'student_last_school_attended_address' => 'Address of last school attended',
			'student_father_name' => 'Father\'s Name',
			'student_mother_name' => 'Mother\'s Name',
			'student_father_occupation' => 'Father\'s Occupation',
			'student_mother_occupation' => 'Mother\'s Occupation',
			'studnet_father_office_address' => 'Father\'s Office Address',
			'student_mother_office_address' => 'Mother\'s Office Address',
			'student_photo' => 'Photo',
			'student_aproved' => 'Aproved',
			'organization_id' => 'Organization',
			'student_address_c_line1' => 'Line1',
			'student_address_c_line2' => 'Line2',
			'student_address_c_country' => 'Country',
			'student_address_c_city' => 'City',
			'student_address_c_pin' => 'Pincode',
			'student_address_c_state' => 'State',
			'student_address_p_line1' => 'Line1',
			'student_address_p_line2' => 'Line2',
			'student_address_p_city' => 'City',
			'student_address_p_pin' => 'Pincode',
			'student_address_p_state' => 'State',
			'student_address_p_country' => 'Country',
			'student_address_c_taluka' => 'Taluka',
			'student_address_c_district' => 'District',
			'student_address_p_taluka' => 'Taluka',
			'student_address_p_district' => 'District',
			'acpc_fees_receipt_no' => 'ACPC Fees Receipt No',
			'acpc_fees_amount' => 'ACPC Fees Amount',
			'acpc_fees_bank' => 'ACPC Fees Bank',
			'acpc_fees_date' => 'ACPC Fees Date',
			'student_status' => 'DTOD/Regular Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition = "student_aproved = '0'";
		$criteria->compare('student_registration_id',$this->student_registration_id);
		$criteria->compare('student_title',$this->student_title);
		$criteria->compare('student_first_name',$this->student_first_name,true);
		$criteria->compare('student_middle_name',$this->student_middle_name,true);
		$criteria->compare('student_last_name',$this->student_last_name,true);
		$criteria->compare('student_merit_no',$this->student_merit_no,true);
		$criteria->compare('student_merit_marks',$this->student_merit_marks);
		$criteria->compare('student_category_id',$this->student_category_id);
		$criteria->compare('student_gender',$this->student_gender,true);
		$criteria->compare('student_date_of_registration',$this->dbDateSearch($this->student_date_of_registration),true);
		$criteria->compare('student_branch_id',$this->student_branch_id);
		$criteria->compare('student_board',$this->student_board,true);
		$criteria->compare('student_dob',$this->student_dob,true);
		$criteria->compare('student_place_of_birth',$this->student_place_of_birth,true);
		$criteria->compare('student_email_id',$this->student_email_id,true);
		$criteria->compare('student_phoneno',$this->student_phoneno,true);
		$criteria->compare('student_mobile',$this->student_mobile,true);
		$criteria->compare('student_guardian_phoneno',$this->student_guardian_phoneno,true);
		$criteria->compare('student_guardian_mobile',$this->student_guardian_mobile,true);
		$criteria->compare('student_last_school_attended',$this->student_last_school_attended,true);
		$criteria->compare('student_last_school_attended_address',$this->student_last_school_attended_address,true);
		$criteria->compare('student_father_name',$this->student_father_name,true);
		$criteria->compare('student_mother_name',$this->student_mother_name,true);
		$criteria->compare('student_father_occupation',$this->student_father_occupation,true);
		$criteria->compare('student_mother_occupation',$this->student_mother_occupation,true);
		$criteria->compare('studnet_father_office_address',$this->studnet_father_office_address,true);
		$criteria->compare('student_mother_office_address',$this->student_mother_office_address,true);
		$criteria->compare('student_photo',$this->student_photo,true);
		$criteria->compare('student_aproved',$this->student_aproved,true);
		$criteria->compare('student_address_c_line1',$this->student_address_c_line1,true);
		$criteria->compare('student_address_c_line2',$this->student_address_c_line2,true);
		$criteria->compare('student_address_c_taluka',$this->student_address_c_taluka,true);
		$criteria->compare('student_address_c_district',$this->student_address_c_district,true);
		$criteria->compare('student_address_c_country',$this->student_address_c_country);
		$criteria->compare('student_address_c_city',$this->student_address_c_city);
		$criteria->compare('student_address_c_pin',$this->student_address_c_pin);
		$criteria->compare('student_address_c_state',$this->student_address_c_state);
		$criteria->compare('student_address_p_line1',$this->student_address_p_line1,true);
		$criteria->compare('student_address_p_line2',$this->student_address_p_line2,true);
		$criteria->compare('student_address_p_taluka',$this->student_address_p_taluka,true);
		$criteria->compare('student_address_p_district',$this->student_address_p_district,true);
		$criteria->compare('student_address_p_city',$this->student_address_p_city);
		$criteria->compare('student_address_p_pin',$this->student_address_p_pin);
		$criteria->compare('student_address_p_state',$this->student_address_p_state);
		$criteria->compare('student_address_p_country',$this->student_address_p_country);
		$criteria->compare('acpc_fees_receipt_no',$this->acpc_fees_receipt_no);
		$criteria->compare('acpc_fees_amount',$this->acpc_fees_amount);
		$criteria->compare('acpc_fees_bank',$this->acpc_fees_bank);
		$criteria->compare('acpc_fees_date',$this->acpc_fees_date);
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('student_status',$this->student_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
}
