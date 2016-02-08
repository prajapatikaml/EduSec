<?php

/**
 * This is the model class for table "student_address".
 * @package EduSec.models
 */
class StudentAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentAddress the static model class
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
		return 'student_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_address_c_country, student_address_c_city, student_address_c_pin, student_address_c_state, student_address_p_city, student_address_p_pin, student_address_p_state, student_address_p_country , stud_address_chkbox', 'numerical', 'integerOnly'=>true,'message'=>''),

			array(' student_address_c_pin,student_address_p_pin', 'CRegularExpressionValidator', 'pattern'=>'/^([0-9]+)$/'),

			
	array('student_address_c_district,student_c_house_no,student_p_house_no,student_address_c_mobile,student_address_c_phone,
student_address_p_phone,student_address_p_mobile','safe'),
			array('student_address_c_pin,student_address_p_pin', 'length', 'max'=>8,'message'=>''),
			//array('student_address_phone', 'length', 'max'=>15,'message'=>''),
			//array('student_address_mobile', 'length','min'=>10, 'max'=>10,'message'=>''),
			array('student_address_c_line1, student_address_c_line2, student_address_p_line1, student_address_p_line2', 'length', 'max'=>100,'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_address_id, student_address_c_line1, student_address_c_line2, student_address_c_country, student_address_c_city, student_address_c_pin, student_address_c_state, student_address_p_line1, student_address_p_line2, student_address_p_city, student_address_p_pin, student_address_p_state, student_address_p_country, student_address_phone, student_address_mobile', 'safe', 'on'=>'search'),
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
		'Rel_c_city' => array(self::BELONGS_TO, 'City', 'student_address_c_city'),
		'Rel_c_state' => array(self::BELONGS_TO, 'State', 'student_address_c_state'),
		'Rel_c_country' => array(self::BELONGS_TO, 'Country', 'student_address_c_country'),
		'Rel_p_city' => array(self::BELONGS_TO, 'City', 'student_address_p_city'),
		'Rel_p_state' => array(self::BELONGS_TO, 'State', 'student_address_p_state'),
		'Rel_p_country' => array(self::BELONGS_TO, 'Country', 'student_address_p_country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_address_id' => 'Student Address',
			'student_address_c_line1' => 'Street 1',
			'student_address_c_line2' => 'Street 2',
			'student_address_c_country' => 'Country',
			'student_address_c_city' => 'Town',
			'student_address_c_pin' => 'Postcode',
			'student_address_c_state' => 'State',
			'student_address_p_line1' => 'Street 1',
			'student_address_p_line2' => 'Street 2',
			'student_address_p_city' => 'Town',
			'student_address_p_pin' => 'Postcode',
			'student_address_p_state' => 'State',
			'student_address_p_country' => 'Country',
			//'student_c_address_phone' => 'Phone1',
			//'student_c_address_mobile' => 'Mobile1',
			'student_c_house_no' => 'House No',
			'student_p_house_no' => 'House No',
			'student_address_c_mobile'=> 'Mobile',
			'student_address_c_phone'=>'Phone',
			'student_address_p_mobile'=> 'Mobile',
			'student_address_p_phone'=>'Phone',
		);
	}
}
