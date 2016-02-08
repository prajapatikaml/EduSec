<?php

/**
 * This is the model class for table "employee_address".
 * @package EduSec.Employee.models
 */
class EmployeeAddress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeAddress the static model class
	 */
	public $address_chkbox;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee_address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('employee_address_c_city, employee_address_c_pincode, employee_address_c_state, employee_address_c_country, employee_address_p_city, employee_address_p_pincode, employee_address_p_state, employee_address_p_country, employee_address_c_phone,employee_address_p_phone,employee_address_c_mobile, employee_address_p_mobile', 'numerical', 'integerOnly'=>true,'message'=>''),

			array('employee_address_c_taluka,employee_address_c_district,employee_address_p_taluka,employee_address_p_district','safe'),

			array('employee_address_c_pincode,employee_address_p_pincode,', 'length', 'max'=>6),
			//array('employee_address_phone, employee_address_mobile,', 'length', 'max'=>12),
			//array('employee_address_p_taluka,employee_address_p_district,employee_address_c_taluka,employee_address_c_district','CRegularExpressionValidator','pattern'=>'/^([a-zA-z ]+)$/','message'=>''),
			array('employee_address_c_line1, employee_address_c_line2, employee_address_p_line1, employee_address_p_line2', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_address_id, employee_address_c_line1, employee_address_c_line2, employee_address_c_city, employee_address_c_pincode, employee_address_c_state, employee_address_c_country, employee_address_p_line1, employee_address_p_line2, employee_address_p_city, employee_address_p_pincode, employee_address_p_state, employee_address_p_country, employee_address_phone, employee_address_mobile', 'safe', 'on'=>'search'),
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
		'Rel_c_city'=> array(self::BELONGS_TO, 'City', 'employee_address_c_city'),
		'Rel_p_city'=> array(self::BELONGS_TO, 'City', 'employee_address_p_city'),
		'Rel_c_state'=> array(self::BELONGS_TO, 'State', 'employee_address_c_state'),
		'Rel_p_state'=> array(self::BELONGS_TO, 'State', 'employee_address_p_state'),
		'Rel_c_country'=> array(self::BELONGS_TO, 'Country', 'employee_address_c_country'),
		'Rel_p_country'=> array(self::BELONGS_TO, 'Country', 'employee_address_p_country'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_address_id' => 'Employee Address',
			'employee_address_c_line1' => 'Street 1',
			'employee_address_c_line2' => 'Street 2',
			'employee_address_c_city' => 'City',
			'employee_address_c_pincode' => 'Pincode',
			'employee_address_c_state' => 'State',
			'employee_address_c_country' => 'Country',
			'employee_address_p_line1' => 'Street 1',
			'employee_address_p_line2' => 'Street 2',
			'employee_address_p_city' => 'Town',
			'employee_address_p_pincode' => 'Pincode',
			'employee_address_p_state' => 'State',
			'employee_address_p_country' => 'Country',
			//'employee_address_phone' => 'Phone No',
			//'employee_address_mobile' => 'Mobile No',
			'employee_c_house_no' => 'House No',
			'employee_p_house_no' => 'House No',
			'employee_address_c_mobile'=> 'Mobile',
			'employee_address_c_phone'=>'Phone',
			'employee_address_p_mobile'=> 'Mobile',
			'employee_address_p_phone'=>'Phone',
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

		$criteria->compare('employee_address_id',$this->employee_address_id);
		$criteria->compare('employee_address_c_line1',$this->employee_address_c_line1,true);
		$criteria->compare('employee_address_c_line2',$this->employee_address_c_line2,true);
		$criteria->compare('employee_address_c_city',$this->employee_address_c_city);
		$criteria->compare('employee_address_c_pincode',$this->employee_address_c_pincode);
		$criteria->compare('employee_address_c_state',$this->employee_address_c_state);
		$criteria->compare('employee_address_c_country',$this->employee_address_c_country);
		$criteria->compare('employee_address_p_line1',$this->employee_address_p_line1,true);
		$criteria->compare('employee_address_p_line2',$this->employee_address_p_line2,true);
		$criteria->compare('employee_address_p_city',$this->employee_address_p_city);
		$criteria->compare('employee_address_p_pincode',$this->employee_address_p_pincode);
		$criteria->compare('employee_address_p_state',$this->employee_address_p_state);
		$criteria->compare('employee_address_p_country',$this->employee_address_p_country);
		$criteria->compare('employee_address_phone',$this->employee_address_phone);
		$criteria->compare('employee_address_mobile',$this->employee_address_mobile);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
