<?php

/**
 * This is the model class for table "employee_sms_email_details".
 * @package EduSec.Employee.models
 */
class EmployeeSmsEmailDetails extends CActiveRecord
{
	public $employee_first_name, $department_name,  $shift_type, $employee_no, $employee_attendance_card_id,$employee_private_email,$employee_private_mobile;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeSmsEmailDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employee_sms_email_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_id, message_email_text, email_sms_status, created_by, creation_date, employee_id, employee_sms_email_id', 'required','message'=>""),
			array('department_id, email_sms_status, created_by, employee_id', 'numerical', 'integerOnly'=>true,'message'=>""),
			array('message_email_text,email_sms_status', 'required','on'=>'selectedsms','message'=>""),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_sms_email_id, department_id, message_email_text, email_sms_status, created_by, creation_date, employee_id, employee_first_name, department_name,employee_no,employee_attendance_card_id,shift_type,employee_private_email,employee_private_mobile,employee_sms_email_details_ack_id', 'safe', 'on'=>'search'),
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
		
			'rel_emp_sms_divid' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'rel_emp_sms_info' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' => 't.employee_id=employee_info_transaction_id'),				
			'rel_emp_sms_user'=> array(self::BELONGS_TO, 'User', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_sms_email_id' => 'Sms Email',
			'department_id' =>'Department',
			'message_email_text' => 'Text',
			'email_sms_status' => 'Select Sms/Email',
			'created_by' => 'Created By',
			'creation_date' => 'Send Date',
			'employee_id' => 'Employee Name',
			'employee_no'=>'Employee No.',
			'employee_attendance_card_id' =>'Attendance Card No.',
			'employee_private_email'=>'Email',
			'employee_sms_email_details_ack_id'=>'Sms Acknowledment',
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
		$criteria->join = 'JOIN employee_transaction et ON employee_id = et.employee_transaction_id JOIN employee_designation emp_des ON et.employee_transaction_designation_id = emp_des.employee_designation_id';
		$criteria->with = array('rel_emp_sms_info');
		$criteria->compare('rel_emp_sms_info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('rel_emp_sms_info.employee_no',$this->employee_no,true);
		$criteria->compare('rel_emp_sms_info.employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('employee_sms_email_id',$this->employee_sms_email_id);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('email_sms_status',$this->email_sms_status);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('department_name',$this->department_name);

		$empsms_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'emp_des.employee_designation_level ASC',
				),
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $empsms_data;
		return $empsms_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
		'rel_emp_sms_info.employee_no',
		'rel_emp_sms_info.employee_attendance_card_id',
		'rel_emp_sms_info.employee_first_name',
		'rel_emp_sms_divid.department_name',
		'email_sms_status',
		'creation_date',
	        ),
	      'filename'=>'Employee Sms-Emails', 'pdfFile'=>'employee.views.employeeSmsEmailDetails.exportGridtoReport');
              return $data;
        }	

	/**
	* Datewise search by date picker from gridView
	* @return date
	*/
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }

}
